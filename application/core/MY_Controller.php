<?php
defined('BASEPATH') or exit('No direct script access allowed');

define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$.//ppp693-');
define('SECRET_IV', '99326425');

// constantes de sanitización
define('STR_NULL', '');
define('STR_SPACE', ' ');
define('STR_GUION', '-');
class MY_Controller extends CI_Controller
{
    protected $data;
    protected $resp;

    public function __construct()
    {
        parent::__construct();
        // $this->data = 'test'; 
        $this->resp = [
            'status'  => false,
            'code'    => 404,
            'message' => '',
        ];  
        if( !isset($_SESSION) ) {
            session_start();

        }
    }

    public function dbInsert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        if ($query) return true;
        return false;
    }
    public function dbSelect($label, $table, $where = [], $o = '')
    {
        $this->db->select($label);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($o, 'DESC');
        $query = $this->db->get()->result_array();
        if ($query) return $query;
        return false;
    }
    public function set_session($data){
        $_SESSION['status'] = true;
        $_SESSION['id_cliente'] = $data[0]['id_cliente'];
        return;
    }
    public function get(
        string $table,
        ?array $conditions = NULL
    ) {
           return empty($conditions)
            ? $this->db->get($table)->result_array()
            : $this->db->get_where($table, $conditions)->row_array();
    }
 
    public function dbUpdate(
         $label, 
         $table, 
         array $where ) : bool
    {
        $this->db->set($label);
        $this->db->where($where);
        $query = $this->db->update($table);
        if ($query) return true;
        return false;
    }

    // Ajax update
    public function updateUsuario(int $id)
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $user = $this->input->post(['nombre', 'apellido_paterno','apellido_materno', 'correo', 'telefono','tipo_documento','documento','politicas','ofertas','direccion','distrito','referencia'], TRUE);
            
           
            $result =  $this->dbUpdate($user, 'clientes', ['id_cliente' => (int)$id]);

            if ($result) {
                $data = $this->get('clientes', ['id_cliente' => (int)$id]);

                $resp = [
                    'status'  => true,
                    'code'    => 200,
                    'message' => 'Actualizado Correctamente',
                    'data'    => [
                        'id_cliente'   => $data['id_cliente'],
                        'nombre'   => $data['nombre'],
                        'apellido_paterno' => $data['apellido_paterno'],
                        'apellido_materno' => $data['apellido_materno'],
                        'telefono' => $data['telefono'],
                        'correo' => $data['correo'],
                        'tipo_documento'   => $data['tipo_documento'],
                        'documento'   => $data['documento'],
                        'politicas'   => $data['politicas'],
                        'direccion'   => $data['direccion'],
                        'distrito'   => $data['distrito'],
                        'referencia'   => $data['referencia'],
                        'ofertas'   => $data['ofertas'],
                    ]
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
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
    
    public function salt_encrypt($pass){
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_KEY), 0, 16);

        $output = openssl_encrypt($pass, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    public function salt_decrypt($pass){

        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_KEY), 0, 16);

        $output = openssl_decrypt(base64_decode($pass), METHOD, $key, 0, $iv);
        return $output;
    }
    public function sendmail($to, $data, $subject,$template){
        $config = [
            'protocol'  => 'smtp', 
            'smtp_host' => 'ssl://smtp.zoho.com', 
            'smtp_port' =>  465, 
            'smtp_user' => MAIL_USER,
            'smtp_pass' => MAIL_PASS, 
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        ];
        $message = $this->load->view('mail/'.$template, $data,  TRUE);

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from(MAIL_USER, 'Beurer'); // change it to yours
        $this->email->to($to);// change it to yours
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
          
    }

    public function generateUrl($title)
    {
        $ac2 = explode(',', 'ñ,Ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ä,ë,ï,ö,ü,Ä,Ë,Ï,Ö,Ü');
        $xc2 = explode(',', 'n,N,a,e,i,o,u,A,E,I,O,U,a,e,i,o,u,A,E,I,O,U');
        $title = strtolower(str_replace($ac2, $xc2, $title));
        $plb = '/\b(a|e|i|o|u|el|en|la|las|es|tras|del|pero|para|por|de|con| ' .
            '.|sera|haber|una|un|unos|los|debe|ser)\b/';
        $title = preg_replace($plb, STR_NULL, $title);
        $title = preg_replace('/[^a-z0-9 -]/', STR_NULL, $title);
        $title = preg_replace('/-/', STR_SPACE, $title);
        $title = trim(preg_replace('/[ ]{2,}/', STR_SPACE, $title));
        $title = str_replace(STR_SPACE, STR_GUION, $title);
        $title = trim($title);
        return $title;
    } 

    public function savePedido ( array $data = []  ){
        $this->db->insert('pedido', $data );
        return $this->db->insert_id();
    }

}