<?php
    class RekLRA extends CI_Controller{
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
            $data['title']   = 'Rekening LRA';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['akun']    = $this->db->query('select * from rekLRA order by kodeLRA')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/rekLRA',$data);
            $this->load->view('template_admin/footer');
        }

        public function addData(){
            $data['title']   = 'Tambah Rekening LRA';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/tambahLRA',$data);
            $this->load->view('template_admin/footer');
        }

        public function editData($kode){
            $where = array('kodelra' => base64_decode($kode));
            $data['akun'] = $this->db->query("select * from rekLRA where kodelra='".base64_decode($kode)."'")->result();
            $data['title']   = 'Edit Rekening LRA';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/editLRA',$data);
            $this->load->view('template_admin/footer');
        }

        public function deleteData($kode){
            $where = array('kodeLRA' => $kode);
            $this->simprmodel->deleteData('rekLRA', $where);
            $this->simprmodel->set_notifikasi_swal('info','DATA BERHASIL DIHAPUS','Data Tidak Dapat Dikembalikan'); 
            redirect('admin/rekLRA');
        }

        public function addDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->addData();
            }else{
                $kodeLRA = $this->input->post('kodeLRA');
                $namaLRA = $this->input->post('namaLRA');

                $data = array(
                        'kodeLRA' => $kodeLRA,
                        'namaLRA' => $namaLRA
                );

                $query = $this->db->get_where('rekLRA', array('kodeLRA' => $kodeLRA));
                $count = $query->num_rows();

                if($count){
                    $this->simprmodel->set_notifikasi_swal('error','Oops...','Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                    $this->addData();
                }else{
                    $this->simprmodel->insertData($data, 'rekLRA');
                    $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiSimpan');
                    redirect('admin/rekLRA');
                }
            }
        }

        public function editDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->editData($this->input->post('kodeLRA'));
            }else{
                
                $kodeLRA = $this->input->post('kodeLRA');
                $namaLRA = $this->input->post('namaLRA');

                $data = array(
                        'kodeLRA' => $kodeLRA,
                        'namaLRA' => $namaLRA
                );
                $where = array(
                    'kodeLRA' => $kodeLRA
                );
                $this->simprmodel->updateData('rekLRA',$data,$where);
                $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiUpdate');
                redirect('admin/rekLRA');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('kodeLRA','Kode Rekening','required');
            $this->form_validation->set_rules('namaLRA','Nama Rekening','required');
        }
    }
