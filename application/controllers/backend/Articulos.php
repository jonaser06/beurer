<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mblogs');
        $this->load->model('backend/musuarios');
        $this->load->helper('general');


        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
        $idmodulo=6;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        $data['categorias']=$this->sistema->getCategorias();
        

        $output = $this->load->view('backend/blogs', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idblog = $this->input->post('id', TRUE);

        $data = array(
            'blog' => $this->mblogs->getBlog($idblog),
            'autores'=>$this->mblogs->getAutores(),
            'usuarios'=>$this->musuarios->getUsuarios(NULL, 0, 0, true),
            'categorias'=>$this->mblogs->getCategorias(),
            'tags'=>$this->mblogs->getTagsjm()
        );
        $data['blog_tags'] = $this->mblogs->getBlogTags($idblog);
        $data['blog_tags'] = array_column($data['blog_tags'], 'idtag');
        
        $anuncios_blogs = $this->mblogs->getAnunciosArticulos($data['blog']['idblog']);
        $data['anuncios_articulos'] = json_encode($anuncios_blogs);
//        print_r($anuncios_blogs); exit;
//        print_r($data['blog_tags']); exit;
        //print_r($data['usuarios']); 
        $dimensiones = $this->mblogs->getDimensiones();
        $data['dimensiones']=json_encode($dimensiones);
        
        $output = $this->load->view('backend/popups/edit_blog', $data, TRUE);

        return $this->__output($output);
    }
    
    public function listacategorias(){
        $res=$this->mblogs->listacategorias();
        echo json_encode($res);
    }
    
    public function save(){
        
        $post=$this->input->post();
//        print_r($post['anuncios_articulos']); exit;
        $jm=array();
        if(isset($post['fecha']['fecha']) && !empty($post['fecha']['fecha'])){
            $fecin=str_replace("/","-",$post['fecha']['fecha']);
            $fechaini=(new DateTime($fecin,new DateTimeZone('America/New_York')))->format('Y-m-d H:i:s');
            $post['blogs']['fecha']=$fechaini;
            $jm[]="fecha";
        }else{
            $errores[]="fecha";
        }
        
//        if(empty($post['sitemap']['url'])){
            
//        }
        
//        print_r($post['sitemap']['url']); exit;
        
        if(empty($post['blogs']['titulo'])){
            $errores[]="titulo";
        }else{
            $jm[]="titulo";
        }
        
        if(empty($post['blogs']['idautor'])){
            $errores[]="idautor";
        }else{
            $jm[]="idautor";
        }
        
        if(empty($post['blogs']['idcategoria'])){
            $errores[]="idcategoria";
        }else{
            $jm[]="idcategoria";
        }
        
        if(empty($post['blogs']['imagen'])){
            $errores[]="campo_4";
        }else{
            $jm[]="campo_4";
        }
        
        if (file_exists($post['blogs']['imagen'])) {
            
            $config_img['image_library'] = 'gd2';
            $config_img['source_image'] = $post['blogs']['imagen'];
            $config_img['create_thumb'] = TRUE;
            $config_img['maintain_ratio'] = TRUE;
            $config_img['width']         = 732;
            $config_img['height']       = 568;

            $this->load->library('image_lib', $config_img);

            $this->image_lib->resize();
            
            $post['blogs']['imagen_grande']= $post['blogs']['imagen'];
            
            $path_parts = pathinfo($post['blogs']['imagen']);
       
            $post['blogs']['imagen'] = $path_parts['dirname'].'/'.$path_parts['filename'].'_thumb'.'.'.$path_parts['extension'];
                    
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if((int)$post['blogs']['idblog']>0){
//                $this->mblogs->updateblog($post);
                $idblog=$post['blogs']['idblog'];
                $post['sitemap']['url']=clearString($post['blogs']['titulo'])."-".$idblog;
//                print_r(clearString($post['blogs']['titulo'])."-".$idblog); exit;
                $this->mblogs->updatesitemap($post);
                $this->mblogs->updateblog($post);
                $this->mblogs->deleteblogTags($idblog);
                $mensaje=array("mensaje"=>"Blog editado correctamente","tipo"=>1);
            }else{
                $post['blogs']['fecha']=(new DateTime())->format('Y-m-d H:i:s');
                $idsitemap=$this->mblogs->savesitemap($post);
                $post['blogs']['idsitemap']=$idsitemap;
                $idblog=$this->mblogs->saveblog($post);
                $postjm['sitemap']['url']= clearString($post['blogs']['titulo'])."-".$idblog;
                $postjm['sitemap']['idsitemap']=$idsitemap;
                $this->mblogs->updatesitemap($postjm);
                $mensaje=array("mensaje"=>"Blog registrado correctamente","tipo"=>1);
            }
            
            
            
            if(isset($post['grupos_tags']['idtag']) && !empty($post['grupos_tags']['idtag'])){
                foreach($post['grupos_tags']['idtag'] as $idt){
                    $jm=array("idblog"=>$idblog,"idtag"=>$idt);
                    $this->mblogs->saveblogtag($jm);
                }
            }
            
            $pres = $post['anuncios_articulos']['anuncios_articulos'];
            
            if(isset($pres) && !empty($pres)){
                $dec = json_decode($pres,TRUE);
    //            print_r($dec); exit;
                $this->mblogs->deleteanuncios($idblog);
                foreach ($dec as $d) {
                    $postp['anuncios'] = array("idblog" => $idblog,
                        "imagen" => $d['imagen'],
                        "url" => $d['url'],
                        "iddimension" => $d['iddimension'],
                        "orden" => $d['orden'],
                        "idcategoria"=>0,
                        "idautor"=>0,
                        "estado" => $d['estado']);
                    $this->mblogs->guardaranuncios($postp);
                }
            }
        }

        echo json_encode($mensaje);
    }
    

    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
        
        $idcat=$this->input->post('idcategoria');
//        print_r($idcat); exit;
        $user=$this->manager['user']['idperfil'];
        $idmodulo=6;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $blogs = $this->mblogs->getBlogs($search['value'], $length, $start,$idcat);
        
        $data = array();

        foreach ($blogs as $blog) {
            $blog['fechajm']=(new DateTime($blog['fecha']))->format('d/m/Y H:i:s');
            $blog['botones'] = '<center>';
            if($permiso['editar']==1){
                $blog['botones'] .= '<a href="javascript: Exeperu.editBlog(' . $blog['idblog'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
                $blog['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delBlog(' . $blog['idblog'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $blog['botones'] .= '</center>';

            $data[] = $blog;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mblogs->getTotal(),
            'recordsFiltered' => $this->mblogs->getTotal($search['value'],$idcat),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idblog=$this->input->post('id');
        $blog=$this->mblogs->getBlog($idblog);
        $this->mblogs->deletesitemap($blog['idsitemap']);
        $this->mblogs->deleteblog($idblog);
        
        $this->mblogs->deleteblogTags($idblog);
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
