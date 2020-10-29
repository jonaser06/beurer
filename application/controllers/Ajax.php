<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
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
                'idperfil' => 4
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
                $this->dbInsert('clientes',$data);
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
        
              $charge = $culqi->Charges->create(
                        [
                            "amount"        =>$this->input->post('total_coste'),
                            "capture"       =>true,
                            "currency_code" =>"PEN",
                            "description"   => 'Compra desde web BEURER' ,
                            "installments"  => 0,
                            "source_id"     => $this->input->post('token'),
                            "email"         =>$this->input->post('correo'),
                            "metadata"=>[
                                "id_session" =>$this->input->post('id_session'),
                                "tipo_documento" =>$this->input->post('tipo_documento'),
                                "numero_documento" =>$this->input->post('numero_documento'),
                                "correo" =>$this->input->post('correo'),
                                "distrito"    => $this->input->post('distrito'),
                                "nombres" => $this->input->post('nombres'),
                                "apellidos" => $this->input->post('apellidos'),
                                "telefono" => $this->input->post('telefono'),
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
                                "subtotal" =>$this->input->post('subtotal_coste')
                                
                            ],
                            "antifraud_details"=>[
                                "address"    => $this->input->post('distrito'),
                                "first_name" => $this->input->post('nombres'),
                                "last_name" => $this->input->post('apellidos'),
                                "phone" => $this->input->post('telefono'),
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
            date_default_timezone_set('UTC');
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
                         'pedido_fecha'=> date("m.d.y"),
                         'pedido_estado'=> 1 ,
                    
            ];
            $id_pedido = $this->savePedido($data);
            
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
                        'message' => 'error'
                    ];
                    $this->output
                     ->set_content_type('application/json')
                     ->set_status_header(404)
                     ->set_output(json_encode($this->resp));
                     return;
                }
            }
            $this->resp = [
                'message' => 'exito'
            ];
            $this->output
                     ->set_content_type('application/json')
                     ->set_status_header(200)
                     ->set_output(json_encode($this->resp));
                     return;
            
          }else {
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
          }
    }
 
}