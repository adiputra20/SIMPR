<?php
    class Lra extends CI_Controller{
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
            $data['title']   = 'Laporan Realisasi Anggaran';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            
            $strsql = "
            select kode1 as kode, nama1 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,1)=rekLRA1.kode1 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA1
            WHERE kode1 IN (select DISTINCT(substr(kode,1,1)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode2 as kode, nama2 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,3)=rekLRA2.kode2 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA2
            WHERE kode2 IN (select DISTINCT(substr(kode,1,3)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode3 as kode, nama3 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,6)=rekLRA3.kode3 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA3
            WHERE kode3 IN (select DISTINCT(substr(kode,1,6)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode4 as kode, nama4 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,9)=rekLRA4.kode4 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA4 
            WHERE kode4 IN (select DISTINCT(substr(kode,1,9)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode5 as kode, nama5 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,12)=rekLRA5.kode5 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA5 
            WHERE kode5 IN (select DISTINCT(substr(kode,1,12)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kodelra as kode, namalra as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE vpenerimaan.kode=rekLRA.kodelra and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA 
            WHERE kodelra IN (select DISTINCT(kode) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            ORDER BY kode
            ";

            $data['lra']   = $this->db->query($strsql)->result();
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/lra',$data);
            $this->load->view('template_admin/footer');
        }

        public function printData(){
            $data['title']     = 'LAPORAN REALISASI ANGGARAN';
            $data['jenis']     = 'lra';
            $data['pemda']     = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            $data['periode']   = date('F Y',strtotime('2022-01-01')) .' sampai dengan ' . date("F Y",strtotime('2022-12-31'));
            $strsql = "
            select kode1 as kode, nama1 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,1)=rekLRA1.kode1 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA1
            WHERE kode1 IN (select DISTINCT(substr(kode,1,1)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode2 as kode, nama2 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,3)=rekLRA2.kode2 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA2
            WHERE kode2 IN (select DISTINCT(substr(kode,1,3)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode3 as kode, nama3 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,6)=rekLRA3.kode3 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA3
            WHERE kode3 IN (select DISTINCT(substr(kode,1,6)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode4 as kode, nama4 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,9)=rekLRA4.kode4 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA4 
            WHERE kode4 IN (select DISTINCT(substr(kode,1,9)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kode5 as kode, nama5 as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE substr(vpenerimaan.kode,1,12)=rekLRA5.kode5 and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA5 
            WHERE kode5 IN (select DISTINCT(substr(kode,1,12)) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            UNION ALL
            select kodelra as kode, namalra as nama, 0 as anggaran,
            (select sum(nilai) from vpenerimaan WHERE vpenerimaan.kode=rekLRA.kodelra and tahun='".$this->session->userdata('tahun')."') AS nilai
            FROM rekLRA 
            WHERE kodelra IN (select DISTINCT(kode) from vpenerimaan where tahun='".$this->session->userdata('tahun')."')
            ORDER BY kode
            ";

            $data['lra']   = $this->db->query($strsql)->result();
                
            $this->load->view('template_admin/header',$data);
            $this->load->view('admin/report/LORA');          
        }
    }
