<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title']   = 'SIMPR';
			$data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

			$this->load->view('template_admin/headerl', $data);
			$this->load->view('admin/loginPages');
		} else {
			$user     = $this->input->post('nip');
			$password = $this->input->post('password');
			$tahun	  = $this->input->post('tahun');
			$check    = $this->simprmodel->cekLogin($user, $password);

			/* var_dump('usernya '.$this->input->post('nip').', passwordya '.$this->input->post('password').', tahun anggarannya '.$this->input->post('tahun')); */

			if ($check == FALSE) {
				$this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Kombinasi NIP dan Password tidak Sesuai bosku!!!');
				redirect('welcome');
			} else {
				$this->session->set_userdata('akses', $check->akses);
				$this->session->set_userdata('nama', $check->nama);
				$this->session->set_userdata('nip', $check->nip);
				$this->session->set_userdata('foto', $check->foto);
				$this->session->set_userdata('tahun', $tahun);

				if ($check->aktif == 1) {
					switch ($check->akses) {
						case 1:
							redirect('admin/dashboard');
							break;
						case 2:
							redirect('admin/dashboard');
							break;
						case 3:
							redirect('pegawai/dashboard');
							break;
						default:
							break;
					}
				} else {
					$this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'User Belum Dikativasi!!!');
					redirect('welcome');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nip', 'NIPnya diisi dong bosku', 'required');
		$this->form_validation->set_rules('password', 'Passwordnya diisi juga dong bosku', 'required');
		$this->form_validation->set_rules('tahun', 'mau tahun berapa bosku?', 'required');
	}
}
