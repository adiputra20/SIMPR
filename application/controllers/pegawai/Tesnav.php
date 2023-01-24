<?php

    class Tesnav extends CI_Controller {

        public function index(){
            $data['title']   = 'Test Navbar';

            $this->load->view('template_admin/header',$data);
            $this->load->view('pegawai/tesnav');
            $this->load->view('template_admin/footer');


        }
    }