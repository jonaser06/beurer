<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mpedidos');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    } 
    
    public function index() {
        $user = $this->manager['user']['idperfil']; 
        $data['pags'] = $this->sistema->getPaginas();
        $data['mods'] = $this->sistema->getModulos($user);
        
        $key = null;
        foreach ($data['pags'] as $key => $pag0) {            
            $hijos = $this->sistema->getHijos($pag0['idpagina']);
            if ($hijos) {
                $data['pags'][$key]['hijos'] = $hijos;              
            }
        }
        foreach( $data['mods'] as $modu){
            $modulosjm[]=$modu['idmodulo'];
        }

        $data['modulosjm'] = isset( $modulosjm ) ? $modulosjm : [] ;
        $output = $this->load->view('backend/estado-pedido', $data, TRUE);
        return $this->__output($output);
    }

    public function getPedidos(){
        $pedidos = $this->mpedidos->getAll('pedido');
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output( json_encode( ['data'=> $pedidos ] ));             
    }
    
    public function save (){
        $post=$this->input->post();

        $id_pedido     = (int)$post['pedido']['id_pedido'];
        $pedido_estado = (int)$post['pedido']['pedido_estado'];
        $estado_message = ( $pedido_estado == 2 ) ? 'Preparando Pedido' : ( $pedido_estado == 3 ? 'Listo para la Entrega' : 'Pedido Entregado' );
        // $observacion   = $post['pedido']['observacion']; // observacion desde form edit
        
        $estado_where = $pedido_estado -1 ;

        $pedido =   $this->get('pedido',['id_pedido' => $id_pedido ]);
        $estadoDB = (int)$pedido['pedido_estado'];
       
       
        if($estadoDB == $estado_where){
            $respuesta = $this->dbUpdate(['pedido_estado' => $pedido_estado ], 'pedido' , ['id_pedido' => $id_pedido,'pedido_estado' => $estado_where ] );
            if($respuesta) {
                date_default_timezone_set("America/Lima");    
                $data = [
                    'id_pedido'        => $id_pedido,
                    'id_estado_pedido' => $pedido_estado,
                    'fecha_estado'     => date('y-m-d')
                ];   
                $response = $this->dbInsert('pedido_estado',$data );
        
                $mensaje = [
                    "mensaje"=>  "Se envío el correo de cambio de estado al cliente",
                    "tipo" => 1 
                ];

                $query = $this->get('pedido', ['id_pedido'=>$id_pedido]);
                $query['estado_mensaje'] = $estado_message;
                $enviar = $this->sendmail($query['correo'], $query , 'PEDIDO ACTUALIZADO', 'estate_order.php' );
            }else {
                $mensaje = [
                    "mensaje"=>  "Hubo un problema",
                    "tipo" => 2 
                ]; 
            }
        }else {
            
            $mensaje = [
                "mensaje"=>  "Solo puede mandar el correo de cambio de estado en el orden requerido",
                "tipo" => 2 
            ];  
        }
       
        echo json_encode($mensaje);      
    }
    public function edit() {
        $id_pedido = $this->input->post('id_pedido', TRUE);
        $pedido = $this->mpedidos->getAll('pedido' , ['id_pedido' => $id_pedido]);
        $data = array(
            'pedido' => $pedido ,
            'pedido_estado' => $this->mpedidos->get('pedido_estado' , ['id_pedido' => $id_pedido]),
        );

        $output = $this->load->view('backend/popups/edit_estadoPedido', $data, TRUE);
        return $this->__output($output);
    }
    private function __output($html = NULL) {
        $this->output->set_output($html);
    }

}
