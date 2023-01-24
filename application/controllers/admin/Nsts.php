<?php
class Nsts extends CI_Controller
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
        $data['title']   = 'Data Peneriman (STS) Tanpa Penetapan';
        $data['sts']     = $this->db->get_where('sts', array('tahun' => $this->session->userdata('tahun')))->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/nsts', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title']    = 'Data Surat Tanda Setoran (STS)';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();
        $data['rekening'] = $this->db->query("select nmrek from rekbank")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahsts', $data);
        $this->load->view('template_admin/footer');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $tahun       = $this->session->userdata('tahun');
            $nosts       = $this->input->post('no_sts');
            $tanggal     = $this->input->post('tanggal');
            $obyek       = $this->input->post('nmobyek');
            $keterangan  = $this->input->post('keterangan');
            $nilai       = $this->input->post('nilai');
            $norek       = $this->input->post('nm_rek');

            $data = array(
                'tahun'        => $tahun,
                'nosts'        => $nosts,
                'tanggal'      => $tanggal,
                'obyek'        => $obyek,
                'keterangan'   => $keterangan,
                'nilai'        => $nilai,
                'norek'        => $norek
            );

            $query = $this->db->get_where('sts', array('nosts' => $nosts, 'tahun' => $tahun));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData();
            } else {
                $this->simprmodel->insertData($data, 'sts');
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/nsts');
            }
        }
    }

    public function editData($sts)
    {
        $data['sts']      = $this->db->query("select * from sts where nosts='" .   str_replace("_", "/", $sts) . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();
        $data['rekening'] = $this->db->query("select nmrek from rekbank")->result();
        $data['title']    = 'Edit Data STS';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editsts', $data);
        $this->load->view('template_admin/footer');
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData($this->input->post('no_sts'));
        } else {
            $tahun       = $this->session->userdata('tahun');
            $nosts       = $this->input->post('no_sts');
            $tanggal     = $this->input->post('tanggal');
            $obyek       = $this->input->post('nmobyek');
            $keterangan  = $this->input->post('keterangan');
            $nilai       = $this->input->post('nilai');
            $norek       = $this->input->post('nm_rek');

            $data = array(
                'tanggal'      => $tanggal,
                'obyek'        => $obyek,
                'keterangan'   => $keterangan,
                'nilai'        => $nilai,
                'norek'        => $norek
            );

            $where = array(
                'nosts'   => $nosts,
                'tahun' => $tahun
            );

            /* var_dump($data); */
            $this->simprmodel->updateData('sts', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
            redirect('admin/nsts');
        }
    }

    public function deleteData($nosts)
    {
        $where = array('nosts' => str_replace('_', '/', $nosts), 'tahun' => $this->session->userdata('tahun'));
        $this->simprmodel->deleteData('sts', $where);
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/nsts');
    }

    public function printData($nomor)
    {
        $data['title']    = 'SURAT TANDA SETORAN <br> (STS)';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['nsts']     = $this->db->query("select a.*, b.norek, c.kodelra from sts a, rekbank b, reklra c where a.norek=b.nmrek and a.obyek=c.namalra and a.nosts='" . str_replace("_", "/", $nomor) . "'")->result();

        $data['penetapan']     = $this->db->query('select nilai from STS where tahun="' . $this->session->userdata('tahun') . '" and nosts="' . str_replace("_", "/", $nomor) . '"')->result();

        foreach ($data['penetapan'] as $angka) :
            $data['terbilang'] = ucwords($this->simprmodel->terbilang($angka->nilai)) . " Rupiah";
        endforeach;

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/sts');
    }

    public function printRegister()
    {
        $data['title']    = 'Register STS';
        $data['jenis']    = 'SURAT TANDA SETORAN';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['sts']      = $this->db->query("select a.*, b.kodelra from sts a, reklra b where a.obyek=b.namalra and a.tahun='" . $this->session->userdata('tahun') . "' order by a.tanggal, a. nosts")->result();

        $this->load->view('template_admin/headerl', $data);
        $this->load->view('admin/report/registerSTS');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_sts', 'no_sts', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('nmobyek', 'nmobyek ', 'required');
        $this->form_validation->set_rules('nm_rek', 'nm_rek', 'required');
        $this->form_validation->set_rules('nilai', 'nilai', 'required');
    }
}
