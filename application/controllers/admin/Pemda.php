<?php
    class Pemda extends CI_Controller{
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
            $data['title']    = 'DATA UMUM PEMERINTAH DAERAH';
            $data['pemda']    = $this->db->query('select * from pemda')->result();
            $data['golongan'] = $this->db->query("select gorl from golr")->result();
            //$data['pegawai'] = $pegawai->num_rows();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/pemda',$data);
            $this->load->view('template_admin/footer');
        }

        public function editDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->index();
            }else{
                $nama_pemda  = $this->input->post('nama_pemda');
                $ibu_kota    = $this->input->post('ibu_kota');
                $bupati      = $this->input->post('bupati');
                $nama_kaban  = $this->input->post('nama_kaban');
                $nip_kaban   = $this->input->post('nip_kaban');
                $gol_kaban   = $this->input->post('gol_kaban');
                $nama_kabid  = $this->input->post('nama_kabid');
                $nip_kabid   = $this->input->post('nip_kabid');
                $gol_kabid   = $this->input->post('gol_kabid');
                $nama_bend   = $this->input->post('nama_bend');
                $nip_bend    = $this->input->post('nip_bend');
                $gol_bend    = $this->input->post('gol_bend');
                
                $data = array(
                        'Nama_Pemda' => $nama_pemda,
                        'Ibu_Kota'   => $ibu_kota,
                        'Bupati'     => $bupati,
                        'nama_kaban' => $nama_kaban,
                        'nip_kaban'  => $nip_kaban,
                        'gol_kaban'  => $gol_kaban,
                        'nama_kabid' => $nama_kabid,
                        'nip_kabid'  => $nip_kabid,
                        'gol_kabid'  => $gol_kabid,
                        'nama_bend'  => $nama_bend,
                        'nip_bend'   => $nip_bend,
                        'gol_bend'   => $gol_bend
                );

                $where = array(
                    'Nama_Pemda' => $nama_pemda
                );
                $this->simprmodel->updateDataAll('pemda',$data);
                $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiSimpan');
                redirect('admin/pemda');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('nama_pemda','Nama Pemerintah Daerah','required');
            $this->form_validation->set_rules('ibu_kota','Ibu Kota Daerah','required');
            $this->form_validation->set_rules('bupati','Kepala Daerah','required');
            $this->form_validation->set_rules('nama_kaban','Nama Kepala SKPD','required');
            $this->form_validation->set_rules('nip_kaban','NIP Kepala SKPD','required');
            $this->form_validation->set_rules('gol_kaban','Golongan/Ruang Kepala SKPD','required');
            $this->form_validation->set_rules('nama_kabid','Nama Kepala Bidang','required');
            $this->form_validation->set_rules('nip_kabid','NIP Kepala Bidang','required');
            $this->form_validation->set_rules('gol_kabid','Golongan/Ruang Kepala Bidang','required');
        }
    }
