<?php
    class RekLO extends CI_Controller{
        public function __construct(){
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
        
        public function index(){
            $data['title']   = 'Rekening LO';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['akun']    = $this->db->query('select * from rekLO order by kodeLO')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/rekLO',$data);
            $this->load->view('template_admin/footer');
        }

        public function addData(){
            $data['title']   = 'Tambah Rekening LO';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['akun']    = $this->db->query('select kodeLRA from reklra')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/tambahLO',$data);
            $this->load->view('template_admin/footer');
        }

        public function editData($kode){
            $where = array('kodeLO' => base64_decode($kode));
            $data['akun']    = $this->db->query("select * from rekLO where kodeLO='".base64_decode($kode)."'")->result();
            $data['title']   = 'Edit Rekening LO';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['akunLRA'] = $this->db->query('select kodeLRA from reklra')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/editLO',$data);
            $this->load->view('template_admin/footer');
        }

        public function deleteData($kode){
            $where = array('kodeLO' => $kode);
            $this->simprmodel->deleteData('rekLO', $where);
            $this->simprmodel->set_notifikasi_swal('info','DATA BERHASIL DIHAPUS','Data Tidak Dapat Dikembalikan'); 
            redirect('admin/rekLO');
        }

        public function addDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->addData();
            }else{
                $kodeLO  = $this->input->post('kodeLO');
                $namaLO  = $this->input->post('namaLO');
                $kodeLRA = $this->input->post('kodeLRA'); 

                $data = array(
                        'kodeLO'  => $kodeLO,
                        'namaLO'  => $namaLO,
                        'kodeLRA' => $kodeLRA
                );

                $query = $this->db->get_where('rekLO', array('kodeLO' => $kodeLO));
                $count = $query->num_rows();

                if($count){
                    $this->simprmodel->set_notifikasi_swal('error','Oops...','Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                    $this->addData();
                }else{
                    $this->simprmodel->insertData($data, 'rekLO');
                    $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiSimpan');
                    redirect('admin/rekLO');
                }
            }
        }

        public function editDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->editData($this->input->post('kodeLO'));
            }else{
                
                $kodeLRA = $this->input->post('kodeLRA');
                $kodeLO  = $this->input->post('kodeLO');
                $namaLO  = $this->input->post('namaLO');

                $data = array(
                        'kodeLO'  => $kodeLO,
                        'namaLO' => $namaLO,
                        'kodeLRA' => $kodeLRA
                );
                $where = array(
                    'kodeLO' => $kodeLO
                );
                $this->simprmodel->updateData('rekLO',$data,$where);
                $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiUpdate');
                redirect('admin/rekLO');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('kodeLO','Kode Rekening','required');
            $this->form_validation->set_rules('namaLO','Nama Rekening','required');
            $this->form_validation->set_rules('kodeLRA','Kode Rekening LRA','required');
        }
    }
