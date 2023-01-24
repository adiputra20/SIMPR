<?php
    /* defined('BASETPATH') OR EXIT('Jalan Tol'); */
    
    require_once('assets/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    class MyPdf{
        protected $ci;

        public function __construct(){
            $this->ci =& get_instance();
        }

        public function generate($view, $data = array(), $filename, $paper, $orientation){
            $dompdf = new Dompdf();
            $html   = $this->ci->load->view($view, $data, TRUE);
            $dompdf->loadhtml($html);
            $dompdf->setPaper($paper, $orientation);
            $dompdf->render();
            ob_clean();
            $dompdf->stream($filename.'.pdf', array("Attachment" => FALSE));
        }
    }
