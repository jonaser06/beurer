<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mcontenido');
        $this->load->model('backend/mblogs');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }
    
    public function index(){
        $user=$this->manager['user']['idperfil'];
        $idmodulo=4;
        
		$data = array(           
            'pags'=>$this->sistema->getPaginas(),   
        );
		
		$key = null;
        foreach ($data['pags'] as $key => $pag0) {            
            $hijos = $this->sistema->getHijos($pag0['idpagina']);
            if ($hijos) {
                $data['pags'][$key]['hijos'] = $hijos;              
            }
        }
		
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['mods']=$this->sistema->getModulos($user);
        $output = $this->load->view('backend/paginas', $data, TRUE);

        return $this->__output($output);
    }
    
    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
        
        $user=$this->manager['user']['idperfil'];
        $idmodulo=4;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $paginas = $this->mcontenido->getPaginas($search['value'], $length, $start);
        
        $data = array();

        foreach ($paginas as $pagina) {
//            $pagina['fechajm']=(new DateTime($pagina['fecha']))->format('d/m/Y H:i:s');
            $pagina['botones'] = '<center>';
            if($permiso['editar']==1){
                $pagina['botones'] .= '<a href="manager/paginas/0/0/' . $pagina['idpagina'] . '" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
                /*if($pagina['idpagina']!=15){
                    $pagina['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.editPagina(' . $pagina['idpagina'] . ');" class="btn btn-info btn-sm btn-flat"><i class="fa fa-star"></i>Anuncios</a>';
                }*/
            }
            if($permiso['eliminar']==1){
                $pagina['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delPagina(' . $pagina['idpagina'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $pagina['botones'] .= '</center>';

            $data[] = $pagina;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mcontenido->getTotal(),
            'recordsFiltered' => $this->mcontenido->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
    
    public function  saveanuncios(){
        $post = $this->input->post();
        $pres = $post['anuncios_paginas']['anuncios_paginas'];
        
//        print_r($pres); exit;
        if(isset($pres) && !empty($pres)){
            $dec = json_decode($pres,TRUE);
//            print_r($dec); exit;
            $this->mcontenido->deleteanuncios($post['paginas']['idpagina']);
            foreach ($dec as $d) {
                $postp['anuncios'] = array("idcategoria" => $post['paginas']['idpagina'],
                    "imagen" => $d['imagen'],
                    "url" => $d['url'],
                    "iddimension" => $d['iddimension'],
                    "orden" => $d['orden'],
                    "idblog"=>0,
                    "idautor"=>0,
                    "estado" => $d['estado']);
                $this->mcontenido->guardaranuncios($postp);
            }
        }
        
        $mensaje=array("mensaje"=>"Anuncios registrados correctamente","tipo"=>1);
        
        echo json_encode($mensaje);
    }


    public function editpag() {
        $idpagina = $this->input->post('id', TRUE);
        $data['idpagina']=$idpagina;
        $anuncios_paginas = $this->mcontenido->getAnunciosPaginas($idpagina);
        $data['anuncios_paginas'] = json_encode($anuncios_paginas);
//        print_r($data['anuncios_paginas']); exit;
        $dimensiones = $this->mblogs->getDimensiones();
        $data['dimensiones']=json_encode($dimensiones);
        
        $output = $this->load->view('backend/popups/edit_pagina', $data, TRUE);

        return $this->__output($output);
    }

    public function edit($idj=0,$idx=0,$id=0) {

        $datapagina=$this->sistema->verpagina($id);
        $pagina =$datapagina['pagina'];
        $data = array(
            //'tabs' => array(),
            'categorias'=>$this->sistema->getContenedores($id),
            'pags'=>$this->sistema->getPaginas(),
//          'pagsf'=>$this->sistema->getPaginasf($user),
            'mods'=>$this->sistema->getModulos(),
            'variables' => $this->mcontenido->getVariables($id),
            'cat' => $this->sistema->getcat($id),
            'datapagina'=>$datapagina,
            'titulo' => $datapagina['pagina'],
            'pagina' => $id
        );
		
        //print_r($data['categorias']); exit();
		
		$key = null;
        foreach ($data['pags'] as $key => $pag0) {            
            $hijos = $this->sistema->getHijos($pag0['idpagina']);
            if ($hijos) {
                $data['pags'][$key]['hijos'] = $hijos;              
            }
        }
        //print_r($data); exit();
        // $verificarCategoria=$this->sistema->verificarCate($datapagina['idsitemap']);
        
        // if(isset($verificarCategoria) && !empty($verificarCategoria)){
        //     $data['categoria']=$verificarCategoria;
        // }
        
        $user=$this->manager['user']['idperfil'];
        $idmodulo=1;
        
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        
//        print_r($data['permiso']); exit;
        
        /*switch (TRUE) {
            case ($id == 21):
                $data['tabs'] = array(
                    array(
                        'tabname' => 'Registros',
                        'tabview' => 'backend/tabs/tab_categorias',
                        'tabcss' => '',
                        'tabjs' => 'mgr/exeperu/js/tabs/tab_categorias.js',
                        'idtipo'=> 1
                    )
                );
                break;
                case ($id == 22):
                    $data['tabs'] = array(
                        array(
                            'tabname' => 'Registros',
                            'tabview' => 'backend/tabs/tab_categorias',
                            'tabcss' => '',
                            'tabjs' => 'mgr/exeperu/js/tabs/tab_categorias.js',
                            'idtipo'=> 2
                        )
                    );
                break;
                case ($id == 23):
                    $data['tabs'] = array(
                        array(
                            'tabname' => 'Registros',
                            'tabview' => 'backend/tabs/tab_categorias',
                            'tabcss' => '',
                            'tabjs' => 'mgr/exeperu/js/tabs/tab_categorias.js',
                            'idtipo'=> 3
                        )
                    );
                break;
                case ($id == 24):
                    $data['tabs'] = array(
                        array(
                            'tabname' => 'Registros',
                            'tabview' => 'backend/tabs/tab_categorias',
                            'tabcss' => '',
                            'tabjs' => 'mgr/exeperu/js/tabs/tab_categorias.js',
                            'idtipo'=> 4
                        )
                    );
                break;
                case ($id == 37):
                    $data['tabs'] = array(
                        array(
                            'tabname' => 'Noticias',
                            'tabview' => 'backend/tabs/tab_noticias',
                            'tabcss' => '',
                            'tabjs' => 'mgr/exeperu/js/tabs/tab_noticias.js',
                        ),
                        array(
                            'tabname' => 'Ofertas',
                            'tabview' => 'backend/tabs/tab_ofertas',
                            'tabcss' => '',
                            'tabjs' => 'mgr/exeperu/js/tabs/tab_ofertas.js',
                        )
                    );
                break;
                case ($id == 38):
                    $data['tabs'] = array(
                        array(
                            'tabname' => 'Matrículas',
                            'tabview' => 'backend/tabs/tab_matriculas',
                            'tabcss' => '',
                            'tabjs' => 'mgr/exeperu/js/tabs/tab_matriculas.js',
                        )
                    );
                break;
        }*/
		
        $output = $this->load->view('backend/pagina-home', $data, TRUE);

        return $this->__output($output);
    }
    
    public function saveeditface(){
        $post= $this->input->post();
//        print_r($post); exit;
        $this->sistema->editsitemap($post); 

        $pagina=$this->sistema->getpaginasit($post['sitemap']['idsitemap']);
        
        $mensaje=array("mensaje"=>"Datos registrados correctamente","idpagina"=>$pagina['idpagina']);
//        echo 1;
        echo json_encode($mensaje);
        
    }
    public function savecategoria(){
        $post= $this->input->post();
        // print_r($post); exit;
        $this->sistema->updatecategoria($post);

        $pagina=$this->sistema->getpaginasit($post['categorias']['idsitemap']);
        
        $mensaje = [ 
             "mensaje"=> "Datos registrados correctamente", 
             "idpagina" => $pagina['idpagina'] 
            ];
        echo json_encode($mensaje);
        
    }
    public function saveedit(){
        $post= $this->input->post();
        $can_mdescription = strlen( $post['sitemap']['meta_description'] );
        $can_ptitle         = strlen($post['sitemap']['pagetitle']);
        $jm = array();
        if($can_ptitle>67){
            $errores[]="pagetitlejm";
        }else{
            $jm[]="pagetitlejm";
        }
        if($can_mdescription>155){
            $errores[]="meta_descriptionjm";
        }else{
            $jm[]="meta_descriptionjm";
        }
        if(isset($errores) && !empty($errores)){
            $mensaje=array(
                "mensaje"=>"Ha superado la cantidad de caracteres",
                "tipo"=> 2 ,
                "errores"=>json_encode($errores),
                "jm"=>json_encode($jm));
        }else{
    //        $categoria=$this->sistema->getCategoria($post['sitemap']['idsitemap']);
    //        if(isset($categoria) && !empty($categoria)){
    //            $jm=array("idcategoria"=>$categoria['idcategoria'],"categoria"=>$post['paginas']['pagina']);
    //    //        print_r($jm); exit;
    //            $this->sistema->updatecategoria($jm);
    //        }
    //         $this->sistema->editpagina($post);
            $this->sistema->editsitemap($post);

            $mensaje=array(
                "mensaje"=>"Datos registrados correctamente",
                "tipo"=>1,
                "idpagina"=>$post['sitemap']['idsitemap'],
                "jm"=>json_encode($jm),
            );
        }

        echo json_encode($mensaje);
        
    }

    public function guardar() {
        $post = $this->input->post(NULL, FALSE);
//        print_r($post); exit;
        $pagina = $this->input->post('pagina', TRUE);
        $datapagina=$this->sistema->verpagina($pagina);
        $datapaginajm=$this->sistema->verpagina($datapagina['idpagina']);
        $npag=$this->sistema->verpagina($datapaginajm['idparent']);
        $post = inputback($post);

        if ($this->setVariable($post)) {
            $mensaje=array("mensaje"=>"Datos registrados correctamente","tipo"=>1,"idpagina"=>$pagina);
        }
        
        echo json_encode($mensaje);
    }
    
    public function delete(){
        $idp=$this->input->post('id');
        $this->mcontenido->deletepagina($idp);
    }

    public function setVariable($variables = array(), $index = 0) {
        if ($this->mcontenido->setVariable($variables[$index])) {
            $index++;
            if (isset($variables[$index]) && !empty($variables[$index])) {
                return $this->setVariable($variables, $index);
            }
        }

        return TRUE;
    }
	
	
	public function getHijos(){
        $idparent = $this->input->post('idparent');
		//echo "<pre>";
		//print_r($paginas);exit;
        $paginas = $this->mcontenido->getPaginas(NULL, 0, 0, $idparent);  
		//echo "<pre>";
		//print_r($paginas);exit;
        echo json_encode($paginas);
    }

    private function __output($html = NULL) {
        // if (ENVIRONMENT === 'production') {
        //     $html = minifyHtml($html);
        // }

        $this->output->set_output($html);
    }

}
