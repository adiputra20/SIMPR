<?php
class Fiskal extends CI_Controller
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
        $data['title']   = 'Data Fiskal';
        $data['fiskal'] = $this->db->query("select * from fiskal where tahun='" . $this->session->userdata('tahun') . "'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/fiskal', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title'] = 'Tambah Data Fiskal';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahfiskal', $data);
        $this->load->view('template_admin/footer');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $nomor     = $this->input->post('nomor');
            $nama      = $this->input->post('nama');
            $npwp      = $this->input->post('npwp');
            $jenis     = $this->input->post('jenis');
            $pemilik   = $this->input->post('pemilik');
            $alamat    = $this->input->post('alamat');
            $tanggal1  = $this->input->post('tanggal1');
            $tanggal2  = $this->input->post('tanggal2');
            $tanggal3  = $this->input->post('tanggal3');
            $tahun     = $this->session->userdata('tahun');

            $data = array(
                'nomorfiskal'  => $nomor,
                'namapemilik'  => $pemilik,
                'namausaha'    => $nama,
                'alamat'       => $alamat,
                'npwp'         => $npwp,
                'jenisusaha'   => $jenis,
                'tanggalawal'  => $tanggal1,
                'tanggalakhir' => $tanggal2,
                'tanggalcetak' => $tanggal3,
                'tahun'        => $tahun
            );

            $query = $this->db->get_where('fiskal', array('nomorfiskal' => $nomor, 'tahun' => $tahun));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData();
            } else {
                $this->simprmodel->insertData($data, 'fiskal');
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/fiskal');
            }
        }
    }

    public function editData($nomor)
    {
        $where           = array('nomorfiskal' => str_replace("_", "/", $nomor));
        $data['fiskal']  = $this->db->query("select * from fiskal where nomorfiskal='" . str_replace("_", "/", $nomor) . "'")->result();
        $data['title']   = 'Edit Data Keterangan Fiskal';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editfiskal', $data);
        $this->load->view('template_admin/footer');
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData(str_replace("/", "_", $this->input->post('nomor')));
        } else {

            $nomor     = $this->input->post('nomor');
            $nama      = $this->input->post('nama');
            $npwp      = $this->input->post('npwp');
            $jenis     = $this->input->post('jenis');
            $pemilik   = $this->input->post('pemilik');
            $alamat    = $this->input->post('alamat');
            $tanggal1  = $this->input->post('tanggal1');
            $tanggal2  = $this->input->post('tanggal2');
            $tanggal3  = $this->input->post('tanggal3');
            $tahun     = $this->session->userdata('tahun');

            $data = array(
                'namapemilik'  => $pemilik,
                'namausaha'    => $nama,
                'alamat'       => $alamat,
                'npwp'         => $npwp,
                'jenisusaha'   => $jenis,
                'tanggalawal'  => $tanggal1,
                'tanggalakhir' => $tanggal2,
                'tanggalcetak' => $tanggal3,
                'tahun'        => $tahun
            );

            $where = array(
                'nomorfiskal' => $nomor,
                'tahun'       => $tahun
            );
            $this->simprmodel->updateData('fiskal', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
            redirect('admin/fiskal');
        }
    }

    public function deleteData($nomor)
    {
        $where = array('nomorfiskal' => str_replace("_", "/", $nomor), 'tahun' => $this->session->userdata('tahun'));
        $this->simprmodel->deleteData('fiskal', $where);
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/fiskal');
    }

    public function printData($nomor)
    {
        $data['title']    = 'SURAT KETERANGAN FISKAL';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['fiskal']   = $this->db->query("select * from fiskal where nomorfiskal='" . str_replace("_", "/", $nomor) . "'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/formfiskal');
    }

    public function printRegister()
    {
        $data['title']    = 'Register Keterangan Fiskal';
        $data['jenis']    = 'Surat Keterangan Fiskal';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['fiskal']   = $this->db->query("select * from fiskal where tahun='" . $this->session->userdata('tahun') . "'order by tanggalcetak, nomorfiskal")->result();


        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/registerfiskal');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('nama', 'Nama Badan Usaha', 'required');
        $this->form_validation->set_rules('npwp', 'NPWP', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Badan Usaha', 'required');
        $this->form_validation->set_rules('pemilik', 'Nama Pemilik Usaha', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Badan Usaha', 'required');
        $this->form_validation->set_rules('tanggal1', 'Tgl. Awal', 'required');
        $this->form_validation->set_rules('tanggal2', 'Tgl. Akhir', 'required');
    }
}
