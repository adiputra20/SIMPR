<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function index()
    {
        $data['title']    = 'Tambah Data Pegawai';
        $data['golongan'] = $this->db->query("select gorl from golr")->result();
        $data['jabatan']  = $this->db->query("select jabatan from jabatan")->result();
        $data['bidang']   = $this->db->query("select bidang from bidang")->result();
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('pegawai/register', $data);
    }

    public function save()
    {
        $nip      = $this->input->post('nip');
        $nama     = $this->input->post('nama');
        $password = $this->input->post('password');
        $golr     = $this->input->post('golongan');
        $akses    = 3;

        $data = array(
            'nip'     => $nip,
            'nama'    => $nama,
            'akses'   => $akses,
            'golr'    => $golr,
            'password' => $password,
        );

        $query = $this->db->get_where('pegawai', array('nip' => $nip));
        $count = $query->num_rows();

        if ($count) {
            $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, NIP Pernah Digunakan!!!');
            $this->index();
        } else {
            $this->simprmodel->insertData($data, 'pegawai');
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan, Tunggu Proses Aktivasi Agar Bisa Login');
            redirect('admin/auth');
        }
    }
}
