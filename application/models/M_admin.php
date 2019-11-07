<?php
class M_admin extends CI_Model
{
    public function getnamaadmin()
    {
        $namaadmin = $this->db->get('admin');
        return $namaadmin;
    }
    public function ubahpassword($password_hash)
    {
        $this->db->set('password', $password_hash);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('admin');
    }
    function set_guru($data)
    {
        $query = $this->db->insert("guru", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    function set_siswa($data, $table)
    {
        $query = $this->db->insert($table, $data);
        return $query;
        // if ($query) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
    function getSiswa()
    {

        $query = $this->db->query("SELECT * FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas");
        return $query;
    }
    // function tambahkelas($data)
    // {
    //     $query = $this->db->insert("kelas", $data);
    //     if ($query) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // function set_biodata($data, $table)
    // {
    //     $query = $this->db->insert($table, $data);
    //     return $query;

    function getMapel()
    {
        $query = $this->db->query("SELECT * FROM mapel");
        return $query;
    }
    function getkelas()
    {
        $query = $this->db->query("SELECT * FROM kelas");
        return $query;
    }
    function set_kelas($id, $tingkat, $nama_kelas)
    {
        $hasil = $this->db->query("INSERT INTO kelas (id_kelas, tingkat, nama_kelas) VALUES ('$id', '$tingkat', '$nama_kelas')");
        return $hasil;
    }
    function set_mapel($data, $table)
    {
        $query = $this->db->insert($data, $table);
        return $query;
    }

    function jumlahKelas()
    {
        return $this->db->count_all('kelas');
    }
    function jumlahMapel()
    {
        return $this->db->count_all('mapel');
    }

    public function hapus_mapel($id)
    {
        //jadi ini database tolong hapus data yang ada di variabel $delete pada tabel "mapel"
        $query = $this->db->delete("mapel", $id);
        return $query;
    }

    public function updateMapel($id, $data)
    {

        $query = $this->db->where('id_mapel', $id);
        $query = $this->db->update('mapel', $data);
        $query = $this->db->affected_rows();
        return $query;
    }
    public function update_kelas($id, $data)
    {

        $query = $this->db->where('id_kelas', $id);  // ini query where sesuai ID relas yg mau diubah
        $query = $this->db->update('kelas', $data);  // ini nama mapel yang baru diubah
        $query = $this->db->affected_rows();
        return $query;
    }
    public function delete_kelas($delete)
    {
        //jadi ini database tolong hapus data yang ada di variabel $delete pada tabel "mapel"
        $query = $this->db->delete("kelas", $delete);
        return $query;
    }
}
