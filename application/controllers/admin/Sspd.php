<?php
    class Sspd extends CI_Controller{
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
            $data['title']   = 'Data Surat Setoran Pajak Daerah (SSPD)';
            $data['skpd']    = $this->db->query("select * from vsspd where tahun='".$this->session->userdata('tahun')."'")->result();
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/sspd',$data);
            $this->load->view('template_admin/footer');
        }

        
        public function addData($npwpd){
            $data['title']    = 'Data Surat Setoran Pajak Daerah (SSPD)';
            $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['skpd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha from skpd a, wpr b where a.npwpd=b.npwprd and a.npwpd='".base64_decode($npwpd)."' and tahun='".$this->session->userdata('tahun')."'")->result();
            $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();
            $data['akun']     = $this->db->query('select nmrek from rekbank')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/tambahsspd',$data);
            $this->load->view('template_admin/footer');
        }

        public function editData($sspd){
            $nosspd           = base64_decode($this->uri->segment(4)); //str_replace('_','/',substr($sspd,0,strpos($sspd,'vs')));
            $noskpd           = base64_decode($this->uri->segment(5));//str_replace('_','/',substr($sspd,strpos($sspd,'vs')+2,strlen($sspd)));
            $data['title']    = 'Data Surat Setoran Pajak Daerah (SSPD)';
            $data['nosspd']   = $nosspd;
            $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['sspd']     = $this->db->query("select a.*, b.namapemilik, b.namausaha, c.ketetapan from sspd a, wpr b, skpd c where a.npwpd=b.npwprd and a.skpd=c.skpd and a.sspd='".$nosspd."'")->result();
            $data['obyek']    = $this->db->query("select namalra from rekLRA")->result();
            $data['akun']     = $this->db->query('select nmrek from rekbank')->result();

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/editsspd',$data);
            $this->load->view('template_admin/footer');
        }

        public function deleteData($sspd){
            $nosspd = base64_decode($this->uri->segment(4));//str_replace('_','/',substr($sspd,0,strpos($sspd,'vs')));
            $noskpd = base64_decode($this->uri->segment(5)); //substr($sspd,strpos($sspd,'vs')+2,strlen($sspd));
           
            $where = array('sspd' => $nosspd,'tahun' => $this->session->userdata('tahun'));
            $this->simprmodel->deleteData('sspd', $where);
            $this->simprmodel->set_notifikasi_swal('info','DATA BERHASIL DIHAPUS','Data Tidak Dapat Dikembalikan'); 
            redirect('admin/sspd/infoData/'.base64_encode($noskpd).'#');
        }

        public function addDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->addData($this->input->post('npwpd'));
            }else{
                $tahun       = $this->input->post('tahun');
                $sspd        = $this->input->post('sspd');
                $tanggal     = $this->input->post('tanggal');
                $skpd        = $this->input->post('nomor');
                $npwpd       = $this->input->post('npwpd');
                $obyek       = $this->input->post('obyek');
                $nilai       = $this->input->post('setoran');
                $keterangan  = $this->input->post('keterangan');
                $nomorrek    = $this->input->post('nm_rek');
                
                $data = array(
                        'tahun'         => $tahun,
                        'sspd'          => $sspd,
                        'tanggal'       => $tanggal,
                        'skpd'          => $skpd,
                        'npwpd'         => $npwpd,
                        'obyek'         => $obyek,
                        'nilai'         => $nilai,
                        'keterangan'    => $keterangan,
                        'nmrek'         => $nomorrek
                );

                $query = $this->db->get_where('sspd', array('sspd' => $sspd, 'skpd' => $skpd, 'npwpd' => $npwpd, 'tahun' => $tahun));
                $count = $query->num_rows();

                if($count){
                    $this->simprmodel->set_notifikasi_swal('error','Oops...','Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                    $this->addData($npwpd);
                }else{
                    $this->simprmodel->insertData($data,'sspd');
                    $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiSimpan');
                    redirect('admin/sspd');
                }
            }
        }

        public function editDataAct(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->editData(base64_encode($this->input->post('sspd')).'/'.base64_encode($this->input->post('nomor')));
            }else{
                $tahun       = $this->input->post('tahun');
                $sspd        = $this->input->post('sspd');
                $tanggal     = $this->input->post('tanggal');
                $skpd        = $this->input->post('nomor');
                $npwpd       = $this->input->post('npwpd');
                $obyek       = $this->input->post('obyek');
                $nilai       = $this->input->post('setoran');
                $keterangan  = $this->input->post('keterangan');
                $nomorrek    = $this->input->post('nm_rek');
                
                $data = array(
                        'tanggal'       => $tanggal,
                        'nilai'         => $nilai,
                        'keterangan'    => $keterangan,
                        'nmrek'         => $nomorrek
                );

                $where = array(
                    'tahun'             => $this->session->userdata('tahun'),
                    'sspd'              => $sspd,
                    'skpd'              => $skpd
                );

                $this->simprmodel->updateData('sspd',$data,$where);
                $this->simprmodel->set_notifikasi_swal('success','Yuhuu...','Data Berhasil DiSimpan');
                redirect('admin/sspd/infoData/'.base64_encode($skpd));
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('sspd','No. SSPD','required');
            $this->form_validation->set_rules('tanggal','Tanggal Input','required');
            $this->form_validation->set_rules('setoran','Nilai Setoran','required');
            $this->form_validation->set_rules('keterangan','Keterangan','required');
            $this->form_validation->set_rules('nm_rek','Nama Rekening','required');
        }

        public function printRegister(){
            $data['title']    = 'Register SSPD';
            $data['jenis']    = 'SURAT SETORAN PAJAK DAERAH';
            $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            $data['ssprd']     = $this->db->query("SELECT sspd.sspd, sspd.tanggal, wpr.npwprd, wpr.namausaha, sspd.obyek, sspd.keterangan, sspd.nilai FROM sspd INNER JOIN wpr ON sspd.npwpd = wpr.npwprd and sspd.tahun='".$this->session->userdata('tahun')."' order by sspd.tanggal, sspd.sspd")->result();

            
            $this->load->view('template_admin/headerl',$data);
            $this->load->view('admin/report/registerSSPRD');
        }

        public function infoData($skpd){
            $data['title']   = 'Rincian SSPD pada SKPD Nomor ';
            $data['jenis']   = 'sspd';
            $data['kembali'] = 'admin/sspd';
            $data['ssprd']   = $this->db->query("select * from sspd where skpd='".base64_decode($skpd)."' and tahun='".$this->session->userdata('tahun')."'")->result();
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            $data['skpd']    = $skpd;

            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/rincian',$data);
            $this->load->view('template_admin/footer');
        }

        public function printData($sspd){
            $nomor                 = base64_decode($sspd);
            $data['title']         = 'Surat Setoran Pajak Daerah';
            $data['jenis']         = 'SURAT SETORAN PAJAK DAERAH';
            $data['jns']           = 'SSPD';
            $data['pemda']         = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            /* $data['ssrd']          = $this->db->query('select a.*, b.namausaha, b.namapemilik, b.alamatusaha, c.kodeLRA from skpd a, wpr b, rekLRA c where a.npwpd=b.npwprd and a.obyek=c.namaLRA and LENGTH(RTRIM(skpd)) > 0 AND tahun="'.$this->session->userdata('tahun').'" and skpd="'.$nomor.'" order by a.skpd, a.npwpd')->result(); */
            $data['sspd']          = $this->db->query("SELECT sspd.sspd, sspd.tanggal, sspd.nilai, sspd.keterangan, wpr.namapemilik, wpr.npwprd, wpr.namausaha, wpr.alamatusaha, sspd.obyek, rekLRA.kodelra FROM sspd INNER JOIN wpr ON sspd.npwpd = wpr.npwprd INNER JOIN rekLRA ON sspd.obyek = rekLRA.namalra WHERE sspd.sspd = '".$nomor."'")->result();
            
            
            $data['penetapan']     = $this->db->query('select nilai from sspd where tahun="'.$this->session->userdata('tahun').'" and sspd="'.$nomor.'"')->result();

            foreach($data['penetapan'] as $angka):
                $data['terbilang'] = ucwords($this->simprmodel->terbilang($angka->nilai))." Rupiah";
            endforeach;

            $this->load->view('template_admin/header',$data);
            $this->load->view('admin/report/SSPD',$data);
        }

        public function printBlanko($sspd){
            $nomor                 = str_replace("_","/",$sspd);
            $data['title']         = 'Surat Setoran Pajak Daerah';
            $data['jenis']         = 'SURAT SETORAN PAJAK DAERAH';
            $data['jns']           = 'SSPD';
            $data['pemda']         = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            /* $data['ssrd']          = $this->db->query('select a.*, b.namausaha, b.namapemilik, b.alamatusaha, c.kodeLRA from skpd a, wpr b, rekLRA c where a.npwpd=b.npwprd and a.obyek=c.namaLRA and LENGTH(RTRIM(skpd)) > 0 AND tahun="'.$this->session->userdata('tahun').'" and skpd="'.$nomor.'" order by a.skpd, a.npwpd')->result(); */
            /*  $data['sspd']         = $this->db->query("SELECT sspd.sspd, sspd.tanggal, sspd.nilai, sspd.keterangan, wpr.namapemilik, wpr.npwprd, wpr.namausaha, wpr.alamatusaha, sspd.obyek, rekLRA.kodelra FROM sspd INNER JOIN wpr ON sspd.npwpd = wpr.npwprd INNER JOIN rekLRA ON sspd.obyek = rekLRA.namalra WHERE sspd.sspd = '".$nomor."'")->result(); */
            $data['sspd']          = $this->db->query("SELECT '' as sspd, now() AS tanggal, '' as nilai, '' as keterangan, b.namapemilik, b.npwprd, b.namausaha, b.alamatusaha, a.obyek, c.kodelra from skpd a, wpr b, rekLRA c WHERE a.npwpd=b.npwprd AND a.obyek=c.namalra AND a.skpd = '".$nomor."'")->result();
            $data['penetapan']     = $this->db->query('select nilai from sspd where tahun="'.$this->session->userdata('tahun').'" and sspd="'.$nomor.'"')->result();
            $data['terbilang']     = "";

            $this->load->view('template_admin/header',$data);
            $this->load->view('admin/report/SSPD',$data);
        }
    }
