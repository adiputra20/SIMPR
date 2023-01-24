<?php
class Daftarr extends CI_Controller
{
    public function __construct()
    {
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

    public function index()
    {
        $data['title']   = 'Data Wajib Retribusi';
        $data['wp']      = $this->db->query("select npwprd,namapemilik,namausaha,alamatpemilik,status,jenisusaha FROM wpr WHERE jenis='r'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/daftarr', $data);
        $this->load->view('template_admin/footer');
    }

    public function addData()
    {
        $data['title']    = 'Tambah Data Wajib Retribusi';
        $data['pemda']    = $this->db->query('select Nama_Pemda from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tambahwr', $data);
        $this->load->view('template_admin/footer');
    }

    public function editData($npwpd)
    {
        $where = array('npwprd' => base64_decode($npwpd));
        $data['wp'] = $this->db->query("select * from wpr where npwprd='" . base64_decode($npwpd) . "'")->result();
        $data['pemda']   = $this->db->query('select Nama_Pemda from pemda')->result();
        $data['title'] = 'Edit Data Wajib Retribusi';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editwr', $data);
        $this->load->view('template_admin/footer');
    }

    public function deleteData($npwpd)
    {
        $dataNPWPD  = $this->db->query("select count(skrd) as jumlah from skrd where npwrd='" . $npwpd . "' and tahun='" . $this->session->userdata('tahun') . "'")->result();

        foreach ($dataNPWPD as $angka) :
            $datanpwpd1 = $angka->jumlah;
        endforeach;

        if ($datanpwpd1 != "0") {
            $this->simprmodel->set_notifikasi_swal('error', 'Oops...', 'Hapus Data Gagal, Karena Surat Ketetapan SKRD Telah Dibuat!!!');
            redirect('admin/daftarr');
        } else {

            $where = array('npwprd' => $npwpd);
            $this->simprmodel->deleteData('wpr', $where);

            /* $where = array('npwrd' => $npwpd, 'tahun' => $this->session->userdata('tahun')) ;
                $this->simprmodel->deleteData('skrd', $where); */
            $this->simprmodel->set_notifikasi_swal('info', 'DATA BERHASIL DIHAPUS', 'Data Tidak Dapat Dikembalikan');
            redirect('admin/daftarr');
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
            $jenis       = 'r';

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
                        'npwrd'     => $npwpd
                    );

                    $this->simprmodel->insertData($data1,'skrd'); */
                $this->simprmodel->set_notifikasi_swal('success', 'Yuhuu...', 'Data Berhasil DiSimpan');
                redirect('admin/daftarr');
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
            $jenis       = 'r';

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
            redirect('admin/daftarr');
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

    public function printBlanko()
    {
        $data['title']    = 'Formulir Pendaftaran Wajib Retrubusi';
        $data['jenis']    = 'RETRIBUSI';
        $data['pemda']    = $this->db->query('select Nama_Pemda,ibu_kota from pemda')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/formdaftarpajak');
    }

    public function printRegister()
    {
        $data['title']    = 'Register Wajib Retribusi Daerah';
        $data['jenis']    = 'WAJIB RETRIBUSI DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['wajibp']   = $this->db->query('select * from wpr where jenis="r"')->result();


        $this->load->view('template_admin/headerl', $data);
        $this->load->view('admin/report/registerwajibpr');
    }

    public function cetakSPTRD($nomor)
    {
        $data['title']    = 'Surat Pemberitahuan Retribusi Daerah';
        $data['jenis']    = 'WAJIB RETRIBUSI DAERAH';
        $data['pemda']    = $this->db->query('SELECT pemda.*, golr.pangkat FROM pemda INNER JOIN golr ON pemda.gol_kaban = golr.gorl')->result();
        $data['wajibp']   = $this->db->query('select * from wpr where jenis="r" and npwprd="' . base64_decode($nomor) . '"')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/report/SPTRD');
    }
}
