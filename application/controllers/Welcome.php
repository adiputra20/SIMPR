<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{

		$data['title']   = 'SIMPR';
		$data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

		/* $this->load->view('template_admin/headerl',$data);
			$this->load->view('loginPages'); */
		/* $this->load->view('template_admin/headerlanding'); */
		$this->load->view('landing', $data);
		/* $this->load->view('template_admin/footerlanding'); */
	}
}
