<?php
    class Neraca extends CI_Controller{
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
            $data['title']   = 'Neraca Pemerintah Daerah';
            $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
            
            $strsql = "
            select 1 as nomor, 'Aset' as nama, sum(debet) as debet, 'b' as flag FROM (SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
            UNION ALL
            select 2 as nomor, 'Aset Lancar' as nama, sum(debet) as debet, 'b' as flag FROM ( SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
                UNION ALL
            SELECT 3 AS nomor, 'Kas Di Kas Daerah' AS nama, sum( nilai ) AS debet, 'n' as flag FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' 
                UNION ALL
            SELECT 4 AS nomor, 'Piutang Pendapatan' AS nama, sum(ketetapan - ifnull( setoran, 0 )) AS debet, 'n' as flag FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."'
            UNION ALL
            select 5 as nomor, 'Jumlah Aset' as nama, sum(debet) as debet, 'b' as flag  FROM (SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
                UNION ALL
            select 6 as nomor, ' ' as nama, '0' as debet, 'n' as flag
                UNION ALL
            select 7 as nomor, 'Kewajiban' as nama, '0' as debet, 'b' as flag
            UNION ALL
            select 8 as nomor, ' ' as nama, '0' as debet , 'n' as flag
            UNION ALL
            select 9 as nomor, 'Ekuitas' as nama, sum(debet) as debet, 'b' as flag FROM (SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
            ";

            $data['neraca']   = $this->db->query($strsql)->result();
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/neraca',$data);
            $this->load->view('template_admin/footer');
        }

        public function printData(){
            $data['title']     = 'NERACA';
            $data['jenis']     = 'lra';
            $data['pemda']     = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            $data['periode']   = date('F Y',strtotime('2022-01-01')) .' sampai dengan ' . date("F Y",strtotime('2022-12-31'));
            $strsql = "
            select 1 as nomor, 'Aset' as nama, sum(debet) as debet, 'b' as flag FROM (SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
            UNION ALL
            select 2 as nomor, 'Aset Lancar' as nama, sum(debet) as debet, 'b' as flag FROM ( SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
                UNION ALL
            SELECT 3 AS nomor, 'Kas Di Kas Daerah' AS nama, sum( nilai ) AS debet, 'n' as flag FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' 
                UNION ALL
            SELECT 4 AS nomor, 'Piutang Pendapatan' AS nama, sum(ketetapan - ifnull( setoran, 0 )) AS debet, 'n' as flag FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."'
            UNION ALL
            select 5 as nomor, 'Jumlah Aset' as nama, sum(debet) as debet, 'b' as flag  FROM (SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
                UNION ALL
            select 6 as nomor, ' ' as nama, '0' as debet, 'n' as flag
                UNION ALL
            select 7 as nomor, 'Kewajiban' as nama, '0' as debet, 'b' as flag
            UNION ALL
            select 8 as nomor, ' ' as nama, '0' as debet , 'n' as flag
            UNION ALL
            select 9 as nomor, 'Ekuitas' as nama, sum(debet) as debet, 'b' as flag FROM (SELECT sum( nilai ) AS debet FROM vpenerimaan WHERE tahun = '".$this->session->userdata('tahun')."' UNION all SELECT sum(ketetapan - ifnull( setoran, 0 )) AS debet FROM vpiutang WHERE tahun = '".$this->session->userdata('tahun')."') AS Total
            ";

            $data['neraca']   = $this->db->query($strsql)->result();
                
            $this->load->view('template_admin/header',$data);
            $this->load->view('admin/report/neraca');          
        }
    }
