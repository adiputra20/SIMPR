<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        /*echo "Hello Admin";*/
        $data['title']     = 'Dashboard';
        $wp                = $this->db->query('select * from wpr where jenis="p"');
        $wr                = $this->db->query('select * from wpr where jenis="r"');
        $data['skpd']      = $this->db->query('select IFNULL(sum(ketetapan),0) as total from skpd where tahun="' . $this->session->userdata('tahun') . '"')->result();
        $data['skrd']      = $this->db->query('select IFNULL(sum(ketetapan),0) as total from skrd where tahun="' . $this->session->userdata('tahun') . '"')->result();
        $data['jskrd']     = $this->db->query('select count(skrd) as total from skrd where tahun="' . $this->session->userdata('tahun') . '"')->result();
        $data['jskpd']     = $this->db->query('select count(skpd) as total from skpd where tahun="' . $this->session->userdata('tahun') . '"')->result();
        $data['sspd']      = $this->db->query('select IFNULL(sum(nilai),0) as total from sspd where tahun="' . $this->session->userdata('tahun') . '"')->result();
        $data['ssrd']      = $this->db->query('select IFNULL(sum(nilai),0) as total from ssrd where tahun="' . $this->session->userdata('tahun') . '"')->result();
        $data['sts']       = $this->db->query('select IFNULL(sum(nilai),0) as total from sts where tahun="' . $this->session->userdata('tahun') . '"')->result();
        $data['pemda']     = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['wp']        = $wp->num_rows();
        $data['wr']        = $wr->num_rows();
        $strsqltimeline    = "
                                    select 'Jan' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=1 UNION ALL
                                    select 'Feb' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=2 UNION ALL
                                    select 'Mar' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=3 UNION ALL
                                    select 'Apr' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=4 UNION ALL
                                    select 'Mei' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=5 UNION ALL
                                    select 'Jun' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=6 UNION ALL
                                    select 'Jul' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=7 UNION ALL
                                    select 'Agt' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=8 UNION ALL
                                    select 'Sep' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=9 UNION ALL
                                    select 'Okt' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=10 UNION ALL
                                    select 'Nov' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=11 UNION ALL
                                    select 'Des' as bulan,  IFNULL(sum(nilai),0) as nilai from vpenerimaan WHERE tahun = '" . $this->session->userdata('tahun') . "' AND MONTH(tanggal)=12
                                    ";
        $strsqldonut        = "
                                    select 'pajak'     as jenis, sum(nilai) nilai FROM vpenerimaan where left(kode,6)='4.1.01' and tahun='" . $this->session->userdata('tahun') . "' GROUP BY jenis UNION ALL
                                    select 'retribusi' as jenis, sum(nilai) nilai FROM vpenerimaan where left(kode,6)='4.1.02' and tahun='" . $this->session->userdata('tahun') . "'  GROUP BY jenis UNION ALL
                                    select 'lainnya'   as jenis, sum(nilai) nilai FROM vpenerimaan where left(kode,6)!='4.1.02' and tahun='" . $this->session->userdata('tahun') . "'  AND left(kode,6)!='4.1.01'  GROUP BY jenis
                                 ";

        $data['timeline']  = $this->db->query($strsqltimeline)->result();
        $data['donut']     = $this->db->query($strsqldonut)->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }
}
