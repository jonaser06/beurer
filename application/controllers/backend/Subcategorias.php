<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategorias extends CI_Controller {

	public function __construct()
	{
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
	public function string_sanitize($string, $force_lowercase = true, $anal = false) {

	    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",

	                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",

	                   "â€”", "â€“", ",", "<", ".", ">", "/", "?");

	    $clean = trim(str_replace($strip, "", strip_tags($string)));

	    $clean = preg_replace('/\s+/', "-", $clean);

	    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

	    return ($force_lowercase) ?

	        (function_exists('mb_strtolower')) ?

	            mb_strtolower($clean, 'UTF-8') :

	            strtolower($clean) :

	        $clean;

	}



	function seo_url($cadena){

	    $cadena= utf8_decode($cadena);

	    //$cadena = str_replace(' ', '-', $cadena);

	    $cadena = str_replace('?', '', $cadena);

	    $cadena = str_replace('+', '', $cadena);

	    $cadena = str_replace(':', '', $cadena);

	    $cadena = str_replace('??', '', $cadena);

	    $cadena = str_replace('`', '', $cadena);

	    $cadena = str_replace('!', '', $cadena);

	    $cadena = str_replace('¿', '', $cadena);

	    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??';

	    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

	    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

	   

	    return $cadena;

	    

	}
	public function index()
	{
		$user=$this->manager['user']['idperfil'];

        $data = array();

        $data['pags']=$this->sistema->getPaginas();

        $data['mods']=$this->sistema->getModulos($user);

        

        $key = null;

        foreach ($data['pags'] as $key => $pag0) {            

            $hijos = $this->sistema->getHijos($pag0['idpagina']);

            if ($hijos) {

                $data['pags'][$key]['hijos'] = $hijos;              

            }

        }

        

        foreach($data['mods'] as $modu){

            $modulosjm[]=$modu['idmodulo'];

        }

        

        if(isset($modulosjm)){

            $data['modulosjm']=$modulosjm;

        }else{

           $data['modulosjm']=[]; 

        }

        //$output = $this->load->view('backend/productos', $data, TRUE);



       // return $this->__output($output);

		//$data = [];
        //print_r($data); exit();
		return $this->load->view('backend/subcategorias', $data);
	}

	public function read()
	{
		$this->db->select('paginas.pagina, categorias.titulo, categorias.id');
		$this->db->join('paginas', 'paginas.idpagina = categorias.idpagina', 'left');
		$query = $this->db->get('categorias');

		return $this->output->set_content_type('application/json')
							->set_output(json_encode(['data'=> $query->result_array()]));
	}

	public function getCat()
	{	
		$cat = $this->db->select('*')
							->where('idparent', 2)
							->get('paginas');


		$catid = $this->input->post('catid');

		$this->db->select('paginas.pagina, categorias.*');

		if (!empty($catid)) {
			$this->db->where('categorias.id', $catid);
		}

		$this->db->join('paginas', 'paginas.idpagina = categorias.idpagina', 'left');
		$query = $this->db->get('categorias');
		if (!empty($catid)) {
			$data = $query->row_array();
		}else{
			$data = "";
		}
		

		return $this->output->set_content_type('application/json')
							->set_output(json_encode([
								'subcat'=> $data,
								'cat' => $cat->result_array()
							]));
	}

	public function save(){
		$subcatid = $this->input->post('subcatid');

		if(empty($subcatid)){
			$data = array(
			        'idpagina' => $this->input->post('categoria'),
			        'imagen' => $this->input->post('setimagen'),
			        'titulo' => $this->input->post('subcategoria'),
			        'subtitle' => $this->input->post('setsubtitulo'),
			        'contenido' => $this->input->post('setcontenido'),
			        'url' => $this->string_sanitize($this->seo_url($this->input->post('subcategoria')))
			);

			return $this->db->insert('categorias', $data);
		}else{
			$data = array(
			        'idpagina' => $this->input->post('categoria'),
			        'imagen' => $this->input->post('setimagen'),
			        'titulo' => $this->input->post('subcategoria'),
			        'subtitle' => $this->input->post('setsubtitulo'),
			        'contenido' => $this->input->post('setcontenido'),
			        'url' => $this->string_sanitize($this->seo_url($this->input->post('subcategoria')))
			);
			$this->db->where('id', $subcatid);
			return $this->db->update('categorias', $data);
		}
		

		//$mensaje=array("mensaje"=>"Bienvenido","tipo"=>1);
		//$mensaje=array("mensaje"=>"Los datos son incorrectos","tipo"=>2,"errores"=>json_encode($errores));
	}

	public function delete()
	{
		$subcatid = $this->input->post('subcatid');
		$this->db->where('id', $subcatid);
        $resp = $this->db->delete('categorias');

        echo json_encode($resp);
	}	

}

/* End of file Subcategorias 2.php */
/* Location: ./application/controllers/Subcategorias 2.php */