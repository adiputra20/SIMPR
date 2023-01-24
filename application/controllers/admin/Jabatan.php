<?php
class Jabatan extends CI_Controller
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
        $data['title']   = 'Data Jabatan';
        $data['jabatan'] = $this->simprmodel->getData('jabatan')->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/jabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title']   = 'Tambah Data Jabatan';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahjabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($idjabat)
    {
        $where = array('idjabat' => base64_decode($idjabat));
        $data['jabatan'] = $this->db->query("select * from jabatan where idjabat='" . base64_decode($idjabat) . "'")->result();
        $data['title']   = 'Edit Data Jabatan';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editjabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($idjabat)
    {
        $where = array('idjabat' => $idjabat);
        $this->simprmodel->deleteData('jabatan', $where);
        $this->db->query('ALTER TABLE jabatan AUTO_INCREMENT=0;');
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/jabatan');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $nmJabat = $this->input->post('jabatan');

            $data = array(
                'jabatan' => $nmJabat
            );

            $this->simprmodel->insertData($data, 'jabatan');
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
            redirect('admin/jabatan');
        }
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData($this->input->post('idjabat'));
        } else {

            $idJabat = $this->input->post('idjabat');
            $nmJabat = $this->input->post('jabatan');

            $data = array(
                'idjabat' => $idJabat,
                'jabatan' => $nmJabat
            );
            $where = array(
                'idjabat' => $idJabat
            );
            $this->simprmodel->updateData('jabatan', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
            redirect('admin/jabatan');
        }
    }

    public function _rules()
    {
        //$this->form_validation->set_rules('idjabat','id jabatan','required');
        $this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'required');
    }
}
