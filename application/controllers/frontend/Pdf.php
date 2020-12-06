<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends MY_Controller
{
    protected $mpdf ;
    private $path = 'pdf/';

    public function __construct()
	{   
        parent::__construct();

        if (!isset($_SESSION['id_cliente'])) {
			redirect();
        } 
        $this->mpdf = new \Mpdf\Mpdf();
        $this->mpdf->SetHTMLHeader($this->setHeader());
        $this->mpdf->SetHTMLFooter($this->setFooter());
    }
    
    function toPDF ($codigo, bool $show = true ) {
        $pedido = $this->getCompra(['codigo' => $codigo]);

        if (!empty($pedido)){
            $name = 'pedido-'.$codigo.'.pdf';
            $html =$this->load->view( $this->path.'detail-payment', $pedido , TRUE);
            $this->mpdf->WriteHTML($html);
            $show ? $this->mpdf->Output($name,"I") : $this->mpdf->Output($name,"D"); 
            
        }else {
            redirect('myaccount');
        }
    }
   
    private function setHeader() {
        return 
        '<div style="text-align: right; font-weight: bold; color:#C51152">
        Beurer ventas
        </div>';
    }
    private function setFooter() {
        return 
        ' <table width="100%">
            <tr>
                <td width="33%">{DATE j-m-Y}</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;color:#C51152">Beurer</td>
            </tr>
        </table>';
    }
    public function tcpdf($codigo){
        $pedido = $this->getCompra(['codigo' => $codigo]);

        if (!empty($pedido)){
            $name = 'pedido-'.$codigo.'.pdf';
            $html =$this->load->view( $this->path.'detail-payment', $pedido , TRUE);
            $this->mpdf->WriteHTML($html);
            $show ? $this->mpdf->Output($name,"I") : $this->mpdf->Output($name,"D"); 
            
        }else {
            redirect('myaccount');
        }
        $pdf = new TCPDF();                 // create TCPDF object with default constructor args
        $pdf->AddPage();                    // pretty self-explanatory
        $pdf->Write(1,'<h1>hola</h1>');      // 1 is line height

        $pdf->Output('hello_world.pdf');    // send the file inline to the browser (default).

    }
  
}
  