<?php
class Bku extends CI_Controller
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
        if (isset($_GET['tanggalAwal']) && isset($_GET['tanggalAkhir'])) {
            $tanggalAwal  = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];

            $keterangan   = ' dari tanggal ' . date("d F Y", strtotime($_GET['tanggalAwal'])) . ' sampai dengan ' . date("d F Y", strtotime($_GET['tanggalAkhir']));
        } else {
            $keterangan   = "";
        };

        $data['title']     = 'Buku Kas Penerimaan ';
        $data['bukubesar'] = $this->db->query("select * from vpenerimaan where tanggal between '" . $tanggalAwal . "' and '" . $tanggalAkhir . "' order by tanggal")->result();
        $data['rek']       = $this->db->query('select distinct(obyek) from vpenerimaan order by kode')->result();
        $data['pemda']     = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/bku', $data);
        $this->load->view('template_admin/footer');
    }

    public function printData()
    {
        if (isset($_GET['tanggalAwal']) && isset($_GET['tanggalAkhir'])) {
            $tanggalAwal  = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];

            $keterangan   = 'dari tanggal ' . date("d F Y", strtotime($_GET['tanggalAwal'])) . ' sampai dengan ' . date("d F Y", strtotime($_GET['tanggalAkhir']));

            $data['title']     = 'Buku Kas Penerimaan';
            $data['jenis']     = 'BUKU KAS PENERIMAAN';
            $data['pemda']     = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            $data['bku']       = $this->db->query("select '' as tahun,  SUBDATE('" . $tanggalAwal . "',1) tanggal,'' uraian, 'Saldo Awal' keterangan,  IFNULL(sum(nilai),0) nilai,'' obyek,''  kode FROM vpenerimaan WHERE tanggal < '" . $tanggalAwal . "' UNION ALL select * from vpenerimaan where tanggal between '" . $tanggalAwal . "' and '" . $tanggalAkhir . "' order by tanggal")->result();
            $data['periode']   = date("d F Y", strtotime($_GET['tanggalAwal'])) . ' s/d ' . date("d F Y", strtotime($_GET['tanggalAkhir']));

            $this->load->view('template_admin/headerl', $data);
            $this->load->view('admin/report/bku');
        } else {
            $keterangan   = "";
            redirect('admin/bku/?tanggalAwal=' . date("Y-m-d") . '&tanggalAkhir=' . date("Y-m-d"));
        };
    }
}
