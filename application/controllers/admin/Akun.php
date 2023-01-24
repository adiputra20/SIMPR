<?php
class Akun extends CI_Controller
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
        $data['title']   = 'Data Pangkat';
        $data['pangkat'] = $this->simprmodel->getData('golr')->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pangkat', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title'] = 'Tambah Data Pangkat';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahpangkat', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($golongan)
    {
        $where = array('gorl' => $golongan);
        $data['golongan'] = $this->db->query("select * from golr where gorl='$golongan'")->result();
        $data['title'] = 'Edit Data Pangkat';
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editpangkat', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($golongan)
    {
        $where = array('gorl' => $golongan);
        $this->simprmodel->deleteData('golr', $where);
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/pangkat');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData();
            //var_dump('ERROR BOS!!!!!!!');
        } else {
            $gol     = $this->input->post('golongan');
            $pangkat = $this->input->post('pangkat');

            $data = array(
                'gorl'    => $gol,
                'pangkat' => $pangkat
            );

            $query = $this->db->get_where('golr', array('gorl' => $gol));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData();
            } else {
                $this->simprmodel->insertData($data, 'golr');
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/pangkat');
            }
        }
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData($this->input->post('golongan'));
        } else {
            $gol     = $this->input->post('golongan');
            $pangkat = $this->input->post('pangkat');

            $data = array(
                'gorl'    => $gol,
                'pangkat' => $pangkat
            );
            $where = array(
                'gorl' => $gol
            );
            $this->simprmodel->updateData('golr', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
            redirect('admin/pangkat');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('golongan', 'Golongan/Ruang', 'required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
    }
}
