<?php
class Ssrd extends CI_Controller
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
        $data['title']   = 'Data Surat Setoran Retribusi Daerah (SSRD)';
        $data['skrd']    = $this->db->query("select * from vssrd where tahun='" . $this->session->userdata('tahun') . "'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/ssrd', $data);
        $this->load->view('template_admin/footer');
    }


    public function addData($npwpd)
    {
        $data['title']    = 'Data Surat Setoran Retribusi Daerah (SSRD)';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['skrd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha from skrd a, wpr b where a.npwrd=b.npwprd and a.npwrd='" . base64_decode($npwpd) . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();
        $data['akun']     = $this->db->query('select nmrek from rekbank')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahssrd', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($sspd)
    {
        $nosspd           = base64_decode($this->uri->segment(4)); //str_replace('_','/',substr($sspd,0,strpos($sspd,'vs')));
        $noskpd           = base64_decode($this->uri->segment(5)); //str_replace('_','/',substr($sspd,strpos($sspd,'vs')+2,strlen($sspd)));
        $data['title']    = 'Data Surat Setoran Retribusi Daerah (SRPD)';
        $data['nosspd']   = $nosspd;
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['sspd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha, c.ketetapan from ssrd a, wpr b, skrd c where a.npwpd=b.npwprd and a.skrd=c.skrd and a.ssrd='$nosspd'")->result();
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();
        $data['akun']     = $this->db->query('select nmrek from rekbank')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editssrd', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($sspd)
    {
        $nossrd = base64_decode($this->uri->segment(4)); //str_replace('_','/',substr($sspd,0,strpos($sspd,'vs')));
        $noskrd = base64_decode($this->uri->segment(5)); //substr($sspd,strpos($sspd,'vs')+2,strlen($sspd));

        $where = array('ssrd' => $nossrd, 'tahun' => $this->session->userdata('tahun'));
        $this->simprmodel->deleteData('ssrd', $where);
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/ssrd/infoData/' . base64_encode($noskrd) . '#');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData($this->input->post('npwpd'));
        } else {
            $tahun       = $this->input->post('tahun');
            $ssrd        = $this->input->post('sspd');
            $tanggal     = $this->input->post('tanggal');
            $skrd        = $this->input->post('nomor');
            $npwpd       = $this->input->post('npwpd');
            $obyek       = $this->input->post('obyek');
            $nilai       = $this->input->post('setoran');
            $keterangan  = $this->input->post('keterangan');
            $nomorrek    = $this->input->post('nm_rek');

            $data = array(
                'tahun'         => $tahun,
                'ssrd'          => $ssrd,
                'tanggal'       => $tanggal,
                'skrd'          => $skrd,
                'npwpd'         => $npwpd,
                'obyek'         => $obyek,
                'nilai'         => $nilai,
                'keterangan'    => $keterangan,
                'nmrek'         => $nomorrek
            );

            $query = $this->db->get_where('ssrd', array('ssrd' => $ssrd, 'skrd' => $skrd, 'npwpd' => $npwpd, 'tahun' => $tahun));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData($npwpd);
            } else {
                $this->simprmodel->insertData($data, 'ssrd');
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/ssrd');
            }
        }
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData(base64_encode($this->input->post('sspd')) . '/' . base64_encode($this->input->post('nomor')));
        } else {
            $tahun       = $this->input->post('tahun');
            $ssrd        = $this->input->post('sspd');
            $tanggal     = $this->input->post('tanggal');
            $skrd        = $this->input->post('nomor');
            $npwpd       = $this->input->post('npwpd');
            $obyek       = $this->input->post('obyek');
            $nilai       = $this->input->post('setoran');
            $keterangan  = $this->input->post('keterangan');
            $nomorrek    = $this->input->post('nm_rek');

            $data = array(
                'tanggal'       => $tanggal,
                'nilai'         => $nilai,
                'keterangan'    => $keterangan,
                'nmrek'         => $nomorrek
            );

            $where = array(
                'tahun'             => $this->session->userdata('tahun'),
                'ssrd'              => $ssrd,
                'skrd'              => $skrd
            );

            $this->simprmodel->updateData('ssrd', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
            redirect('admin/ssrd/infoData/' . base64_encode($skrd));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('sspd', 'No. SSPD', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Input', 'required');
        $this->form_validation->set_rules('setoran', 'Nilai Setoran', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }

    public function printRegister()
    {
        $data['title']    = 'Register SSPD';
        $data['jenis']    = 'SURAT SETORAN RETRIBUSI DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['ssprd']     = $this->db->query("SELECT ssrd.ssrd as sspd, ssrd.tanggal, wpr.npwprd, wpr.namausaha, ssrd.obyek, ssrd.keterangan, ssrd.nilai FROM ssrd INNER JOIN wpr ON ssrd.npwpd = wpr.npwprd and ssrd.tahun='" . $this->session->userdata('tahun') . "' order by ssrd.tanggal, ssrd.ssrd")->result();


        $this->load->view('template_admin/headerl', $data);
        $this->load->view('admin/report/registerSSPRD');
    }

    public function infoData($skpd)
    {
        $data['title']   = 'Rincian SSRD pada SKRD Nomor ';
        $data['jenis']   = 'ssrd';
        $data['kembali'] = 'admin/ssrd';
        $data['ssprd']   = $this->db->query("select tahun, ssrd as sspd, tanggal, skrd as skpd, npwpd, obyek, nilai, keterangan from ssrd where skrd='" . base64_decode($skpd) . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['skpd']    = $skpd;

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/rincian', $data);
        $this->load->view('template_admin/footer');
    }

    public function printData($sspd)
    {
        $nomor                 = base64_decode($sspd);
        $data['title']         = 'Surat Setoran Retribusi Daerah';
        $data['jenis']         = 'SURAT SETORAN RETRIBUSI DAERAH';
        $data['jns']           = 'SSRD';
        $data['pemda']         = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        /* $data['ssrd']          = $this->db->query('select a.*, b.namausaha, b.namapemilik, b.alamatusaha, c.kodeLRA from skpd a, wpr b, rekLRA c where a.npwpd=b.npwprd and a.obyek=c.namaLRA and LENGTH(RTRIM(skpd)) > 0 AND tahun="'.$this->session->userdata('tahun').'" and skpd="'.$nomor.'" order by a.skpd, a.npwpd')->result(); */
        $data['sspd']          = $this->db->query("SELECT ssrd.ssrd as sspd, ssrd.tanggal, ssrd.nilai, ssrd.keterangan, wpr.namapemilik, wpr.npwprd, wpr.namausaha, wpr.alamatusaha, ssrd.obyek, rekLRA.kodelra FROM ssrd INNER JOIN wpr ON ssrd.npwpd = wpr.npwprd INNER JOIN rekLRA ON ssrd.obyek = rekLRA.namalra WHERE ssrd.ssrd = '" . $nomor . "'")->result();


        $data['penetapan']     = $this->db->query('select nilai from ssrd where tahun="' . $this->session->userdata('tahun') . '" and ssrd="' . $nomor . '"')->result();

        foreach ($data['penetapan'] as $angka) :
            $data['terbilang'] = ucwords($this->simprmodel->terbilang($angka->nilai)) . " Rupiah";
        endforeach;

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/SSPD', $data);
    }

    public function printBlanko($sspd)
    {
        $nomor                 = str_replace("_", "/", $sspd);
        $data['title']         = 'Surat Setoran Retibusi Daerah';
        $data['jenis']         = 'SURAT SETORAN RETRIBUSI DAERAH';
        $data['jns']           = 'SSRD';
        $data['pemda']         = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        /* $data['ssrd']          = $this->db->query('select a.*, b.namausaha, b.namapemilik, b.alamatusaha, c.kodeLRA from skpd a, wpr b, rekLRA c where a.npwpd=b.npwprd and a.obyek=c.namaLRA and LENGTH(RTRIM(skpd)) > 0 AND tahun="'.$this->session->userdata('tahun').'" and skpd="'.$nomor.'" order by a.skpd, a.npwpd')->result(); */
        /*  $data['sspd']         = $this->db->query("SELECT sspd.sspd, sspd.tanggal, sspd.nilai, sspd.keterangan, wpr.namapemilik, wpr.npwprd, wpr.namausaha, wpr.alamatusaha, sspd.obyek, rekLRA.kodelra FROM sspd INNER JOIN wpr ON sspd.npwpd = wpr.npwprd INNER JOIN rekLRA ON sspd.obyek = rekLRA.namalra WHERE sspd.sspd = '".$nomor."'")->result(); */
        $data['sspd']          = $this->db->query("SELECT '' as sspd, now() AS tanggal, '' as nilai, '' as keterangan, b.namapemilik, b.npwprd, b.namausaha, b.alamatusaha, a.obyek, c.kodelra from skrd a, wpr b, rekLRA c WHERE a.npwrd=b.npwprd AND a.obyek=c.namalra AND a.skrd = '" . $nomor . "'")->result();
        $data['penetapan']     = $this->db->query('select nilai from sspd where tahun="' . $this->session->userdata('tahun') . '" and sspd="' . $nomor . '"')->result();
        $data['terbilang']     = "";

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/SSPD', $data);
    }
}
