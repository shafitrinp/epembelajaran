<?php
class M_siswa extends CI_Model
{
    public function getnamasiswa()
    {
        $namasiswa = $this->db->get('siswa');
        return $namasiswa;
    }


    function get_biodata($no_identitas)
    {
        $query = $this->db->query("SELECT * FROM siswa where id_siswa='$no_identitas'");
        return $query;
    }
    function jumlahSiswa()
    {
        return $this->db->count_all('siswa');
    }

    function tugassiswa($kelas)
    {
        $this->db->select('*');
        $this->db->where('id_kelas', $kelas);
        $this->db->from('judul_tugas');

        $query = $this->db->get();
        return $query;
    }
}
