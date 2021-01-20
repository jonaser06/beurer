<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			
		
        $this->load->model('frontend/contenido');
		$this->load->model('frontend/taxonomia');
		$this->load->model('backend/urlamigrable');
		$this->load->model('backend/mproductos');
        $this->load->helper('general');
        $this->load->library('user_agent');
		$this->load->library('My_PHPMailer');

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
	public function index(){


		/*
		$d = $this->urlamigrable->getcat();

		foreach ($d as $value) {
			$url_amig = $this->string_sanitize($this->seo_url($value['titulo']));

			$data = ['prod_url' => $url_amig];	
			$this->urlamigrable->insert_data($data, $value['id']);
		}
		*/
				
		//echo $lang;
		
		$uri_segment = $this->uri->segment_array();
		$uri = implode('/',$uri_segment);
		$pagina = $this->taxonomia->getPaginaurl($uri);

        // echo "<pre>";
		//print_r($pagina);exit();
		// if(empty($pagina) && !isset($pagina)){
		// 	return $this->pageError();
		// }
		//echo $this->uri->uri_string;
		//it;
		

		//$data_rel = $this->contenido->getContenido(1);

		$data['confif'] = $this->contenido->getContenido(1);  // RETURN VIDEO
		$data['pagina'] = $pagina;//RETURN URI PAGINA
		$data['contenido'] = $this->contenido->getContenido($pagina['idpagina']);// RETURN VALUES :TYPE DATA OR OTHER
		$data['varify_product'] = false;
		
        $a = $pagina['idpagina'];

		if ($a == 3 || $a == 4 || $a == 5 || $a == 6 || $a == 7):
		    $data['category'] = $this->contenido->getSubCategoria($pagina['idpagina']);
		endif;

		$data['menu'] = $this->contenido->getMenu();
		
		if($pagina['idpagina'] == 1){
			foreach ($data['contenido']['destacado'] as $row) {
			// $data['dstcd'][] = $this->mproductos->getOneProductos($row['producto']);
			$prod_destacado = $this->mproductos->getOneProductos($row['producto']);
			$prod_destacado['imagen'] = $this->mproductos->getImgsDestacado((int)$prod_destacado['id']);
			$data['dstcd'][] =  $prod_destacado;
			}

			foreach ($data['contenido']['slideshow'] as $row) {
				$data['slideme'][] = $this->mproductos->getOneProductos($row['producto']);
			}

			$data['getbox'] = $this->contenido->getBoxContent();
		}

		if(isset($_GET['test'])){
			print_r($pagina['idpagina']);exit();
		}

		$language 	= $this->config->item('language');
		$lang 		= trim($language) == 'english' ? '' : 'es/';

		$data['lang'] = $lang;
		$data['uri'] = $uri;
		

		if ($uri == ''){
			$pag = 'index';
		}else{
			$pag = $uri;
		}
		
		if($uri == 'videos'){
			
			$categorias = $this->taxonomia->getCategoriasVideo();
			$data['categorias'] = $categorias;
			
			$videos = array();
			
			foreach($categorias as $categoria ){
				$videos[$categoria['idcategoria_video']] = $this->taxonomia->getVideosByCat($categoria['idcategoria_video']);
			}
			
			
			$data['videos'] = $videos;
			//echo "<pre>";
			//print_r($data['videos']);exit();
			
		}else if($uri == 'noticias'){
		
			$noticias = $this->taxonomia->getNoticias();
			
			$arrnot = array();
			
			foreach($noticias as $not){										
					$m = date("m",strtotime($not['fecha']));
					$y = date("Y",strtotime($not['fecha']));				
					$arrnot[$y.'-01-01'][] = $not;
			}	
		
			
			$data['noticias'] = $arrnot;
			
		}else{			
			
		}
		
		$output = $this->load->view('frontend/'.$pag.'', $data, TRUE);
        $this->output->set_header('Access-Control-Allow-Origin: *');
        return $this->__output($output);
	}
	
	public function detallenoticia($idnoti){
		$pagina=$this->taxonomia->getPaginaurl();
		
		$uri 			= $this->uri->uri_string;
		$uri_segment 	= $this->uri->segment_array();
		$uri 			= implode('/',$uri_segment);
		$data['uri'] 	= $uri;
		
		$language 	= $this->config->item('language');
		$lang 		= trim($language) == 'spanish' ? '' : 'en/';		
		$data['lang'] = $lang;		
		
		$data['pagina'] = $pagina; 
		
		$data['noticia'] = $this->taxonomia->getNoticiaById($idnoti);
		//print_r($data['noticia']);
		$data['plantasin']=$this->contenido->getContenido(12);
		$data['informacion']=$this->contenido->getContenido(1);
		
		$output = $this->load->view('frontend/post', $data, TRUE);

        $this->output->set_header('Access-Control-Allow-Origin: *');
        return $this->__output($output);
		
	}
	
	private function guardarFormulario($data,$destinatarios){
		
		$save = array(
			'nombres' 			=>	$data['nombres'],
			'apellidos'			=>	$data['apellidos'],
			'email'				=>	$data['email'],
			'telefono'			=>	$data['telefono'],
			'departamento'		=>	isset($data['departamento']) ? $data['departamento'] : null,
			'distrito'			=>	isset($data['distrito']) ? $data['distrito'] : null,
			'dni'				=>	$data['dni'],
			'certificado'		=>	$data['certificado'],
			'cuota'				=>	$data['cuota_mensual'],
			'landing_nombre'	=>	$data['landing'],
			'landing_url'		=>	$_SERVER["HTTP_REFERER"],
			'email_send' 		=>	json_encode($destinatarios),
			'fecha'				=>	date("Y-m-d H:i:s"),
			'acepta_terminos'	=>	$data['acepta']
		);
	
		$this->taxonomia->saveLanding($save);	
		
	}
	
	private function sendMail($data = array()) {
        $mailer = new PHPMailer();


        if (!empty($data)) {
            try {
                $mailer->CharSet = 'UTF-8';
                $mailer->isHTML(true);
                $mailer->setFrom($data['remitente']['email'], $data['remitente']['nombre']);

                foreach ($data['destinatarios'] as $key => $destinatario) {
                    $mailer->addAddress($destinatario['email'], $destinatario['nombre']);
                }

				$mailer->AddBCC("jsanchez@exe.pe", "Soporte exe");

                $mailer->Subject = $data['asunto'];
                $mailer->msgHTML($data['mensaje']);
				
				if(isset( $data['full_path'])){
					$mailer->AddAttachment( $data['full_path'], $data['path'] );
				}

                return $mailer->send();
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mailer->ErrorInfo;
            }
        }
    }
	
	public function enviarform(){

        $uri_segment = $this->uri->segment_array();
        $uri = implode('/',$uri_segment);
        $pagina=$this->taxonomia->getPaginaurl($uri);

        $data['confif'] = $this->contenido->getContenido(1);

        $data['pagina']=$pagina;

        $data['contenido'] = $this->contenido->getContenido($pagina['idpagina']);

        $data['varify_product'] = false;

        $data['category'] = $this->contenido->getSubCategoria($pagina['idpagina']);

        $data['menu'] = $this->contenido->getMenu();

		if(isset($_POST['name'])){
			$data['menu'] = $this->contenido->getMenu();
			$data['confif'] = $this->contenido->getContenido(1);
			
			$post = $this->input->post();		
			$post['fecha'] = date('Y-m-d H:i:s');
			$fileLoad = "";
			$asunto = "contactenos";
			$tmp = "mail-contactenos";
			$destinatarios = array(
				array(
						'email' 	=> 'ventas@beurer.pe',
						'nombre' 	=> 'Beurer'
					)
			);		
			
			$dataMail = array(
				'remitente' => array(
					//'email' => 'soporte@exe.pe',
                    'email' => $post['email'],
					'nombre' => 'Buerer'
				),
				'destinatarios' => $destinatarios,
				'asunto' => 'WEB BEURER - Nuevo mensaje de '.$asunto,
				'mensaje' => $this->load->view('frontend/'.$tmp, $post, TRUE),
				'full_path' => isset ($arrLoad['full_path']) ? $arrLoad['full_path'] : '',
				'path' => isset ($arrLoad['path']) ? $arrLoad['path'] : ''
			);
					
			$this->sendMail($dataMail);
			
			$uri 			= $this->uri->uri_string;
			$uri_segment 	= $this->uri->segment_array();
			$uri 			= implode('/',$uri_segment);
			$data['uri'] 	= $uri;
			$data['informacion']=$this->contenido->getContenido(1);
			$language 	= $this->config->item('language');
			$lang 		= trim($language) == 'spanish' ? '' : 'en/';		
			$data['lang'] = $lang;
			
			
			$output = $this->load->view('frontend/gracias', $data, TRUE);

	        $this->output->set_header('Access-Control-Allow-Origin: *');
	        return $this->__output($output);
		}
		
		
	}
	
	public function upLoadFile(){
		
			$data = array();			
			//load form validation library
			$this->load->library('form_validation');
			
			//load file helper
			$this->load->helper('file');
        
			$config['upload_path']   = 'assets/sources/archivosAdj';
			$config['allowed_types'] = 'gif|jpg|png|pdf|docx|jpeg';
			$config['max_size']      = 20480;//1024;
			$this->load->library('upload', $config);
			
			//upload file to directory
			if($this->upload->do_upload('adjunto')){
				$uploadData = $this->upload->data();
				$uploadedFile = $uploadData['file_name'];
				
				$data['status'] = 1;
				$data['path'] = $uploadData['file_name'];
				$data['full_path'] = $uploadData['full_path'];
			}else{
				$data['status'] = 0;
				$data['error_msg'] = $this->upload->display_errors();
			}
			
        	return $data;
	}
	
	public function getCuota(){
		
		$idcert = $this->input->post('idcert');
		$certificado = $this->taxonomia->getCertificadoById($idcert);
		
		$result = array(
			'cuota' => $certificado['cuota']
		);
		
		header('Content-Type: application/json');
		echo json_encode($result);
	
	}
	
	public function getLocal(){
		
		$idlocal = $this->input->post('idlocal');
		$local = $this->taxonomia->getLocalById($idlocal);	
		
		header('Content-Type: application/json');
		echo json_encode($local);
		
	}
	
	public function getProvincias(){
		
		$iddep = $this->input->post('iddep');
		$provincias = $this->taxonomia->getProvinciasByDep_ub($iddep);
		
		$result = '<option value="0">PROVINCIA</option>';
		
		foreach ( $provincias as $prov){
			$result .= '<option value="'.$prov['idProv'].'">'.$prov['provincia'].'</option>'; 
		}
		
		echo $result;
	
	}


	public function pageError() {
        $data = array(
            'conte'=>$this->contenido->getContenido(1)
        );
        $this->load->view('frontend/404',$data);
    }    
    
    private function __output($html = NULL) {
	    // if (ENVIRONMENT === 'production') {
	    //     $html = minifyHtml($html);
	    // }

	    $this->output->set_output($html);
	}


}

/* End of file request.php */
/* Location: ./application/controllers/request.php */
