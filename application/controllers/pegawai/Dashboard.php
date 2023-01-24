<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller{
        public function index(){
            echo "Hello Admin";
            /* $data['title']     = 'Dashboard';
            $wp                = $this->db->query('select * from wpr where jenis="p"');
            $wr                = $this->db->query('select * from wpr where jenis="r"');
            $data['skpd']      = $this->db->query('select IFNULL(sum(ketetapan),0) as total from skpd where tahun="2022"')->result();
            $data['skrd']      = $this->db->query('select IFNULL(sum(ketetapan),0) as total from skrd where tahun="2022"')->result();
            $data['pemda']     = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['wp']        = $wp->num_rows();
            $data['wr']        = $wr->num_rows();

            
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('admin/dashboard',$data);
            $this->load->view('template_admin/footer'); */
        }
    }
?>