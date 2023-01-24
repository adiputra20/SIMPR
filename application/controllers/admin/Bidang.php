<?php
class Bidang extends CI_Controller
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
        $data['title']   = 'Data Bidang Pendapatan';
        $data['bidang'] = $this->simprmodel->getData('bidang')->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/bidang', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title']   = 'Tambah Data Bidang Pendapatan';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahbidang', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($idjabat)
    {
        $where           = array('kode' => base64_decode($idjabat));
        $data['bidang']  = $this->db->query("select * from bidang where kode='" . base64_decode($idjabat) . "'")->result();
        $data['title']   = 'Edit Data Bidang Pendapatan';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editbidang', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($idjabat)
    {
        $where = array('kode' => $idjabat);
        $this->simprmodel->deleteData('bidang', $where);
        $this->db->query('ALTER TABLE bidang AUTO_INCREMENT=0;');
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/bidang');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $bidang = $this->input->post('bidang');

            $data = array(
                'bidang' => $bidang
            );

            $this->simprmodel->insertData($data, 'bidang');
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
            redirect('admin/bidang');
        }
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData($this->input->post('bidang'));
        } else {

            $kode   = $this->input->post('idjabat');
            $bidang = $this->input->post('bidang');

            $data = array(
                'kode'    => $kode,
                'bidang'  => $bidang
            );
            $where = array(
                'kode' => $kode
            );

            $this->simprmodel->updateData('bidang', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
            redirect('admin/bidang');
        }
    }

    public function _rules()
    {
        //$this->form_validation->set_rules('idjabat','id jabatan','required');
        $this->form_validation->set_rules('bidang', 'Nama Bidang', 'required');
    }
}
