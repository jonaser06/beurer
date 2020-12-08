<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/msuscriptores');
        $this->load->helper('general');

        // if ($this->session->has_userdata('manager')) {
        //     $this->manager = $this->session->userdata('manager');
        // } else {
        //     redirect('manager');
        // }
    }

    public function setoferta(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = [
                'nombres' => $this->input->post('nombres'),
                'apellidos' => $this->input->post('apellidos'),
                'correo' => $this->input->post('correo'),
                'id_session' => (int)$this->input->post('session'),
                'ofertas' => 1
            ];
            $this->dbInsert('clientes_ofertas', $data);
            $this->resp['status'] = true;
            $this->resp['code'] = 200;
            $this->resp['message'] = 'Insertado correctamente';
            $this->resp['data'] = $data;
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($this->resp));
                return;
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($this->resp));
            return;
    }

    public function index(){
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => '',
        ];
        


        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output(json_encode($resp));
    }

    public function get_report(){
        $currentpage = ($this->input->get('page'))?$this->input->get('page'):1;
        $start = $this->input->post('fecha');
        if( $start != null ) {
            $exp = explode(' - ', $start);
            $start = $exp[0];
            $end   = $exp[1];
            $w = [
                'p.pedido_fecha >='=> $start,
                'p.pedido_fecha <='=> $end
            ];

            $this->db->select('pd.id_pedido_detalle, pd.id_pedido, pd.id_producto, p.nombres, p.apellidos, p.telefono, p.correo, p.tipo_documento, p.numero_documento, p.provincia, p.distrito, p.dir_envio, p.entrega_precio, p.productos_precio, p.cupon_descuento, p.pedido_fecha, p.pedido_estado, pr.titulo');
            $this->db->from('pedido_detalle as pd');
            $this->db->join('pedido as p', 'p.id_pedido = pd.id_pedido_detalle');
            $this->db->join('productos as pr', 'pr.id = pd.id_producto');
            $this->db->where($w);
            $query = $this->db->get()->result_array();

            if($query){
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->resp['data'] = $query;
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
            }else{
                $this->resp['status'] = false;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'Sin resultados';
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
            }
        }

        $pagination = $this->pagination('pedido_detalle', $currentpage );

        $this->db->select('pd.id_pedido_detalle, pd.id_pedido, pd.id_producto, p.nombres, p.apellidos, p.telefono, p.correo, p.tipo_documento, p.numero_documento, p.provincia, p.distrito, p.dir_envio, p.entrega_precio, p.productos_precio, p.cupon_descuento, p.pedido_fecha, p.pedido_estado, pr.titulo');
        $this->db->from('pedido_detalle as pd');
        $this->db->join('pedido as p', 'p.id_pedido = pd.id_pedido_detalle');
        $this->db->join('productos as pr', 'pr.id = pd.id_producto');
        $this->db->limit($pagination['forpage'],$pagination['offset']);
        $query = $this->db->get()->result_array();

        if($query){
            $this->resp['status'] = true;
            $this->resp['code'] = 200;
            $this->resp['message'] = 'find One!';
            $this->resp['data'] = $query;
            
            $this->resp['currentpage'] 	= $currentpage;
            $this->resp['paginas'] 		= $pagination['pagination'];
            $this->resp['previus_page'] = $pagination['previus_page'];
            $this->resp['next_page'] 	= $pagination['next_page'];
            
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($this->resp));
                return;
        }else{
            $this->resp['status'] = false;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'Sin resultados';
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
        }
        

    }

    public function reportexsl(){
        setlocale(LC_ALL, 'es_PE');
        

        $salida = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body><table border="1">';
        $salida .= '<tr>';
        $salida .= '<td>Reporte</td>';
        $salida .= '<td>Pedido</td>';
        $salida .= '<td>id Producto</td>';
        $salida .= '<td>Nombres</td>';
        $salida .= '<td>Apellidos</td>';
        $salida .= '<td>Telefono</td>';
        $salida .= '<td>Correo</td>';
        $salida .= '<td>Tipo documento</td>';
        $salida .= '<td>N° documento</td>';
        $salida .= '<td>Provincia</td>';
        $salida .= '<td>Distrito</td>';
        $salida .= '<td>Direccion</td>';
        $salida .= '<td>Precio de envio</td>';
        $salida .= '<td>Precio de producto</td>';
        $salida .= '<td>Cupon</td>';
        $salida .= '<td>Fecha</td>';
        $salida .= '<td>Estado</td>';
        $salida .= '<td>Producto</td>';
        $salida .= '</tr>';    

        $start = $this->input->post('fecha');
        if( $start != null ) {
            $exp = explode(' - ', $start);
            $start = $exp[0];
            $end   = $exp[1];
            $w = [
                'p.pedido_fecha >='=> $start,
                'p.pedido_fecha <='=> $end
            ];

            $this->db->select('pd.id_pedido_detalle, pd.id_pedido, pd.id_producto, p.nombres, p.apellidos, p.telefono, p.correo, p.tipo_documento, p.numero_documento, p.provincia, p.distrito, p.dir_envio, p.entrega_precio, p.productos_precio, p.cupon_descuento, p.pedido_fecha, p.pedido_estado, pr.titulo');
            $this->db->from('pedido_detalle as pd');
            $this->db->join('pedido as p', 'p.id_pedido = pd.id_pedido_detalle');
            $this->db->join('productos as pr', 'pr.id = pd.id_producto');
            $this->db->where($w);
            $query = $this->db->get()->result_array();
            /* var_dump($reclamos);
            exit; */
            foreach ($query as $key => $value) {
                $estado = '';
                if($value['pedido_estado'] =='1'){
                    $estado = 'Orden Generada';
                }elseif($value['pedido_estado'] =='2'){
                    $estado = 'Preparando Pedido';
                }elseif($value['pedido_estado'] =='3'){
                    $estado = 'Listo para el recojo';
                }else{
                    $estado = 'Pedido entregado';
                }
                $salida .= '<tr>';
                $salida .= '<td>'.$value['id_pedido_detalle'].'</td>';
                $salida .= '<td>'.$value['id_pedido'].'</td>';
                $salida .= '<td>'.$value['id_producto'].'</td>';
                $salida .= '<td>'.$value['nombres'].'</td>';
                $salida .= '<td>'.$value['apellidos'].'</td>';
                $salida .= '<td>'.$value['telefono'].'</td>';
                $salida .= '<td>'.$value['correo'].'</td>';
                $salida .= '<td>'.$value['tipo_documento'].'</td>';
                $salida .= '<td>'.$value['numero_documento'].'</td>';
                $salida .= '<td>'.$value['provincia'].'</td>';
                $salida .= '<td>'.$value['distrito'].'</td>';
                $salida .= '<td>'.$value['dir_envio'].'</td>';
                $salida .= '<td>'.$value['entrega_precio'].'</td>';
                $salida .= '<td>'.$value['productos_precio'].'</td>';
                $salida .= '<td>'.$value['cupon_descuento'].'</td>';
                $salida .= '<td>'.$value['pedido_fecha'].'</td>';
                $salida .= '<td>'.$estado.'</td>';
                $salida .= '<td>'.$value['titulo'].'</td>';
                $salida .= '</tr>';    
            }
    
            $salida .= '</table></body></html>';
    
            $this->output->set_header("Content-Disposition: attachment; filename=reclamos_" . date('Y-m-d') . ".xls");
            $this->output->set_content_type('application/vnd.ms-excel charset=iso-8859-1');
            $this->output->set_output($salida);

            return;

        }

        $this->db->select('pd.id_pedido_detalle, pd.id_pedido, pd.id_producto, p.nombres, p.apellidos, p.telefono, p.correo, p.tipo_documento, p.numero_documento, p.provincia, p.distrito, p.dir_envio, p.entrega_precio, p.productos_precio, p.cupon_descuento, p.pedido_fecha, p.pedido_estado, pr.titulo');
        $this->db->from('pedido_detalle as pd');
        $this->db->join('pedido as p', 'p.id_pedido = pd.id_pedido_detalle');
        $this->db->join('productos as pr', 'pr.id = pd.id_producto');

        $query = $this->db->get()->result_array();
        foreach ($query as $key => $value) {
            $estado = '';
            if($value['pedido_estado'] =='1'){
                $estado = 'Orden Generada';
            }elseif($value['pedido_estado'] =='2'){
                $estado = 'Preparando Pedido';
            }elseif($value['pedido_estado'] =='3'){
                $estado = 'Listo para el recojo';
            }else{
                $estado = 'Pedido entregado';
            }
            $salida .= '<tr>';
            $salida .= '<td>'.$value['id_pedido_detalle'].'</td>';
            $salida .= '<td>'.$value['id_pedido'].'</td>';
            $salida .= '<td>'.$value['id_producto'].'</td>';
            $salida .= '<td>'.$value['nombres'].'</td>';
            $salida .= '<td>'.$value['apellidos'].'</td>';
            $salida .= '<td>'.$value['telefono'].'</td>';
            $salida .= '<td>'.$value['correo'].'</td>';
            $salida .= '<td>'.$value['tipo_documento'].'</td>';
            $salida .= '<td>'.$value['numero_documento'].'</td>';
            $salida .= '<td>'.$value['provincia'].'</td>';
            $salida .= '<td>'.$value['distrito'].'</td>';
            $salida .= '<td>'.$value['dir_envio'].'</td>';
            $salida .= '<td>'.$value['entrega_precio'].'</td>';
            $salida .= '<td>'.$value['productos_precio'].'</td>';
            $salida .= '<td>'.$value['cupon_descuento'].'</td>';
            $salida .= '<td>'.$value['pedido_fecha'].'</td>';
            $salida .= '<td>'.$estado.'</td>';
            $salida .= '<td>'.$value['titulo'].'</td>';
            $salida .= '</tr>';   
        }

        $salida .= '</table></body></html>';

        $this->output->set_header("Content-Disposition: attachment; filename=reportes_" . date('Y-m-d') . ".xls");
        $this->output->set_content_type('application/vnd.ms-excel charset=iso-8859-1');
        $this->output->set_output($salida);
    }

    public function get_reclamos(){

        // if(!$this->input->get('page')) header('location:'.URL_BASE.'admin/listproduct?page=1');
        $currentpage = ($this->input->get('page'))?$this->input->get('page'):1;
        
        $start = $this->input->post('fecha');
        if( $start != null ) {
            $exp = explode(' - ', $start);
            $start = $exp[0];
            $end   = $exp[1];
            $w = [
                    'r_fecha >='=> $start,
                    'r_fecha <='=> $end
                ];

            $query = $this->dbSelect('*','reclamos', $w);
            if($query){
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->resp['data'] = $query;
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
            }else{
                $this->resp['status'] = false;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'Sin resultados';
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
            }
        }
        
        $pagination = $this->pagination('reclamos', $currentpage );
        $query = $this->dbSelect('*','reclamos', [], '', true, $pagination['forpage'], $pagination['offset'] );

        if($query){
            $this->resp['status'] = true;
            $this->resp['code'] = 200;
            $this->resp['message'] = 'find One!';
            $this->resp['data'] = $query;
    
            $this->resp['currentpage'] 	= $currentpage;
            $this->resp['paginas'] 		= $pagination['pagination'];
            $this->resp['previus_page'] = $pagination['previus_page'];
            $this->resp['next_page'] 	= $pagination['next_page'];
            
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($this->resp));
                return;
        }else{
            $this->resp['status'] = false;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'Sin resultados';
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
        }
        
    }

    public function reclamosxsl(){
        
        setlocale(LC_ALL, 'es_PE');
        

        $salida = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body><table border="1">';
        $salida .= '<tr>';
        $salida .= '<td>Fecha de Reclamo</td>';
        $salida .= '<td>N° ORDEN </td>';
        $salida .= '<td>Fecha Pedido</td>';
        $salida .= '<td>Tipo de Entrega</td>';
        $salida .= '<td>reclamo</td>';
        $salida .= '<td>Tipo de documento</td>';
        $salida .= '<td>Numero de documento</td>';
        $salida .= '<td>Nombres</td>';
        $salida .= '<td>Apellido Paterno</td>';
        $salida .= '<td>Apellido Materno</td>';
        $salida .= '<td>Telefono</td>';
        $salida .= '<td>Correo</td>';
        $salida .= '<td>Departamento</td>';
        $salida .= '<td>Provincia</td>';
        $salida .= '<td>Distrito</td>';
        $salida .= '<td>Direccion</td>';
        $salida .= '<td>Menor de edad</td>';
        $salida .= '<td>Nombres (Apoderado)</td>';
        $salida .= '<td>Tipo de documento (Apoderado)</td>';
        $salida .= '<td>Numero de documento (Apoderado)</td>';
        $salida .= '<td>Telefono (Apoderado)</td>';
        $salida .= '<td>Correo (Apoderado)</td>';
        $salida .= '<td>Tipo de bien</td>';
        $salida .= '<td>Monto</td>';
        $salida .= '<td>Descripcion</td>';
        $salida .= '<td>Tipo de reclamo</td>';
        $salida .= '<td>Descripcion del reclamo</td>';
        $salida .= '<td>Pedido</td>';
        $salida .= '</tr>';    

        $start = $this->input->post('fecha');
        if( $start != null ) {
            $exp = explode(' - ', $start);
            $start = $exp[0];
            $end   = $exp[1];
            $w = [
                    'r_fecha >='=> $start,
                    'r_fecha <='=> $end
                ];

            $reclamos = $this->dbSelect('*','reclamos', $w);
            foreach ($reclamos as $key => $value) {
                $pedido = $this->get('pedido',['codigo' => $value['r_codigo']]) ;
                $tipo_entrega = intval($pedido['recojo']) == 1 ? 'Recoger en Tienda' : 'Envío a domicilio';
                $menor = ($value['r_menor'] == 1 )?'Si':'No';
                $tipo = intval($value['r_tipo_doc']);
                $tipoDoc = $tipo == 1 ? 'DNI' : ( $tipo == 2 ? 'PASAPORTE' :'CE');
                $salida .= '<tr>';
                $salida .= '<td>'.$value['r_fecha'].'</td>';
                $salida .= '<td>'.$pedido['codigo'].'</td>';
                $salida .= '<td>'.$pedido['pedido_fecha'].'</td>';
                $salida .= '<td>'.$tipo_entrega.'</td>';
                $salida .= '<td>'.$value['id_reclamo'].'</td>';
                $salida .= '<td>'.$tipoDoc.'</td>';
                $salida .= '<td>'.$value['r_n_doc'].'</td>';
                $salida .= '<td>'.$value['r_nombr'].'</td>';
                $salida .= '<td>'.$value['r_apat'].'</td>';
                $salida .= '<td>'.$value['r_amat'].'</td>';
                $salida .= '<td>'.$value['r_telef'].'</td>';
                $salida .= '<td>'.$value['r_correo'].'</td>';
                $salida .= '<td>'.$value['r_depa'].'</td>';
                $salida .= '<td>'.$value['r_prov'].'</td>';
                $salida .= '<td>'.$value['r_dist'].'</td>';
                $salida .= '<td>'.$value['r_direc'].'</td>';
                $salida .= '<td>'.$menor.'</td>';
                $salida .= '<td>'.$value['r_apd_nombr'].'</td>';
                $salida .= '<td>'.$value['r_apd_tip'].'</td>';
                $salida .= '<td>'.$value['r_apd_doc'].'</td>';
                $salida .= '<td>'.$value['r_apd_telf'].'</td>';
                $salida .= '<td>'.$value['r_apd_corr'].'</td>';
                $salida .= '<td>'.$value['r_tipo_bn'].'</td>';
                $salida .= '<td>'.$value['r_mont'].'</td>';
                $salida .= '<td>'.$value['r_descr'].'</td>';
                $salida .= '<td>'.$value['r_tip_rec'].'</td>';
                $salida .= '<td>'.$value['r_rec_desc'].'</td>';
                $salida .= '<td>'.$value['r_rec_pedi'].'</td>';
                $salida .= '</tr>';    
            }
    
            $salida .= '</table></body></html>';
            $this->output->set_header("Content-Disposition: attachment; filename=reclamos_" . date('Y-m-d') . ".xls");
            $this->output->set_content_type('application/vnd.ms-excel charset=iso-8859-1');
            $this->output->set_output($salida);

            return;

        }

        $reclamos = $this->dbSelect('*','reclamos', []);
        foreach ($reclamos as $key => $value) {
            $pedido = $this->get('pedido',['codigo' => $value['r_codigo']]) ;
            $tipo_entrega = intval($pedido['recojo']) == 1 ? 'Recoger en Tienda' : 'Envío a domicilio';
            $menor = ($value['r_menor'] == 1 )?'Si':'No';
            $tipo = intval($value['r_tipo_doc']);
            $tipoDoc = $tipo == 1 ? 'DNI' : ( $tipo == 2 ? 'PASAPORTE' :'CE');
            $salida .= '<tr>';
            $salida .= '<td>'.$value['r_fecha'].'</td>';
            $salida .= '<td>'.$pedido['codigo'].'</td>';
            $salida .= '<td>'.$pedido['pedido_fecha'].'</td>';
            $salida .= '<td>'.$tipo_entrega.'</td>';
            $salida .= '<td>'.$value['id_reclamo'].'</td>';
            $salida .= '<td>'.$tipoDoc.'</td>';
            $salida .= '<td>'.$value['r_n_doc'].'</td>';
            $salida .= '<td>'.$value['r_nombr'].'</td>';
            $salida .= '<td>'.$value['r_apat'].'</td>';
            $salida .= '<td>'.$value['r_amat'].'</td>';
            $salida .= '<td>'.$value['r_telef'].'</td>';
            $salida .= '<td>'.$value['r_correo'].'</td>';
            $salida .= '<td>'.$value['r_depa'].'</td>';
            $salida .= '<td>'.$value['r_prov'].'</td>';
            $salida .= '<td>'.$value['r_dist'].'</td>';
            $salida .= '<td>'.$value['r_direc'].'</td>';
            $salida .= '<td>'.$menor.'</td>';
            $salida .= '<td>'.$value['r_apd_nombr'].'</td>';
            $salida .= '<td>'.$value['r_apd_tip'].'</td>';
            $salida .= '<td>'.$value['r_apd_doc'].'</td>';
            $salida .= '<td>'.$value['r_apd_telf'].'</td>';
            $salida .= '<td>'.$value['r_apd_corr'].'</td>';
            $salida .= '<td>'.$value['r_tipo_bn'].'</td>';
            $salida .= '<td>'.$value['r_mont'].'</td>';
            $salida .= '<td>'.$value['r_descr'].'</td>';
            $salida .= '<td>'.$value['r_tip_rec'].'</td>';
            $salida .= '<td>'.$value['r_rec_desc'].'</td>';
            $salida .= '<td>'.$value['r_rec_pedi'].'</td>';
            $salida .= '</tr>';    
        }

        $salida .= '</table></body></html>';

        $this->output->set_header("Content-Disposition: attachment; filename=reclamos_" . date('Y-m-d') . ".xls");
        $this->output->set_content_type('application/vnd.ms-excel charset=iso-8859-1');
        $this->output->set_output($salida);
    }

    public function getprovincia(){
        $file = file_get_contents('assets/js/ubigeo.min.js');
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output($file);
    }

    public function setreclamo(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = [
                'r_tipo_doc' => $this->input->post('r_tipo_doc'),
                'r_n_doc' => $this->input->post('r_n_doc'),
                'r_nombr' => $this->input->post('r_nombr'),
                'r_apat' => $this->input->post('r_apat'),
                'r_amat' => $this->input->post('r_amat'),
                'r_telef' => $this->input->post('r_telef'),
                'r_correo' => $this->input->post('r_correo'),
                'r_depa' => $this->input->post('r_depa'),
                'r_prov' => $this->input->post('r_prov'),
                'r_dist' => $this->input->post('r_dist'),
                'r_direc' => $this->input->post('r_direc'),
                'r_menor' => $this->input->post('r_menor'),
                'r_apd_nombr' => $this->input->post('r_apd_nombr'),
                'r_apd_tip' => $this->input->post('r_apd_tip'),
                'r_apd_doc' => $this->input->post('r_apd_doc'),
                'r_apd_telf' => $this->input->post('r_apd_telf'),
                'r_apd_corr' => $this->input->post('r_apd_corr'),
                'r_tipo_bn' => $this->input->post('r_tipo_bn'),
                'r_mont' => $this->input->post('r_mont'),
                'r_descr' => $this->input->post('r_descr'),
                'r_codigo' => $this->input->post('r_codigo'),
                'r_tip_rec' => $this->input->post('r_tip_rec'),
                'r_rec_desc' => $this->input->post('r_rec_desc'),
                'r_rec_pedi' => $this->input->post('r_rec_pedi'),
                'r_fecha' => date('Y-m-d H:i:s')
            ];
                $this->dbInsert('reclamos',$data);
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->resp['data'] = $data;
                $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode($this->resp));
                 $data['message'] = 'Tu reclamo se envio correctamente.';
                 $data2['message'] = 'Tienes un nuevo reclamo a travez de beurer.pe';
                 $enviar = $this->sendmail('reclamos@beurer.pe', $data, 'RECLAMO ENVIADO', 'new_reclam.php');
                 $enviar = $this->sendmail('reclamos@beurer.pe', $data2, 'TIENES UN NUEVO RECLAMO', 'new_reclam.php');
                 return;
        }
        $this->resp['message'] = 'Ocurrio un error en la petición';
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(404)
             ->set_output(json_encode($this->resp));

    }

    public function setregister(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'apellido_paterno' => $this->input->post('apellido_paterno'),
                'apellido_materno' => $this->input->post('apellido_materno'),
                'correo' => $this->input->post('correo'),
                'contrasena' => hash('sha256',$this->input->post('contrasena')),
                'departamento' => $this->input->post('departamento'),
                'provincia' => $this->input->post('provincia'),
                'distrito' => $this->input->post('distrito'),
                'direccion' => $this->input->post('direccion'),
                'referencia' => $this->input->post('referencia'),
                'telefono' => $this->input->post('telefono'),
                'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
                'tipo_documento' => $this->input->post('tipo_documento'),
                'documento' => $this->input->post('documento'),
                'politicas' => $this->input->post('politicas'),
                'ofertas' => $this->input->post('ofertas'),
                'idperfil' => 4,
                'verificado' => 0
            ];

            $query = $this->dbSelect('*','clientes', ['correo' => $this->input->post('correo')]);

            if($query){
                $this->resp['status'] = true;
                $this->resp['code'] = 404;
                $this->resp['message'] = 'Ya existe un usuario con ese correo';

                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode($this->resp));
                return;
            }else{
                $dbid = $this->dbInsert('clientes',$data);
                $hid = $this->salt_encrypt($dbid);
                $ndata = [
                    'id' => $hid
                ];
                $enviar = $this->sendmail($data['correo'], $ndata, 'CUENTA CREADA CORRECTAMENTE', 'confirm_register.php');
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->resp['data'] = $data;
                $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode($this->resp));
                 return;
            }


        }else{
            $this->resp['message'] = 'Ocurrio un error en la petición';
        }
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(404)
             ->set_output(json_encode($this->resp));
    }
    
    public function login(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            #isMail?
            $user = $this->input->post('username');
            $user = explode('@',$user);
            if(count($user) > 1): $data = [ 'correo' => $this->input->post('username') ];
            else: $data = [ 'documento' => $this->input->post('username') ];
            endif; 
            $data += [ 'contrasena' => hash('sha256',$this->input->post('contrasena')) ];

            #query DB
            $query = $this->dbSelect('*','clientes', $data );
            if($query):
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->set_session($query);
                $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode($this->resp));
                 return;
            endif;

            $this->resp['message'] = 'Usuario o contraseña incorrecta!';
            $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(404)
                 ->set_output(json_encode($this->resp));
                 return;
        }
    }

    public function logout(){
        session_destroy();
        header('Location: '.base_url() );
    }

    public function recovery(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $user = $this->input->post('correo');
            $data = ['correo' => $user ];
            #query DB
            $query = $this->dbSelect('*','clientes', $data );
            #si exite el usuario
            if($query){
                $id = $this->salt_encrypt($query[0]['id_cliente']);
                $body = [
                    "url" => base_url('recovery/'.$id),
                    "name" => $query[0]['nombre'],
                    "email" => $query[0]['correo'],
                    "message"=> "Restauración de contraseña de su cuenta"
                ];
                #oculto correo
                $mail = $query[0]['correo'];
                $mail = explode('@',$mail);
                $domain = $mail[1];
                $mail = substr($mail[0], 0, 1);
                $mail = $mail.'*****@'.$domain;
                #Enviarlo
                $enviar = $this->sendmail($body['email'], $body, $body['message'], 'mail_recovery.php');

                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->resp['data'] = [
                    "correo" => $mail
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;

            }else{
                $this->resp['message'] = '';
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode($this->resp));
                    return;
            }
        }
        $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode($this->resp));
                return;
    }

    public function new_password(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $contrasena = hash('sha256',$this->input->post('contrasena'));
            $id_cliente = $this->input->post('id_cliente');
            #decrypt
            $id_cliente = $this->salt_decrypt($id_cliente);
            $data = ['id_cliente'=> $id_cliente];
            #query DB
            $query = $this->dbSelect('*','clientes', $data );
            $mail = $query[0]['correo'];
            if($query){
                $update = ['contrasena'=> $contrasena];
                $query = $this->dbUpdate($update,'clientes',$data);
                if($query){
                    $this->resp['status'] = true;
                    $this->resp['code'] = 200;
                    $this->resp['message'] = 'Contraseña cambiada satisfactoriamente';
                    #Enviarlo
                    $enviar = $this->sendmail($mail, '', 'Contraseña Cambiada', 'confirm_password.php');
                    $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
                }
            }else{
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode($this->resp));
                    return;
            }
            
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($this->resp));
            return;
    }

    public function updatePass(int $id)
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

           
            $pass = hash('sha256',$this->input->post('currentPass'));
            $newPass = hash('sha256', $this->input->post('newPass'));
            $result = $this->get('clientes',['contrasena' => $pass ,'id_cliente' => (int)$id ]);
            
            if (!empty($result)) {
                $result =  $this->dbUpdate(['contrasena' => $newPass ], 'clientes', ['id_cliente' => (int)$id]);
                if($result) {
                    $resp = [
                        'status'  => true,
                        'code'    => 200,
                        'message' => 'Contraseña Actualizada.',
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($resp));
                    return;
                }else {
                    $resp = [
                        'status'  => true,
                        'code'    => 404,
                        'message' => 'No se pudo actualizar intentelo otra vez',
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(404)
                        ->set_output(json_encode($resp));
                    return;
                }
                
            } else {
                $resp = [
                    'status'  => true,
                    'code'    => 404,
                    'message' => 'x La contraseña no es correcta.'
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
    }
    public function cupon ()
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $codigo = $this->input->post('codigo');
            $result = $this->get('cupon',['cupon_codigo' =>$codigo ]);
            
            if (!empty($result)) {
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'cupon encontrado !';
                $this->resp['data'] = [
                    "tipon_cupon" => $result['tipo_cupon'],
                    "descuento" => $result['cupon_precio'],
                    "codigo" => $result['cupon_codigo'],
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                return;
                
            } else {
                $resp = [
                    'status'  => false,
                    'code'    => 404,
                    'message' => 'x El cupon no es valido.'
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
    }
    // CREAR TOKEN CULQI
    public function createCharge () 
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            try
            { 
                include_once APPPATH.'third_party/request/library/Requests.php';
                Requests::register_autoloader();
                include_once APPPATH.'third_party/culqi/lib/culqi.php';
    
             
              $culqi = new Culqi\Culqi(['api_key' => PRIVATE_KEY]);
              $metadata = [
                "id_session" =>$this->input->post('id_session'),
                "tipo_documento" =>$this->input->post('tipo_documento'),
                "numero_documento" =>$this->input->post('numero_documento'),
                "correo" =>$this->input->post('correo'),
                "distrito"    => $this->input->post('distrito'),
                "nombres" => $this->input->post('nombres'),
                "apellidos" => $this->input->post('apellidos'),
                "d_envio" => $this->input->post('d_envio'),
                "referencia" => $this->input->post('referencia'),
                "id_productos" =>$this->input->post('id_productos'),
                "cantidades" =>$this->input->post('cantidades'),
                "subtotales" =>$this->input->post('subtotales'),
                "cantidad_total" =>$this->input->post('cantidad_total'),
                "envio" =>$this->input->post('envio_coste'),
                "cupon_descuento" =>$this->input->post('cupon_descuento'),
                "tipo_cupon" =>$this->input->post('tipo_cupon'),
                "cupon_codigo" =>$this->input->post('cupon_codigo'),
                "subtotal" =>$this->input->post('subtotal_coste'),
                
              ];
              $dest = [];
              if($this->input->post('flag_dest')) {
                $dest["dest_nombres"]    = $this->input->post('dest_nombres');
                // $dest["dest_apellidos"]  = $this->input->post('dest_apellidos');
                $dest["dest_telefono"]   = $this->input->post('dest_telefono');
                $dest["dest_tipo_doc"]   = $this->input->post('dest_tipo_doc');
                $dest["dest_number_doc"] = $this->input->post('dest_number_doc');
                $metadata["destinatario"] = json_encode($dest);
              };
              $facturacion = [];
              if($this->input->post('flag_facturacion')) {
                $dest["ruc"]    = $this->input->post('ruc');
                $dest["r_social"]  = $this->input->post('r_social');
                $dest["r_fiscal"]   = $this->input->post('r_fiscal');
                $metadata["facturacion"] = json_encode($dest);
              };
              $charge = $culqi->Charges->create(
                        [
                            "amount"        =>$this->input->post('total_coste'),
                            "capture"       =>true,
                            "currency_code" =>"PEN",
                            "description"   => 'Compra desde web BEURER' ,
                            "installments"  => 0,
                            "source_id"     => $this->input->post('token'),
                            "email"         =>$this->input->post('correo'),
                            "metadata" =>$metadata,
                            "antifraud_details"=>[
                                "address"    => 'Distrito:'.$this->input->post('distrito'),
                                "address_city"    => 'LIMA - PERU ',
                                "first_name" => $this->input->post('nombres'),
                                "last_name" => $this->input->post('apellidos'),
                                "phone_number" => $this->input->post('telefono'),
                            ]
                        ]
                );    
                $response = $charge ? json_encode($charge) :null;
                $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($response));
                    return;
            } catch (Exception $e) {
                $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($e->getMessage()));
                    return;
                
                
               
            }
            
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
    }
    public function purchase () 
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
           #evaluamos si la compra está aprobada //en culqui si existe un token actual-registro de comtra current
            $id_productos = explode('-',$this->input->post('id_productos'));
            $cantidades   = explode('-',$this->input->post('cantidades'));
            $subtotales   = explode('-',$this->input->post('subtotales'));
            date_default_timezone_set("America/Lima");          
              $data =[ 
                         'id_cliente' => $this->input->post('id_cliente'),
                         'codigo'   => $this->input->post('codigo_venta'),
                         'nombres'   => $this->input->post('nombres'),
                         'apellidos' => $this->input->post('apellidos'),
                         'correo'    => $this->input->post('correo'),
                         'telefono'    => $this->input->post('telefono'),
                         'tipo_documento'=> $this->input->post('tipo_documento'),
                         'numero_documento'=> $this->input->post('numero_documento'),
                         'provincia'=> $this->input->post('provincia'),
                         'distrito'=> $this->input->post('distrito'),
                         'dir_envio'=> $this->input->post('d_envio'),
                         'referencia'=> $this->input->post('referencia'),
                         'cupon_codigo'=> $this->input->post('cupon_codigo'),
                         'cupon_descuento'=> $this->input->post('cupon_descuento'),
                         'entrega_precio'=> floatval($this->input->post('entrega_precio')),
                         'productos_precio'=> floatval($this->input->post('subtotal')),
                         'pedido_fecha'=> date('y-m-d'),
                         'pedido_estado'=> 1 ,
                         'recojo'=> $this->input->post('d_envio') == 'recoger en tienda' ? 1 : 0
                    
            ];
            if($this->input->post('dest_nombres')) {
                $data["dest_nombres"]    = $this->input->post('dest_nombres');
                // $data["dest_apellidos"]  = $this->input->post('dest_apellidos');
                $data["dest_telefono"]   = $this->input->post('dest_telefono');
                $data["dest_tipo_doc"]   = $this->input->post('dest_tipo_doc');
                $data["dest_number_doc"] = $this->input->post('dest_number_doc');
              };
            if($this->input->post('ruc')) {
                $data["ruc"]    = $this->input->post('ruc');
                $data["r_social"]  = $this->input->post('r_social');
                $data["r_fiscal"]   = $this->input->post('r_fiscal');
              };
            $id_pedido = $this->savePedido($data);
            $pedido_estado = [
                'id_pedido'        => $id_pedido,
                'id_estado_pedido' => 1,
                'observacion'      => 'pedido solicitado',
                'fecha_estado'     => date('y-m-d')
            ];
            $this->dbInsert('pedido_estado',$pedido_estado);

            if($id_pedido) {
                for ( $i = 0 ; $i < count($id_productos) ; $i++ ){
                    $datos = [
                        'id_pedido'   => (int)$id_pedido,
                        'id_producto' => (int)$id_productos[$i],
                        'cantidad'    => (int)$cantidades[$i],
                        'subtotal_precio' => $subtotales[$i],
                    ];
                    $response = $this->dbInsert('pedido_detalle',$datos);
                    
                    if($response){
                        $productoDB = $this->get('productos',['id'=> (int) $id_productos[$i]]);
                        $stock = (int)$productoDB['stock'] - (int) $cantidades[$i];
                        $this->dbUpdate(['stock'=> $stock],'productos',['id' => (int) $id_productos[$i]]);
                        
                    }else{
                        $this->resp = [
                            'message' => 'error al guardar dato de pedido detalle'
                        ];
                        $this->output
                         ->set_content_type('application/json')
                         ->set_status_header(404)
                         ->set_output(json_encode($this->resp));
                         return;
                        }
                    };
                    // enviar correo 
                    
                $this->resp = [
                    'status'  => true,
                    'code'    => 201 ,
                    'message' => 'venta registrada',
                    'data'    => [
                        'pedido'       => 'created payment register !!',
                        'codigo_pedido' => $id_pedido,
                        'state_pedido' => 1
                        ]
                    ];
                    $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;
                }else {
                $resp = [
                    'status'  => false,
                    'code'    => 500 ,
                    'message' => 'Hubo problemas al almacenar los datos.',
                    'data'    => [
                        'pedido'       => false,
                        'state_pedido' => 0
                    ]
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(500)
                    ->set_output(json_encode($resp));
                return;
            }
            
            
          }else {
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
          }
    }
    public function getPedido()
    {
        $resp = [
              'status'  => false,
              'code'    => 404,
              'message' => 'Metodo POST requerido',
          ];
          if ($this->input->server('REQUEST_METHOD') == 'POST') {
  
                $id_pedido = $this->input->post('id_pedido');
                $pedido =  $this->get('pedido', ['id_pedido'=> $id_pedido]);
                
                if ($pedido) {
                $data = [];
                $pedido_detalle  = $this->dbSelect('*','pedido_detalle', [ 'id_pedido' => $pedido['id_pedido']]);

                for ($i = 0 ; $i < count($pedido_detalle); $i++) { 
                    $prod = $this->get('productos', ['id' =>$pedido_detalle[$i]['id_producto'] ]);
                    $imagenes  = $this->dbSelect('imagen','imagenes', [ 'producto_id' => $pedido_detalle[$i]['id_producto']]);
                    
                    $productoDB = [
                        'nombre' => $prod['titulo'],
                        'precio' => $prod['precio_anterior'],
                        'imagen' => $imagenes[0]['imagen'],
                        'precio_online' => $prod['precio'],
                        'producto_sku' => $prod['producto_sku'],
                        'cantidad' => $pedido_detalle[$i]['cantidad'],
                        'subtotal' => $pedido_detalle[$i]['subtotal_precio']
                    ];
                    array_push($data ,$productoDB);
                };
                #sumando el total
                $subtotal = 0.0;
                foreach ($data as $key => $value) {
                    $subtotal = $subtotal + ( ( float ) $value['precio_online'] * ( int ) $value['cantidad'] );
                }
                $total = $subtotal + ( double ) $pedido['entrega_precio'] - ( double ) $pedido['cupon_descuento'] ;

                #listando productos para enviar al correo
                $newdata['orders'] = [
                    'cod_pedido' => $pedido['codigo'],
                    'recojo' => ($pedido['codigo']==0)?'Recojo en tienda':'Despacho a domicilio',
                    'direccion' => $pedido['dir_envio'].', '.$pedido['distrito']. ', LIMA',
                    'subtotal' => number_format($subtotal, 2, '.', ''),
                    'descuento' => $pedido['cupon_descuento'],
                    'envio' => $pedido['entrega_precio'],
                    'total' => number_format($total, 2, '.', ''),
                    'productos' => $data
                ];
            

                $resp = [
                    'status'  => true,
                    'code'    => 200,
                    'data'    => [
                        'pedido'   => $pedido,
                        'detalle'  => $data
                    ]
                ];
                
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));

                $enviar = $this->sendmail($pedido['correo'], $newdata, 'PEDIDO CONFIRMADO', 'order_confirm.php');
                #copia a beurer
                $enviar = $this->sendmail('ventas@beurer.pe', $newdata, 'TIENES UN NUEVO PEDIDO', 'new_order.php');

                return;
                
                } else {
                    $resp = [
                        'status'  => true,
                        'code'    => 404,
                        'message' => 'Ocurrio un error en el Core',
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(404)
                        ->set_output(json_encode($resp));
                    return;
                }
          }
          $this->output
              ->set_content_type('application/json')
              ->set_status_header(404)
              ->set_output(json_encode($resp));
    }

    public function estadoPedido ()
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
           $type_search_dni = $this->input->post('dni') ? true : false ;
           $result =  $this->input->post('dni') 
                    ? $this->dbSelect('*','pedido' , ['numero_documento' => $this->input->post('dni') ],'id_pedido')[0] 
                    : $this->get('pedido', ['codigo' => $this->input->post('codigo') ]);
             
            $states_pedido = $this->dbSelect('*','pedido_estado' , ['id_pedido' => $result['id_pedido']]);
            if (!empty($result)) {
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'codigo correcto !';
                $this->resp['data'] = [
                    "estado" => $result['pedido_estado'],
                    "codigo" => $result['codigo'],
                    "recojo" => $result['recojo'],
                    "fecha" => $result['pedido_fecha'],
                    'estados_pedido' => $states_pedido
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                return;
                
            } else {
                $resp = [
                    'status'  => false,
                    'code'    => 404,
                    'message' => !$type_search_dni ?'x El código de pedido no es correcto , intente con uno distinto ' : 'x el Usuario con el DNI ingresado no realizo compras , intente con otro'
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
    }
    public function pedidosCliente ()
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->db->where(['id_cliente' => $this->input->post('id_cliente')] );
            $this->db->order_by('id_pedido','desc');
            $this->db->limit(5);
            $pedidos = $this->db->get('pedido')->result_array();
            if (!empty($pedidos)) {
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'tiene pedidos!';
                $this->resp['data'] = $pedidos;
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                return;
                
            } else {
                $resp = [
                    'status'  => false,
                    'code'    => 404,
                    'message' => 'Aun no tiene pedidos ...'
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
    
    }
    public function getProducto ()
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

           $product = $this->get('productos' ,['id ' => $this->input->post('id')]);
    
            if (!empty($product)) {
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['data'] = $product;
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                return;
                
            } else {
                $resp = [
                    'status'  => false,
                    'code'    => 404,
                    'message' => 'no se encuentra el producto ...'
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
    
    }
 
}