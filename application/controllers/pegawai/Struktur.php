<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
{
    public function index()
    {
        $data['title']   = 'SIMPR';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
        $this->load->view('pegawai/struktur', $data);
    }
}
