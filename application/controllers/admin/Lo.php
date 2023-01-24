<?php
    class Lo extends CI_Controller{
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
            $data['title']   = 'Laporan Operasional';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            
            $strsql = "
            select kode1 as kode, nama1 as nama,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,1)=rekLO1.kode1 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo1
            WHERE kode1 IN (select DISTINCT(substr(kodelo,1,1)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode2 as kode, nama2 as nama,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,3)=rekLO2.kode2 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo2
            WHERE kode2 IN (select DISTINCT(substr(kodelo,1,3)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode3 as kode, nama3 as nama,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,6)=rekLO3.kode3 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo3 
            WHERE kode3 IN (select DISTINCT(substr(kodelo,1,6)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode4 as kode, nama4 as nama,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,9)=rekLO4.kode4 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo4 
            WHERE kode4 IN (select DISTINCT(substr(kodelo,1,9)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode5 as kode, nama5 as nama,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,12)=rekLO5.kode5 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo5 
            WHERE kode5 IN (select DISTINCT(substr(kodelo,1,12)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kodelo as kode, namaLO as nama, 
            (select sum(ketetapan) from vpiutang1 WHERE vpiutang1.kodeLO=rekLO.kodeLO AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLO
            WHERE kodeLO IN (select DISTINCT(kodelo) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            ORDER BY kode
            ";

            $data['lra']   = $this->db->query($strsql)->result();
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/lo',$data);
            $this->load->view('template_admin/footer');
        }

        public function printData(){
            $data['title']     = 'LAPORAN OPERASIONAL';
            $data['jenis']     = 'lo';
            $data['pemda']     = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            $data['periode']   = date('F Y',strtotime('2022-01-01')) .' sampai dengan ' . date("F Y",strtotime('2022-12-31'));
            $strsql = "
            select kode1 as kode, nama1 as nama, 0 as anggaran,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,1)=rekLO1.kode1 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo1
            WHERE kode1 IN (select DISTINCT(substr(kodelo,1,1)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode2 as kode, nama2 as nama, 0 as anggaran,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,3)=rekLO2.kode2 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo2
            WHERE kode2 IN (select DISTINCT(substr(kodelo,1,3)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode3 as kode, nama3 as nama, 0 as anggaran,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,6)=rekLO3.kode3 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo3 
            WHERE kode3 IN (select DISTINCT(substr(kodelo,1,6)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode4 as kode, nama4 as nama, 0 as anggaran,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,9)=rekLO4.kode4 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo4 
            WHERE kode4 IN (select DISTINCT(substr(kodelo,1,9)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode5 as kode, nama5 as nama, 0 as anggaran,
            (select sum(ketetapan) from vpiutang1 WHERE substr(vpiutang1.kodeLO,1,12)=rekLO5.kode5 AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM reklo5 
            WHERE kode5 IN (select DISTINCT(substr(kodelo,1,12)) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kodelo as kode, namaLO as nama, 0 as anggaran,
            (select sum(ketetapan) from vpiutang1 WHERE vpiutang1.kodeLO=rekLO.kodeLO AND vpiutang1.tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLO
            WHERE kodeLO IN (select DISTINCT(kodelo) from vpiutang1 where tahun='".$this->session->userdata('tahun')."')
            ORDER BY kode
            ";

            $data['lra']   = $this->db->query($strsql)->result();
                
            $this->load->view('template_admin/header',$data);
            $this->load->view('admin/report/LORA');          
        }
    }
