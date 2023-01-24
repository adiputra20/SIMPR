<?php
class Skrd extends CI_Controller
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
        $data['title']   = 'Data Surat Keterangan Retribusi Daerah (SKRD)';
        $strSQL          = "SELECT
                                    `wpr`.`npwprd` AS `npwprd`,
                                    `wpr`.`namausaha` AS `namausaha`,
                                    `wpr`.`namapemilik` AS `namapemilik`,
                                    (select skrd from skrd where skrd.npwrd=wpr.npwprd and skrd.tahun='" . $this->session->userdata('tahun') . "') as skrd,
                                    (select ketetapan from skrd where skrd.npwrd=wpr.npwprd and skrd.tahun='" . $this->session->userdata('tahun') . "') as ketetapan,
                                    (select MONTH(penetapan) from skrd where skrd.npwrd=wpr.npwprd and skrd.tahun='" . $this->session->userdata('tahun') . "') as bulan
                                FROM `wpr` WHERE `wpr`.`jenis` = 'r' AND `wpr`.`status` = 1";


        $data['skpd']    = $this->db->query($strSQL)->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/skrd', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData($npwrd)
    {
        $npwrd            = base64_decode($npwrd);
        $data['title']    = 'Data Surat Keterangan Retribusi Daerah (SKRD)';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['skrd']     = $this->db->query("select '2022' as tahun, '' as skrd, npwprd as npwrd, date(now()) as penetapan, date(now()) as jatuhtempo, '' as obyek, '' as perbulan, '' as pokok, ''as denda, '' as ketetapan, date(now()) as tanggal, namapemilik, namausaha from wpr a where a.npwprd='$npwrd'")->result();
        /* $data['skrd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha from skrd a, wpr b where a.npwrd=b.npwprd and a.npwrd='$npwrd'")->result(); */
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahskrd', $data);
        $this->load->view('template_admin/footer');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData(base64_encode($this->input->post('npwpd')));
        } else {
            $tahun       = $this->input->post('tahun');
            $nomor       = $this->input->post('nomor');
            $npwrd       = $this->input->post('npwpd');
            $penetapan   = $this->input->post('tanggal1');
            $jatuhtempo  = $this->input->post('tanggal2');
            $obyek       = $this->input->post('obyek');
            $perbulan    = $this->input->post('perbulan');
            $pokok       = ((date("m", strtotime($this->input->post('tanggal2'))) - date("m", strtotime($this->input->post('tanggal1')))) + 1) * $perbulan;
            $denda       = $this->input->post('denda');
            $ketetapan   = $pokok + $denda;
            $tanggal     = $this->input->post('tanggal3');

            $data = array(
                'tahun'         => $tahun,
                'skrd'          => $nomor,
                'npwrd'         => $npwrd,
                'penetapan'     => $penetapan,
                'jatuhtempo'    => $jatuhtempo,
                'obyek'         => $obyek,
                'perbulan'      => $perbulan,
                'pokok'         => $pokok,
                'denda'         => $denda,
                'ketetapan'     => $ketetapan,
                'tanggal'       => $tanggal
            );

            $where = array(
                'npwrd' => $npwrd,
                'tahun'  => $tahun
            );

            $dataSSRD = array(
                'tahun'     => $this->session->userdata('tahun'),
                'skrd'      => $nomor,
                'npwpd'     => $npwrd,
                'obyek'     => $obyek,
                'ketetapan' => $ketetapan
            );

            $query = $this->db->get_where('skrd', array('skrd' => $nomor, 'tahun' => $tahun));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData(base64_encode($this->input->post('npwpd')));
            } else {
                $this->simprmodel->insertData($data, 'skrd');
                /* $this->simprmodel->insertData($dataSSRD, 'ssrd'); */
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/skrd');
            }
        }
    }

    public function editData($nomor)
    {
        $data['title']    = 'Data Surat Keterangan Retribusi Daerah (SKRD)';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['skrd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha from skrd a, wpr b where a.npwrd=b.npwprd and a.skrd='" . base64_decode($nomor) . "'")->result();
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editskrd', $data);
        $this->load->view('template_admin/footer');
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData(base64_encode($this->input->post('nomor')));
        } else {
            $tahun       = $this->input->post('tahun');
            $nomor       = $this->input->post('nomor');
            $lama        = $this->input->post('nomorlama');
            $npwpd       = $this->input->post('npwpd');
            $penetapan   = $this->input->post('tanggal1');
            $jatuhtempo  = $this->input->post('tanggal2');
            $obyek       = $this->input->post('obyek');
            $perbulan    = $this->input->post('perbulan');
            $pokok       = ((date("m", strtotime($this->input->post('tanggal2'))) - date("m", strtotime($this->input->post('tanggal1')))) + 1) * $perbulan;
            $denda       = $this->input->post('denda');
            $ketetapan   = $pokok + $denda;
            $tanggal     = $this->input->post('tanggal3');

            $data = array(
                'skrd'          => $nomor,
                'penetapan'     => $penetapan,
                'jatuhtempo'    => $jatuhtempo,
                'obyek'         => $obyek,
                'perbulan'      => $perbulan,
                'pokok'         => $pokok,
                'denda'         => $denda,
                'ketetapan'     => $ketetapan,
                'tanggal'       => $tanggal
            );

            $dataSSRD = array(
                'obyek'     => $obyek,
                'ketetapan' => $ketetapan
            );

            $where = array(
                'npwrd' => $npwpd,
                'skrd'   => $lama,
                'tahun'  => $tahun
            );

            $whereSSPD = array(
                'npwpd' => $npwpd,
                'skrd'   => $nomor,
                'tahun'  => $tahun
            );

            // var_dump($where);
            $this->simprmodel->updateData('skrd', $data, $where);
            /* $this->simprmodel->updateData('ssrd',$dataSSRD,$whereSSRD); */
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
            redirect('admin/skrd');
        }
    }

    public function deleteData($npwpd)
    {
        $data['cek'] = $this->db->query("select skrd, npwrd from skrd where npwrd='" . $npwpd . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();

        foreach ($data['cek'] as $cek) :
            $whereSSRD = array(
                'skrd'  => $cek->skrd,
                'npwrd' => $cek->npwrd,
                'tahun' => $this->session->userdata('tahun')
            );
        endforeach;

        /* var_dump($whereSSRD); */
        $this->simprmodel->deleteData('skrd', $whereSSRD);

        /* $where = array('npwrd' => $npwpd, 'tahun' => $this->session->userdata('tahun'));
        $this->simprmodel->deleteData('skrd', $where);

        $data1 = array(
            'tahun'     => $this->session->userdata('tahun'),
            'npwrd'     => $npwpd
        );

        $this->simprmodel->insertData($data1, 'skrd'); */
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/skrd');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nomor', 'No. SKPD', 'required');
        $this->form_validation->set_rules('tanggal1', 'Tanggal Penetapan', 'required');
        $this->form_validation->set_rules('tanggal2', 'Tanggal Jatuh Tempo', 'required');
        $this->form_validation->set_rules('tanggal3', 'Tanggal Input', 'required');
        $this->form_validation->set_rules('obyek', 'Obyek Pajak', 'required');
        $this->form_validation->set_rules('perbulan', 'Nilai Per Bulan', 'required');
        $this->form_validation->set_rules('denda', 'Nilai Denda', 'required');
    }

    public function printData($npwpd)
    {
        $nomor                 = base64_decode($npwpd);
        $data['title']         = 'Surat Ketetapan Retribusi Daerah';
        $data['jenis']         = 'SURAT KETETAPAN RETRIBUSI DAERAH';
        $data['pemda']         = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['skpd']          = $this->db->query('select a.*, b.namausaha, b.namapemilik, b.alamatusaha, c.kodeLRA from skrd a, wpr b, rekLRA c where a.npwrd=b.npwprd and a.obyek=c.namaLRA and LENGTH(RTRIM(skrd)) > 0 AND tahun="' . $this->session->userdata('tahun') . '" and skrd="' . $nomor . '" order by a.skrd, a.npwrd')->result();
        $data['penetapan']     = $this->db->query('select ketetapan from skrd where tahun="' . $this->session->userdata('tahun') . '" and skrd="' . $nomor . '"')->result();

        foreach ($data['penetapan'] as $angka) :
            $data['terbilang'] = ucwords($this->simprmodel->terbilang($angka->ketetapan)) . " Rupiah";
        endforeach;

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/SKRD', $data);
    }

    public function printRegister()
    {
        $data['title']    = 'Register SKRD';
        $data['jenis']    = 'SURAT KETETAPAN RETRIBUSI DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['skrd']     = $this->db->query('select a.*, b.namausaha from skrd a, wpr b where a.npwrd=b.npwprd and LENGTH(RTRIM(skrd)) > 0 AND tahun=' . $this->session->userdata('tahun') . ' order by a.skrd, a.npwrd')->result();


        $this->load->view('template_admin/headerl', $data);
        $this->load->view('admin/report/registerSKRD');
    }
}
