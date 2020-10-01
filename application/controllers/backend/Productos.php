<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Productos extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->model('backend/sistema');

        $this->load->model('backend/mproductos');

		$this->load->helper(array('form', 'url'));

		$this->load->helper('general');



		if ($this->session->has_userdata('manager')) {

            $this->manager = $this->session->userdata('manager'); 

        } else {

            redirect('manager');

        }

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

		return $this->load->view('backend/productos', $data);

	}



	public function read(){
		$data = $this->mproductos->getProductos();
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode(['data'=> $data]));
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



	public function save()

	{
		


		$input = $this->input->post('productos');

		//var_dump($input);
		
		$data_in = array(
			'categoria_id' => (empty($input['subcategoria']))? '3': $input['subcategoria'],
			'titulo' => $input['producto'],
			'subtitulo' => $input['subtitulo'],
			'contenido' => $input['contenido'],
			'accesorios' => $input['accesorio'],
			'descripcion' => $input['descripcion'],
			'ficha_tecnica' => $input['ficha_tecnica'],
			'marcas' => $input['marcas'],
			'tipo' => '',
			'pdf' => $input['pdf'],
			'prod_url' => $this->string_sanitize($this->seo_url($input['producto'])),
			'pagetitle' => $input['pagetitle'],
			'meta_description' => $input['meta_description'],
			'meta_keyword' => $input['meta_keyword'],
			'og_title' => $input['og_title'],
			'og_description' => $input['og_description'],
			'og_image' => $input['og_image'],
			'video' => $input['video'],
			'active' => $input['active'],
			'relacionados' => $input['relacionados'],
            'orden' => $input['orden']
		);

		$bigdata = array(
			'data' => $data_in,
			'idproducto' => $input['idproducto']
		);



		$setproid= $this->mproductos->setProducto($bigdata);
		//echo $setid;
		
		
		
		if( trim($input['imagenes']) == '[]' ){

			$data = array('img' => 'assets/sources/no-imagen.jpg', 'producto_id'=> $setproid);
			$this->mproductos->setImagenProducts($data);

		}else{
			
			foreach (json_decode($input['imagenes']) as $row) {

				if (is_numeric($row->idcolumn)) {

					$data = array('id' => $row->idcolumn, 'img' => $row->imagenes);
					$this->mproductos->setImagenProducts($data);
				}else{
					$data = array('img' => $row->imagenes, 'producto_id'=> $setproid);
					$this->mproductos->setImagenProducts($data);
					//add New imagenes

					/*
					if ( !empty($input['idproducto']) ) {
						$data = array('img' => $row->imagenes, 'producto_id'=> $setproid);
						$this->mproductos->setImagenProducts($data);
					}else{
						$data = array('img' => $row->imagenes, 'producto_id'=> $setproid);
						$this->mproductos->setImagenProducts($data);
					}
					*/
				}
				
			}
		}
		
		
		

		//var_dump($input);

	}

	public function eliminarImagen()
	{
		$this->db->where('id', $this->input->post('imagen_id'));
		$this->db->delete('imagenes');
	}


	public function eliminar(){
		
		$product_id = $this->input->post('idproducto');
		// eliminamos la imagen
		$this->db->delete('imagenes', array('producto_id' => $product_id));

		// eliminamos el producto
		$this->db->delete('productos', array('id' => $product_id));
	}

	public function get($id=0)

	{

		$this->db->where('id', $id);

		$qry = $this->db->get('categorias');

		return $this->output

					->set_content_type('application/json')

					->set_output(json_encode(['data'=> $qry->row_array()]));

	}



	public function dalete($id=0)

	{

		$this->db->where('id', $id);

		$this->db->delete('categorias');

	}

	public function getOneProduct($name='')
	{
		# code...
	}


	public function getprducts($id=0)

	{

		$this->db->where('categoria_id', $id);

		$qry = $this->db->get('productos');



		

		return $this->output

					->set_content_type('application/json')

					->set_output(json_encode(['data'=> $qry->result_array()]));

	}

	public function edit()
	{
	    $idproducto = $this->input->post('id', TRUE);

        $data = array(
            'producto' => $this->mproductos->getProducto($idproducto),
            //'tipos'=>$this->mproductos->getTiposp(),
           	'imagenes'=>$this->mproductos->getImagenes($idproducto),
           	'categorias'=>$this->mproductos->getCategoria($idproducto),
          //  'unidadmedida' =>$this->mproductos->getUnidadMedida()
        );
        
        //print_r($data['producto']); exit;
//        $data['subcategoriasjm']=array_column($this->mproductos->getProdSubcategoria($idproducto),"idsubcategoria");
       // $subcategoriasjm=$this->mproductos->getProdSubcategoria($idproducto);
      /*  echo $idproducto;
        print_r($subcategoriasjm);
        exit;*/

        //$data['productos_subcategorias']=json_encode($subcategoriasjm);
       // $data['subcategorias']=json_encode($this->mproductos->getSubcategoriasjmjm());
//        print_r($data['subcategoriasjm']); exit;
        //$productos_complementos = $this->mproductos->getProductosComplementos($data['producto']['idproducto']);
//        print_r($productos_complementos); exit;
       // $data['productos_complementos'] = json_encode($productos_complementos);
//        print_r($productos_complementos); exit;
        //$productos=$this->mproductos->liscomplementos();
        //$data['productos']=json_encode($productos);

        /*echo "<pre>";*/
        //print_r($data);

        $output = $this->load->view('backend/popups/edit_producto', $data, TRUE);

        return $this->__output($output);
	}


	private function __output($html = NULL) {
        /*if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }*/

        $this->output->set_output($html);
    }


}



/* End of file Productos.php */

/* Location: ./application/controllers/Productos.php */