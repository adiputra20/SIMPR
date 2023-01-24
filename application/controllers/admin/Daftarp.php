<?php
if (!defined('BASEPATH')) exit('Tidak ada akses langsung script diperbolehkan');

class Daftarp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Export_model', 'export');

        if ($this->session->userdata('akses') != '1') {
            if ($this->session->userdata('akses') != '2') {
                if ($this->session->userdata('akses') != '3') {
                    $this->simprmodel->set_notifikasi_swal('error', 'Oops', 'Anda Belum Login Bosku!!!');
                    redirect('Welcome');
                }
            }
        }
    }

    public function index()
    {
        $data['title']   = 'Data Wajib Pajak';
        $data['wp']      = $this->db->query("select npwprd,namapemilik,namausaha,alamatpemilik,status,jenisusaha FROM wpr WHERE jenis='p'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/daftarp', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title']    = 'Tambah Data Wajib Pajak';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahwp', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($npwpd)
    {
        $where = array('npwprd' => base64_decode($npwpd));
        $data['wp']      = $this->db->query("select * from wpr where npwprd='" . base64_decode($npwpd) . "'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['title']   = 'Edit Data Wajib Pajak';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editwp', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($npwpd)
    {
        $dataNPWPD  = $this->db->query("select count(skpd) as jumlah from skpd where npwpd='" . $npwpd . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();

        foreach ($dataNPWPD as $angka) :
            $datanpwpd1 = $angka->jumlah;
        endforeach;

        if ($datanpwpd1 != "0") {
            $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Hapus Data Gagal, Karena Surat Ketetapan SKPD Telah Dibuat!!!');
            redirect('admin/daftarp');
        } else {
            $where = array('npwprd' => $npwpd);
            $this->simprmodel->deleteData('wpr', $where);

            /* $where = array('npwpd' => $npwpd, 'tahun' => $this->session->userdata('tahun')) ;
                $this->simprmodel->deleteData('skpd', $where); */
            $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
            redirect('admin/daftarp');
        }
    }

    public function addDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $npwpd       = $this->input->post('npwpd');
            $nama        = $this->input->post('nama');
            $alamat      = $this->input->post('alamat');
            $telp        = $this->input->post('telp');
            $namausaha   = $this->input->post('namausaha');
            $jenisusaha  = $this->input->post('jenis');
            $alamatusaha = $this->input->post('alamatusaha');
            $desa        = $this->input->post('desa');
            $kecamatan   = $this->input->post('kecamatan');
            $situ        = $this->input->post('situ');
            $tanggal     = $this->input->post('tanggal');
            $status      = $this->input->post('status');
            $jenis       = 'p';

            if ($status == "on") {
                $status = 1;
            } else {
                $status = 0;
            }

            $data = array(
                'npwprd'        => $npwpd,
                'namapemilik'   => $nama,
                'alamatpemilik' => $alamat,
                'telepon'       => $telp,
                'namausaha'     => $namausaha,
                'jenisusaha'    => $jenisusaha,
                'alamatusaha'   => $alamatusaha,
                'desa'          => $desa,
                'kecamatan'     => $kecamatan,
                'situ'          => $situ,
                'tanggal'       => $tanggal,
                'status'        => $status,
                'jenis'         => $jenis
            );

            $query = $this->db->get_where('wpr', array('npwprd' => $npwpd));
            $count = $query->num_rows();

            if ($count) {
                $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Simpan Data Gagal, Nomor Pernah Digunakan!!!');
                $this->addData();
            } else {
                $this->simprmodel->insertData($data, 'wpr');

                /* $data1 = array(
                        'tahun'     => $this->session->userdata('tahun'),
                        'npwpd'     => $npwpd
                    );

                    $this->simprmodel->insertData($data1,'skpd'); */
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/daftarp');
            }
        }
    }

    public function editDataAct()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->editData($this->input->post('npwpd'));
        } else {
            $npwpd       = $this->input->post('npwpd');
            $nama        = $this->input->post('nama');
            $alamat      = $this->input->post('alamat');
            $telp        = $this->input->post('telp');
            $namausaha   = $this->input->post('namausaha');
            $jenisusaha  = $this->input->post('jenis');
            $alamatusaha = $this->input->post('alamatusaha');
            $desa        = $this->input->post('desa');
            $kecamatan   = $this->input->post('kecamatan');
            $situ        = $this->input->post('situ');
            $tanggal     = $this->input->post('tanggal');
            $status      = $this->input->post('status');
            $jenis       = 'p';

            if ($status == "on") {
                $status = 1;
            } else {
                $status = 0;
            }

            $data = array(
                'npwprd'        => $npwpd,
                'namapemilik'   => $nama,
                'alamatpemilik' => $alamat,
                'telepon'       => $telp,
                'namausaha'     => $namausaha,
                'jenisusaha'    => $jenisusaha,
                'alamatusaha'   => $alamatusaha,
                'desa'          => $desa,
                'kecamatan'     => $kecamatan,
                'situ'          => $situ,
                'tanggal'       => $tanggal,
                'status'        => $status,
                'jenis'         => $jenis
            );

            $where = array(
                'npwprd' => $npwpd
            );
            $this->simprmodel->updateData('wpr', $data, $where);
            $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiUpdate');
            redirect('admin/daftarp');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('npwpd', 'NPWPD', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pemilik', 'required');
        $this->form_validation->set_rules('namausaha', 'Nama/Merk Usaha', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Usaha', 'required');
        $this->form_validation->set_rules('alamatusaha', 'Alamat Tempat Usaha', 'required');
        $this->form_validation->set_rules('kecamatan', 'Lokasi Kecamatan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Pendaftaran', 'required');
    }

    public function printBlanko1()
    {
        echo "<script>window.open('https://google.com/', '_blank');</script>";
    }

    public function printBlanko()
    {
        $data['title']    = 'Formulir Pendaftaran Wajib Pajak';
        $data['jenis']    = 'PAJAK';
        $data['pemda']    = $this->db->query('select Nama_Pemda,ibu_kota from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/formdaftarpajak');
    }

    public function cetakSPTPD($nomor)
    {
        $data['title']    = 'Surat Pemberitahuan Pajak Daerah';
        $data['jenis']    = 'WAJIB PAJAK DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['wajibp']   = $this->db->query('select * from wpr where jenis="p" and npwprd="' . base64_decode($nomor) . '"')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/SPTPD');
    }

    public function printRegister()
    {
        $data['title']    = 'Register Wajib Pajak Daerah';
        $data['jenis']    = 'WAJIB PAJAK DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['wajibp']   = $this->db->query('select * from wpr where jenis="p"')->result();

        $this->load->view('template_admin/headerl', $data);
        $this->load->view('admin/report/registerwajibpr');
    }

    public function PDF()
    {
        $this->load->library('mypdf');

        $data['title']    = 'Register Wajib Pajak Daerah';
        $data['jenis']    = 'WAJIB PAJAK DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['wajibp']   = $this->db->query('select * from wpr where jenis="p"')->result();

        $this->mypdf->generate('admin/report/registerwajibprpdf', $data, 'registerNPWPD', 'A4', 'landscape');
    }

    /*  public function EXCEL(){
            $data['title']    = 'Register Wajib Pajak Daerah';
            $data['jenis']    = 'WAJIB PAJAK DAERAH';
            $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
            $data['wajibp']   = $this->db->query('select * from wpr where jenis="p"')->result();

            require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
            require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objext = new PHPExcel();

            $object->getProperties()->setCreator("Antonius Vicky Prayoga, S.T., M.AK.");
            $object->getProperties()->setLastModifiedBy("Antonius Vicky Prayoga, S.T., M.AK.");
            $object->getProperties()->setTitle("Register Wajib Pajak");

            $object->setActiveSheetIndex(0);
            $object->getActiveSheet()->setCellValue('A1','NPWPD');
            $object->getActiveSheet()->setCellValue('B1','Nama Pemilik');
            $object->getActiveSheet()->setCellValue('C1','Nama/Merk Usaha');
            $object->getActiveSheet()->setCellValue('D1','Jenis Usaha');
            $object->getActiveSheet()->setCellValue('E1','Lokasi Usaha');
            $object->getActiveSheet()->setCellValue('F1','No. Surat Izin');
            $object->getActiveSheet()->setCellValue('G1','Status');

            $baris = 2;
            $no    = 1;

            foreach($data['wajibp'] as $wp){
                $object->getActiveSheet()->setCellValue('A'.$baris, $wp->npwprd);
                $object->getActiveSheet()->setCellValue('B'.$baris, $wp->namapemilik);
                $object->getActiveSheet()->setCellValue('C'.$baris, $wp->namausaha);
                $object->getActiveSheet()->setCellValue('D'.$baris, $wp->jenisusaha);
                $object->getActiveSheet()->setCellValue('E'.$baris, $wp->alamatusaha);
                $object->getActiveSheet()->setCellValue('F'.$baris, $wp->situ);
                $object->getActiveSheet()->setCellValue('G'.$baris, $wp->status);

                $baris++;
            }
            
            $filename = "Register Wajib Pajak".'xlsx';
            $object->getActiveSheet()->setTitle("Data Wajib Pajak");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createwriter($object,'Excel2007');
            $writer->save('php://output');
            exit;
        }
 */
    /* public function generateXls() {
            // create file name
            $fileName = 'data-'.time().'.xlsx';  
            // load excel library
            $this->load->library('excel');
            $listInfo = $this->export->exportList();
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            // set Header
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
            // set Row
            $rowCount = 2;
            foreach ($listInfo as $list) {
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->first_name);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->last_name);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->email);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dob);
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->contact_no);
                $rowCount++;
            }
            $filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
            $objWriter->save('php://output'); 
     
        } */
}
