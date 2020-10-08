<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/contenido');
		$this->load->model('frontend/taxonomia');

	}

	public function index($name="")
	{	
		
		$cat =  $this->uri->segment(1);
		$pagina=$this->taxonomia->getPaginaurl($cat);
		$data['pagina']=$pagina;
		$data['contenido'] = $this->contenido->getContenido($pagina['idpagina']);
		$data['confif'] = $this->contenido->getContenido(1);
		$data['menu'] = $this->contenido->getMenu();
		$data['products'] = $this->contenido->getProdOfCat($name);
		$data['category'] = $this->contenido->getOneSubCategoria($name);


        if(isset($_GET['test'])){
            print_r($data); exit();
        }

		$data['varify_product'] = 3;
		$this->load->view('frontend/subcategory', $data );
	}

	public function show($name='')
	{
		$cat =  $this->uri->segment(1);
		$subcat =  $this->uri->segment(2);
		$pagina=$this->taxonomia->getPaginaurl($cat);
		$data['pagina']=$pagina;
		$data['subcat'] = $this->uri->segment(2);
		$data['cat'] = $this->uri->segment(1);
		
		//$data['contenido'] = $this->contenido->getContenido($pagina['idpagina']);
		$data['confif'] = $this->contenido->getContenido(1);
		$data['menu'] = $this->contenido->getMenu();
		$data['product'] = $this->contenido->getProducts($name);
		
		$data['varify_product'] = true;
		//$data['category'] = $this->contenido->getOneSubCategoria($cat.'/'.$name.'/');

		$data['slide'] = $this->contenido->getSlideReleace($data['product']['category_id']);
		//$e = $data['product'];
		//  print_r($data['product']['relacionados']); exit();
		if(isset($data['product']['relacionados'])){
			foreach (json_decode($data['product']['relacionados']) as $row) {
			// 	foreach ($value['relacionados'] as $row) {
				$data['producto_rel'][] = $this->contenido->getOneProduct($row->imagenes);	   
			// 	}	
			}	
		}
		if(isset($_GET['test'])){
			print_r($data); 
			exit();
		}
		//print_r($data); exit();

		$this->load->view('frontend/detalle-de-producto', $data );
	}


	public function get_search($name='')
	{
		$a = $this->contenido->search_product($name);
		
		foreach ($a as $row) {

			echo '<li class="prod_r">';
                echo '<a href="'.base_url($row['cat_url'].'/'.$row['subcat_url'].'/'.$row['prod_url']).'">';
                  
                   echo "<p>".$row['titulo']."</p>"; 
                    echo "<img src='".base_url($row['imagen'])."' width='80'>";

                echo '</a>';
            echo '</li>';
		}
	}
	public function resultado()
	{
		$uri_segment = $this->uri->segment_array();
		$uri = implode('/',$uri_segment);
		
		//print_r(gettype($uri));exit();
		//print_r($uri));exit();



		$pagina=$this->taxonomia->getPaginaurl($uri);
		$data['pagina']=$pagina;
		
		$data['confif'] = $this->contenido->getContenido(1);
		$data['menu'] = $this->contenido->getMenu();
		$data['varify_product'] = false;
		$search = $this->input->post('search_get');
		$data['rows'] = $this->contenido->search_product($search, 20);
		//var_dump($query);
		$this->load->view('frontend/resultado', $data);
	}


	public function subscribe()
	{

		$where = array('email' => $this->input->post('subscribe'));
		$w = $this->db->get_where('suscribete', $where);

		if (!empty($this->input->post('subscribe')) ) {
			if (count($w->result_array())==0) {

				$this->db->insert('suscribete', $where);
				$respuesta = true;
				$msj = 'Suscrito con éxito';

			} else {
				$msj = 'Este correo ya esta registrado';
				$respuesta = false;
			}
		} else {
			$msj = 'Ingrese un correo electrónico válido';
			$respuesta = false;
		}
		return $this->output->set_content_type('application/json')
								->set_output(json_encode( ['resp'=> $respuesta, 'msj' => $msj] ));
	}

}

/* End of file Productos.php */
/* Location: ./application/controllers/Productos.php */