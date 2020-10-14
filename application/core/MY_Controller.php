<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
    ): array {
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

            $user = $this->input->post(['nombre', 'apellido_paterno','apellido_materno', 'correo', 'telefono','tipo_documento','documento','politicas','ofertas'], TRUE);
            
           
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
}