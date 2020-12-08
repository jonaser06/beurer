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
        // $this->mpdf = new \Mpdf\Mpdf();
        // $this->mpdf->SetHTMLHeader($this->setHeader());
        // $this->mpdf->SetHTMLFooter($this->setFooter());
    }
    function toPDF ($codigo, bool $show = true ) {
        
         $pedido = $this->getCompra(['codigo' => $codigo]);
        if (!empty($pedido)){

            $this->mpdf = new \Mpdf\Mpdf(['tempDir' => sys_get_temp_dir().DIRECTORY_SEPARATOR.'mpdf']);
            $this->mpdf->SetHTMLHeader($this->setHeader());
            $this->mpdf->SetHTMLFooter($this->setFooter());

            $name = 'pedido-'.$codigo.'.pdf';
            $this->mpdf->SetHTMLHeader($this->setHeader());
            $html =$this->load->view( $this->path.'detail-payment', $pedido , TRUE);
            $this->mpdf->WriteHTML($html);
            $show ? $this->mpdf->Output($name,"I") : $this->mpdf->Output($name,"D"); 
            
        }else {
            redirect('myaccount');
        }
    }

   public function rotulado($codigo, bool $show = true ) 
   {
    $pedido = $this->getCompra(['codigo' => $codigo]);
    if (!empty($pedido)){
        $this->mpdf = new \Mpdf\Mpdf([
            'tempDir' => sys_get_temp_dir().DIRECTORY_SEPARATOR.'mpdf',
            "mode" => 'utf-8',
            "forrmat" => [190, 236]
            ] 
        );
        $this->mpdf->SetHTMLFooter($this->setFooter());


        $name = 'rotulado-'.$codigo.'.pdf';
        $html1 =$this->load->view( $this->path.'rotulado', $pedido , TRUE);
        $html2 =$this->load->view( $this->path.'rotulado01', $pedido , TRUE);
        $this->mpdf->WriteHTML($html1);
        $this->mpdf->AddPage();
        $this->mpdf->WriteHTML($html2);

        $show ? $this->mpdf->Output($name,"I") : $this->mpdf->Output($name,"D"); 
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
            $html =$this->load->view( $this->path.'rotulado');
            $this->mpdf->WriteHTML($html);
        }else {
            redirect('myaccount');
        }
        $html =$this->load->view( $this->path.'rotulado');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->AddPage();                   
        $html = '
        <body style="border:1px solid #646464;width:420px;height: 540px;;margin:0 auto;font-family:Cambria, Cochin, Georgia, Times serif;">
            <table width="100%" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td style=" width: 100%; ">
                        <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                            <tr align="center ">
                                <td></td>
                                <td width="50% ">
                                    <h4 style="margin:10px 0;text-align:center;width: 100%;color:#000 ">MÉTODO DE PAGO</h4>
                                    <h4 style="margin:10px 0;text-align: center;color:#fff;background-color: #000000; "> PAGADO
                                    </h4>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
        
                <tr>
                    <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                        <tr>
        
                            <td style="width:33% ; text-align: center; ">201727473</td>
                            <td style="width:33% ; text-align: center; ">PIEZAS 1/1</td>
                            <td style="width:33% ; text-align: center; ">Boleta</td>
                        </tr>
                    </table>
                </tr>
                <tr>
                    <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                        <tr>
                            <h4 style="margin: 10px 0 0 0 ;text-align: center;color:#fff;background-color: #000000; "> REMITENTE
                            </h4>
                        </tr>
                        <tr>
                            <td>MASTER MEDIC</td>
                        </tr>
                        <tr>
                            <td>
                                Av Los Forestales MZ F LT 5-Sectores C -10A - Villa el Salvador
                            </td>
                        </tr>
                        <tr>
                            <td>
                                CHORRILLOS - LIMA - LIMA
                            </td>
                        </tr>
                    </table>
        
                    <tr>
                        <table>
                            <tr>
                                <h4 style="margin: 10px 0 0 0 ;text-align: center;color:#fff;background-color: #000000; "> DESTINATARIO
                                </h4>
                            </tr>
                            <tr>
                                <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                                    <tr>
                                        <td style="width:40% ">Cliente</td>
                                        <td style="width:60% ">: nombre</td>
                                    </tr>
                                    <tr>
                                        <td style="width:40% ">Receptor Alternativo</td>
                                        <td style="width:60% ">: nombre</td>
                                    </tr>
                                </table>
                            </tr>
        
                        </table>
                    </tr>
                    <tr>
                        <table>
                            <tr>
                                <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                                    <tr>
                                        <td style="width:20%;font-weight: bold; ">Dirección</td>
                                        <td style="width:80% ">: Prolongación Iquitos</td>
                                    </tr>
                                    <tr>
                                        <td style="width:20%;font-weight: bold; ">Nro. / Lote</td>
                                        <td style="width:80% ">
                                            <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                                                <tr>
                                                    <td style="width :40% ">: 2045</td>
                                                    <td style="width :60% ">||
                                                        <b>Dto./Int</b>
                                                        <span style="margin-left:40px; ">1602B</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:20% ;font-weight: bold; ">Urbanización</td>
                                        <td style="width:80% ">:</td>
        
                                    </tr>
                                    <tr>
                                        <td style="width:20%;font-weight: bold; ">Distrito</td>
                                        <td style="width:80% ">: LINCE</td>
                                    </tr>
                                    <tr>
                                        <td style="width:20%;font-weight: bold; ">Provincia</td>
                                        <td style="width:80% ">: LIMA - LIMA</td>
                                    </tr>
                                    <tr>
                                        <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                                            <tr>
                                                <td style="width:10%;font-weight: bold; ">Referencia</td>
                                                <td style="width:40% ">: a 3 cuadras del cruce de Javier Prado con Iquitos.</td>
                                            </tr>
                                        </table>
                                    </tr>
        
                                </table>
                            </tr>
        
                        </table>
                    </tr>
            </table>
        </body>';

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->writeHTML($html, true, false, true, false, '');

                // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                
                // reset pointer to the last page
                $pdf->lastPage();
                
                // ---------------------------------------------------------
                
                //Close and output PDF document
                $pdf->Output('example_006.pdf', 'I');
                        // create TCPDF object with default constructor args
    }
    //  generar el checksum 
    private function checkSumCode(string $codigo , string $type) {
        try {
            $bc = new \Mpdf\Barcode();
            $code= strtoupper($codigo);
            $code = $bc->getChecksum( $code, $type); 
            return $code;
        } catch (\Throwable $th) {
            return $th;
        }
       
    }
  
}
  