<?php
class User extends CI_Controller
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
        $data['title']   = 'Data Pegawai';
        $data['user']    = $this->db->query("select a.*, b.pangkat FROM pegawai a, golr b WHERE a.golr=b.gorl")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title']    = 'Tambah Data Pegawai';
        $data['golongan'] = $this->db->query("select gorl from golr")->result();
        $data['jabatan']  = $this->db->query("select jabatan from jabatan")->result();
        $data['bidang']   = $this->db->query("select bidang from bidang")->result();
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahuser', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($nip)
    {
        $where = array('nip' => base64_decode($nip));
        $data['pegawai']  = $this->db->query("select * from pegawai where nip='" . base64_decode($nip) . "'")->result();
        $data['golongan'] = $this->db->query("select gorl from golr")->result();
        $data['jabatan']  = $this->db->query("select jabatan from jabatan")->result();
        $data['bidang']   = $this->db->query("select bidang from bidang")->result();
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['title']    = 'Edit Data Pegawai';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/edituser', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($nip)
    {
        $where = array('nip' => $nip);

        $fotonya = $this->db->query("select foto from pegawai where nip='" . $nip . "'")->result();

        foreach ($fotonya as $fotox) {
            if (file_exists('./assets/img/pegawai/' . $fotox->foto)) {
                unlink('./assets/img/pegawai/' . $fotox->foto);
            }
        }
        $this->simprmodel->deleteData('pegawai', $where);
        $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
        redirect('admin/user');
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $nip      = $this->input->post('nip');
            $nama     = $this->input->post('nama');
            $golr     = $this->input->post('golongan');
            $jabatan  = $this->input->post('jabatan');
            $bidang   = $this->input->post('bidang');
            $password = $this->input->post('password');
            $akses    = $this->input->post('akses');
            $namafoto = $_FILES['foto']['name'];

            /* if($this->input->post('status')=="on"){
                    $akses =  2;
                }else{
                     $akses = 3;
                } */

            if ($namafoto == TRUE) {
                $config = [
                    'upload_path'   => './assets/img/pegawai/',
                    'allowed_types' => 'gif|jpg|png',
                    'file_name'        => $namafoto,
                ];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $data = array(
                        'nip'     => $nip,
                        'nama'    => $nama,
                        'golr'    => $golr,
                        'jabatan' => $jabatan,
                        'bidang'  => $bidang,
                        'akses'   => $akses,
                        'password' => $password,
                        'foto'    => $this->upload->data('file_name')
                    );

                    $query = $this->db->get_where('pegawai', array('nip' => $nip));
                    $count = $query->num_rows();

                    if ($count) {
                        $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, NIP Pernah Digunakan!!!');
                        $this->addData();
                    } else {
                        $this->simprmodel->insertData($data, 'pegawai');
                        $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                        redirect('admin/user');
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Gagal Simpan Karena ' . $error['error']);
                    $this->index();
                }
            } else {
                $data = array(
                    'nip'     => $nip,
                    'nama'    => $nama,
                    'golr'    => $golr,
                    'jabatan' => $jabatan,
                    'bidang'  => $bidang,
                    'akses'   => $akses,
                    'password' => $password,
                    'foto'    => ''
                );

                $query = $this->db->get_where('pegawai', array('nip' => $nip));
                $count = $query->num_rows();

                if ($count) {
                    $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, NIP Pernah Digunakan!!!');
                    $this->addData();
                } else {
                    $this->simprmodel->insertData($data, 'pegawai');
                    $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                    redirect('admin/user');
                }
            }
        }
    }

    public function editPass()
    {
        /* var_dump('disini masuk'); */
        $this->_rulesPass();
        if ($this->form_validation->run() == FALSE) {
            $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Diisi lengkap dong bosku');
            redirect('admin/dashboard');
        } else {
            $nip      = $this->input->post('nip');
            $new      = $this->input->post('newPass');
            $nyu      = $this->input->post('newPass1');

            if ($new != $nyu) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Password Tidak Sama');
                redirect('admin/dashboard');
            } else {
                $data = array(
                    'password'  => $new
                );

                $where = array('nip' => $nip);
                $this->simprmodel->updateData('pegawai', $data, $where);
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
                redirect('admin/dashboard');
            }
        }
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData($this->input->post('nip'));
        } else {
            $nip      = $this->input->post('nip');
            $nama     = $this->input->post('nama');
            $golr     = $this->input->post('golongan');
            $jabatan  = $this->input->post('jabatan');
            $bidang   = $this->input->post('bidang');
            $password = $this->input->post('password');
            $fotolama = $this->input->post('fotolama');
            $akses    = $this->input->post('akses');
            $namafoto = $_FILES['foto']['name'];

            /* if($this->input->post('status')=="on"){
                    $akses =  2;
                }else{
                    $akses = 3;
                } */

            if ($namafoto == TRUE) {
                $config = [
                    'upload_path'   => './assets/img/pegawai/',
                    'allowed_types' => 'gif|jpg|png',
                    'file_name'        => $namafoto,
                ];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    if (file_exists('./assets/img/pegawai/' . $fotolama)) {
                        unlink('./assets/img/pegawai/' . $fotolama);
                    }
                    $foto = $this->upload->data('file_name');

                    $data = array(
                        'nip'      => $nip,
                        'nama'     => $nama,
                        'golr'     => $golr,
                        'jabatan'  => $jabatan,
                        'bidang'   => $bidang,
                        'akses'    => $akses,
                        'password' => $password,
                        'foto'     => $this->upload->data('file_name')

                    );

                    $where = array(
                        'nip' => $nip
                    );

                    $this->simprmodel->updateData('pegawai', $data, $where);
                    $this->session->set_usedata('foto', $this->upload->data('file_name'));
                    $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
                    if ($this->session->userdata('akses') == 1) {
                        redirect('admin/user');
                    } else {
                        redirect('admin/dashboard');
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Gagal Simpan Karena ' . $error['error']);
                    $this->index();
                }
            } else {
                $data = array(
                    'nama'     => $nama,
                    'golr'     => $golr,
                    'jabatan'  => $jabatan,
                    'bidang'   => $bidang,
                    'akses'    => $akses,
                    'password' => $password
                );

                $where = array(
                    'nip' => $nip
                );
                $this->simprmodel->updateData('pegawai', $data, $where);
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
                if ($this->session->userdata('akses') == 1) {
                    redirect('admin/user');
                } else {
                    redirect('admin/dashboard');
                }
            }


            /*  $data = array(
                        'nip'      => $nip,
                        'nama'     => $nama,
                        'golr'     => $golr,
                        'jabatan'  => $jabatan,
                        'bidang'   => $bidang,
                        'akses'    => $akses,
                        'password' => $password
                );

                $where = array(
                    'nip' => $nip
                );
                $this->simprmodel->updateData('pegawai',$data,$where);
                $this->simprmodel->set_notifikasi_swal('success','Yuuuuuhuuuuu.....','Data Berhasil DiUpdate');
                redirect('admin/user'); */
        }
    }

    public function register()
    {
        $data['title']    = 'Tambah Data Pegawai';
        $data['golongan'] = $this->db->query("select gorl from golr")->result();
        $data['jabatan']  = $this->db->query("select jabatan from jabatan")->result();
        $data['bidang']   = $this->db->query("select bidang from bidang")->result();
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/registeruser', $data);
        $this->load->view('template_admin/footer');
    }

    public function aktifasi($nip)
    {
        $where = array('nip' => base64_decode($nip));
        $data  = array('aktif' => 1);

        $this->simprmodel->updateData('pegawai', $data, $where);
        $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu', 'User sudah diaktivasi');
        redirect('admin/user');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('golongan', 'Golongan/Ruang', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function _rulesPass()
    {
        $this->form_validation->set_rules('newPass', 'Password', 'required');
        $this->form_validation->set_rules('newPass1', 'Password', 'required');
    }
}
