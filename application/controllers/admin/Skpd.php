<?php
class Skpd extends CI_Controller
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
        $data['title']   = 'Data Surat Keterangan Pajak Daerah (SKPD)';
        $strSQL          = "SELECT
                                    `wpr`.`npwprd` AS `npwprd`,
                                    `wpr`.`namausaha` AS `namausaha`,
                                    `wpr`.`namapemilik` AS `namapemilik`,
                                    (select skpd from skpd where skpd.npwpd=wpr.npwprd and skpd.tahun='" . $this->session->userdata('tahun') . "') as skpd,
                                    (select ketetapan from skpd where skpd.npwpd=wpr.npwprd and skpd.tahun='" . $this->session->userdata('tahun') . "') as ketetapan,
                                    (select MONTH(penetapan) from skpd where skpd.npwpd=wpr.npwprd and skpd.tahun='" . $this->session->userdata('tahun') . "') as bulan
                                FROM `wpr` WHERE `wpr`.`jenis` = 'p' AND `wpr`.`status` = 1";

        $data['skpd']    = $this->db->query($strSQL)->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/skpd', $data);
        $this->load->view('template_admin/footer');
    }


    public function addData($npwpd)
    {
        $npwpd            = base64_decode($npwpd);
        $data['title']    = 'Data Surat Keterangan Pajak Daerah (SKPD)';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['skpd']     = $this->db->query("select '" . $this->session->userdata('tahun') . "' as tahun, '' as skpd, npwprd as npwpd, date(now()) as penetapan, date(now()) as jatuhtempo, '' as obyek, '' as perbulan, '' as pokok, ''as denda, '' as ketetapan, date(now()) as tanggal, namapemilik, namausaha from wpr a where a.npwprd='$npwpd'")->result();
        /* $data['skpd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha from skpd a, wpr b where a.npwpd=b.npwprd and a.npwpd='$npwpd'")->result(); */
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahskpd', $data);
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
                'tahun'         => $tahun,
                'skpd'          => $nomor,
                'npwpd'         => $npwpd,
                'penetapan'     => $penetapan,
                'jatuhtempo'    => $jatuhtempo,
                'obyek'         => $obyek,
                'perbulan'      => $perbulan,
                'pokok'         => $pokok,
                'denda'         => $denda,
                'ketetapan'     => $ketetapan,
                'tanggal'       => $tanggal
            );

            $dataSSPD = array(
                'tahun'     => $this->session->userdata('tahun'),
                'skpd'      => $nomor,
                'npwpd'     => $npwpd,
                'obyek'     => $obyek,
                'ketetapan' => $ketetapan
            );

            $where = array(
                'npwpd' => $npwpd,
                'tahun'  => $tahun
            );

            $query = $this->db->get_where('skpd', array('skpd' => $nomor, 'tahun' => $tahun));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData(base64_encode($this->input->post('npwpd')));
            } else {
                /* $this->simprmodel->updateData('skpd',$data,$where); */
                $this->simprmodel->insertData($data, 'skpd');
                /* $this->simprmodel->insertData($dataSSPD, 'sspd'); */
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/skpd');
            }
        }
    }

    public function editData($nomor)
    {
        $nomor            = base64_decode($nomor);
        $data['title']    = 'Data Surat Keterangan Pajak Daerah (SKPD)';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['skpd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha from skpd a, wpr b where a.npwpd=b.npwprd and a.skpd='" . $nomor . "'")->result();
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editskpd', $data);
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
                'penetapan'     => $penetapan,
                'jatuhtempo'    => $jatuhtempo,
                'obyek'         => $obyek,
                'perbulan'      => $perbulan,
                'pokok'         => $pokok,
                'denda'         => $denda,
                'ketetapan'     => $ketetapan,
                'tanggal'       => $tanggal
            );

            $dataSSPD = array(
                'obyek'     => $obyek,
                'ketetapan' => $ketetapan
            );

            $where = array(
                'npwpd' => $npwpd,
                'skpd'   => $nomor,
                'tahun'  => $tahun
            );

            $whereSSPD = array(
                'npwpd' => $npwpd,
                'skpd'   => $nomor,
                'tahun'  => $tahun
            );

            $this->simprmodel->updateData('skpd', $data, $where);
            /* $this->simprmodel->updateData('sspd',$dataSSPD,$whereSSPD); */
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
            redirect('admin/skpd');
        }
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

    public function deleteData($npwpd)
    {
        $dataNPWPD  = $this->db->query("select count(sspd) as jumlah from sspd where npwpd='" . $npwpd . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();
        foreach ($dataNPWPD as $angka) :
            $datanpwpd1 = $angka->jumlah;
        endforeach;

        if ($datanpwpd1 != "0") {
            $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Hapus Data Gagal, Karena Surat SSPD Telah Dibuat!!!');
            redirect('admin/skpd');
        } else {
            $data['cek'] = $this->db->query("select skpd, npwpd from skpd where npwpd='" . $npwpd . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();
            foreach ($data['cek'] as $cek) :
                $whereSSPD = array(
                    'skpd'  => $cek->skpd,
                    'npwpd' => $cek->npwpd,
                    'tahun' => $this->session->userdata('tahun')
                );
            endforeach;
            /* $this->simprmodel->deleteData('sspd',$whereSSPD); */

            /* $where = array('npwpd' => $npwpd, 'tahun' => $this->session->userdata('tahun'));
            $this->simprmodel->deleteData('skpd', $where);

            $data1 = array(
                'tahun'     => $this->session->userdata('tahun'),
                'npwpd'     => $npwpd
            );

            $this->simprmodel->insertData($data1, 'skpd'); */
            $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
            redirect('admin/skpd');
        }
    }

    public function printRegister()
    {
        $data['title']    = 'Register SKPD';
        $data['jenis']    = 'SURAT KETETAPAN PAJAK DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['skpd']     = $this->db->query('select a.*, b.namausaha from skpd a, wpr b where a.npwpd=b.npwprd and LENGTH(RTRIM(skpd)) > 0 AND tahun=' . $this->session->userdata('tahun') . ' order by a.skpd, a.npwpd')->result();


        $this->load->view('template_admin/headerl', $data);
        $this->load->view('admin/report/registerSKPD');
    }

    public function printData($npwpd)
    {
        $nomor                 = base64_decode($npwpd);
        $data['title']         = 'Surat Ketetapan Pajak Daerah';
        $data['jenis']         = 'SURAT KETETAPAN PAJAK DAERAH';
        $data['pemda']         = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['skpd']          = $this->db->query('select a.*, b.namausaha, b.namapemilik, b.alamatusaha, c.kodeLRA from skpd a, wpr b, rekLRA c where a.npwpd=b.npwprd and a.obyek=c.namaLRA and LENGTH(RTRIM(skpd)) > 0 AND tahun="' . $this->session->userdata('tahun') . '" and skpd="' . $nomor . '" order by a.skpd, a.npwpd')->result();
        $data['penetapan']     = $this->db->query('select ketetapan from skpd where tahun="' . $this->session->userdata('tahun') . '" and skpd="' . $nomor . '"')->result();

        foreach ($data['penetapan'] as $angka) :
            $data['terbilang'] = ucwords($this->simprmodel->terbilang($angka->ketetapan)) . " Rupiah";
        endforeach;

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/SKPD', $data);
    }
}
