<?php
class Piutang extends CI_Controller
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
        if (isset($_GET['obyek'])) {
            $obyek  = $_GET['obyek'];
            $keterangan   = $obyek;
        } else {
            $keterangan   = "";
        };

        $data['title']     = 'Piutang Daerah ';
        $data['piutang']   = $this->db->query("select * from vpiutang where obyek='" . $_GET['obyek'] . "' and tahun='" . $this->session->userdata('tahun') . "'order by sk")->result();
        $data['rek']       = $this->db->query('select distinct(obyek) from vpiutang order by kode')->result();
        $data['pemda']     = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/piutang', $data);
        $this->load->view('template_admin/footer');
    }

    public function printData()
    {
        if (isset($_GET['obyek'])) {
            $obyek        = $_GET['obyek'];

            $keterangan   = $_GET['obyek'];

            $data['title']     = 'Rekap Piutang Daerah';
            $data['jenis']     = 'DAFTAR PIUTANG DAERAH';
            $data['rekening']  = $this->db->query("select * from rekLRA where namalra='" . $obyek . "'")->result();
            $data['pemda']     = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            $data['piutang']   = $this->db->query("select * from vpiutang where obyek='" . $obyek . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();

            $this->load->view('template_admin/headerl', $data);
            $this->load->view('admin/report/formpiutang');
        } else {
            $keterangan   = "";
            redirect('admin/piutang/?&obyek=');
        };
    }
}
