<?php
    class Bank extends CI_Controller{
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
            $data['title']   = 'Data Rekening Bank';
            $data['rek']     = $this->simprmodel->getData('rekbank')->result();
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/bank',$data);
            $this->load->view('template_admin/footer');
        }

        public function addData(){
            $data['title'] = 'Tambah Data Rekening Bank';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/tambahbank',$data);
            $this->load->view('template_admin/footer');
        }

        public function editData($norek){
            $where         = array('rekbank' => base64_decode($norek));
            $data['rek']   = $this->db->query("select * from rekbank where norek='".base64_decode($norek)."'")->result();
            $data['title'] = 'Edit Data Pangkat';
            $data['pemda'] = $this->db->query('select Nama_Pemda from pemda')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/editbank',$data);
            $this->load->view('template_admin/footer');
        }

        public function deleteData($norek){
            $where = array('norek' => $norek);
            $this->simprmodel->deleteData('rekbank', $where);
            $this->simprmodel->set_notifikasi_swal('info','DATA BERHASIL DIHAPUS','Data Tidak Dapat Dikembalikan'); 
            redirect('admin/bank');
        }

        public function addDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->addData();
            }else{
                $nomor     = $this->input->post('no_rek');
                $nama      = $this->input->post('nm_rek');

                $data = array(
                        'norek'    => $nomor,
                        'nmrek'    => $nama
                );

                $query = $this->db->get_where('rekbank', array('norek' => $nomor));
                $count = $query->num_rows();

                if($count){
                    $this->simprmodel->set_notifikasi_swal('error','Oops...','Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                    $this->addData();
                }else{
                    $this->simprmodel->insertData($data, 'rekbank');
                    $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiSimpan');
                    redirect('admin/bank');
                }
            }
        }

        public function editDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->editData($this->input->post('no_rek'));
            }else{
                $nomor     = $this->input->post('no_rek');
                $nama      = $this->input->post('nm_rek');

                $data = array(
                        'norek'    => $nomor,
                        'nmrek'    => $nama
                );
                $where = array(
                    'norek' => $nomor
                );
                $this->simprmodel->updateData('rekbank',$data,$where);
                $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiUpdate');
                redirect('admin/bank');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('no_rek','No. Rekening','required');
            $this->form_validation->set_rules('nm_rek','Nama Rekening','required');
        }
    }
