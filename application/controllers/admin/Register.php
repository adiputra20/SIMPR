<?php
class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('akses') != '1') {
            if ($this->session->userdata('akses') != '2') {
                if ($this->session->userdata('akses') != '3') {
                    $this->simprmodel->set_notifikasi_swal('error', 'Oops', 'Anda Belum Login Bosku!!!');
                    redirect('Welcome');
                }
            }
        }
    }

    public function index()
    {
        $data['title']   = 'Cetakan Register';
        $data['rek']     = $this->simprmodel->getData('rekbank')->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/register', $data);
        $this->load->view('template_admin/footer');
    }

    public function print($param = "")
    {
        $obyek = base64_decode($param);

        $data['title']    = strtoupper($obyek);
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['nrekap']   = $this->db->query("select * from rekap where obyek='" . $obyek . "'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/rekap');
    }
}
