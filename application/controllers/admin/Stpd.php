<?php
class Stpd extends CI_Controller
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
        $data['title']   = 'Data Wajib Pajak Yang Belum Lunas Melakukan Penyetoran Pajak Daerah';
        $data['stpd']    = $this->db->query("select * from vstpd where tahun='" . $this->session->userdata('tahun') . "'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/stpd', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData($noskpd)
    {
        $data['title']    = 'Tambah Data Surat Tagihan Pajak Daerah (STPD) dan Teguran';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['stpd']     = $this->db->query("select * from vestpd where tahun='" . $this->session->userdata('tahun') . "'and skpd='" . str_replace('_', '/', $noskpd) . "'")->result();
        /*  $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();
            $data['akun']     = $this->db->query('select nmrek from rekbank')->result(); */

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahstpd', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($stpd)
    {
        $nostpd           = str_replace('_', '/', substr($stpd, 0, strpos($stpd, 'vs')));
        $noskpd           = str_replace('_', '/', substr($stpd, strpos($stpd, 'vs') + 2, strlen($stpd)));
        $data['title']    = 'Edit Data Surat Tagihan Pajak Daerah (STPD) dan Teguran Nomor ' . $nostpd;
        $data['nostpd']   = $nostpd;
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['stpd']     = $this->db->query("select * from vestpd where tahun='" . $this->session->userdata('tahun') . "' and skpd='" . $noskpd . "' and nostpd='" . $nostpd . "'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahstpd', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($sspd)
    {
        $nosspd = str_replace('_', '/', substr($sspd, 0, strpos($sspd, 'vs')));
        $noskpd = substr($sspd, strpos($sspd, 'vs') + 2, strlen($sspd));

        $where = array('sspd' => $nosspd, 'tahun' => $this->session->userdata('tahun'));
        $this->simprmodel->deleteData('sspd', $where);
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/sspd/infoData/' . $noskpd . '#');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData(str_replace('/', '_', $this->input->post('noskpd')));
        } else {
            $tahun       = $this->session->userdata('tahun');
            $nostpd      = $this->input->post('nostpd');
            $npwpd       = $this->input->post('npwpd');
            $skpd        = $this->input->post('noskpd');
            $ketetapan   = str_replace('.', '', $this->input->post('ketetapan'));
            $nilai       = str_replace('.', '', $this->input->post('nilai'));
            $obyek       = $this->input->post('obyek');
            $jatuhtempo  = $this->input->post('jatuhtempo');
            $tanggal     = $this->input->post('tanggal');


            $data = array(
                'tahun'       => $tahun,
                'nostpd'      => $nostpd,
                'npwpd'       => $npwpd,
                'skpd'        => $skpd,
                'ketetapan'   => $ketetapan,
                'nilai'       => $nilai,
                'obyek'       => $obyek,
                'jatuhtempo'  => $jatuhtempo,
                'tanggal'     => $tanggal
            );

            $query = $this->db->get_where('stpd', array('nostpd' => $nostpd, 'skpd' => $skpd, 'npwpd' => $npwpd, 'tahun' => $tahun));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData(str_replace('/', '_', $skpd));
            } else {
                $this->simprmodel->insertData($data, 'stpd');
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/stpd');
            }
        }
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData(str_replace('/', '_', $this->input->post('stpd')) . 'vs' . str_replace('/', '_', $this->input->post('skpd')));
        } else {
            $tanggal     = $this->input->post('tanggal');
            $nostpd      = $this->input->post('nostpd');
            $npwpd       = $this->input->post('npwpd');
            $skpd        = $this->input->post('noskpd');

            $data = array(
                'tanggal'       => $tanggal
            );

            $where = array(
                'tahun'             => $this->session->userdata('tahun'),
                'nostpd'            => $nostpd,
                'skpd'              => $skpd,
                'npwpd'             => $npwpd
            );

            $this->simprmodel->updateData('stpd', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
            redirect('admin/stpd');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nostpd', 'No. STPD', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Input', 'required');
    }

    public function printRegister()
    {
        $data['title']    = 'Register STPD dan Teguran';
        $data['jenis']    = 'SURAT TAGIHAN PAJAK DAERAH (STPD) dan TEGURAN';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['stprd']    = $this->db->query("select * from vcstpd where tahun='" . $this->session->userdata('tahun') . "' order by nostpd")->result();


        $this->load->view('template_admin/headerl', $data);
        $this->load->view('admin/report/registerSTPRD');
    }

    public function printData($stpd)
    {
        $nostpd           = str_replace('_', '/', substr($stpd, 0, strpos($stpd, 'vs')));
        $noskpd           = str_replace('_', '/', substr($stpd, strpos($stpd, 'vs') + 2, strlen($stpd)));

        $data['title']         = 'Surat Tagihan Pajak Daerah';
        $data['jenis']         = 'SURAT TAGIHAN PAJAK DAERAH';
        $data['jns']           = 'STPD';
        $data['pemda']         = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['stpd']          = $this->db->query("select vestpd.*, wpr.namapemilik, alamatpemilik, jenisusaha, alamatusaha, desa, kecamatan from vestpd inner join wpr on vestpd.npwpd = wpr.npwprd where vestpd.skpd='" . $noskpd . "' and vestpd.nostpd='" . $nostpd . "' and vestpd.tahun='" . $this->session->userdata('tahun') . "'")->result();


        $data['penetapan']     = $this->db->query("select (ketetapan-nilai) as nilai from vestpd where skpd='" . $noskpd . "' and nostpd='" . $nostpd . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();

        foreach ($data['penetapan'] as $angka) :
            $data['terbilang'] = ucwords($this->simprmodel->terbilang($angka->nilai)) . " Rupiah";
        endforeach;

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/stprd', $data);
    }
}
