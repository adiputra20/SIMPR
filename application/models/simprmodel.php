<?php
class Simprmodel extends CI_model
{

    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function insertData($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function updateDataAll($table, $data)
    {
        $this->db->update($table, $data);
    }

    public function deleteData($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function set_notifikasi_swal($icon, $title, $text)
    {
        $this->session->set_flashdata('pesan', $icon);
        $this->session->set_flashdata('title', $title);
        $this->session->set_flashdata('text', $text);
    }

    public function cekLogin($nip, $password)
    {
        $pegawai = $this->db->where('nip', $nip)
            ->where('password', $password)
            ->limit(1)
            ->get('pegawai');

        if ($pegawai->num_rows() > 0) {
            return $pegawai->row();
        } else {
            return FALSE;
        }
    }

    public function getBulan($bulan)
    {
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
        }
        return $bulan;
    }

    public function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[intval($nilai)];
        } else if ($nilai < 20) {
            $temp = $this->penyebut(intval($nilai) - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut(intval($nilai) / 10) . " puluh" . $this->penyebut(intval($nilai) % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut(intval($nilai) - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut(intval($nilai) / 100) . " ratus" . $this->penyebut(intval($nilai) % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut(intval($nilai) - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut(intval($nilai) / 1000) . " ribu" . $this->penyebut(intval($nilai) % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut(intval($nilai) / 1000000) . " juta" . $this->penyebut(intval($nilai) % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut(intval($nilai) / 1000000000) . " milyar" . $this->penyebut(fmod(intval($nilai), 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut(intval($nilai) / 1000000000000) . " trilyun" . $this->penyebut(fmod(intval($nilai), 1000000000000));
        }
        return $temp;
    }

    public function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut(abs($nilai)));
        } else {
            $hasil = trim($this->penyebut(abs($nilai)));
        }
        return $hasil;
    }

    public  function diffInMonths(\DateTime $date1, \DateTime $date2)
    {
        $diff =  $date1->diff($date2);
        $months = $diff->y * 12 + $diff->m + $diff->d / 30;

        return (int) round($months);
    }
}
