<?php
include_once('assets/vendor/autoloader.php');

use \NlpTools\Tokenizers\WhitespaceTokenizer;
use \NlpTools\Similarity\JaccardIndex;
use \NlpTools\Similarity\CosineSimilarity;
use \NlpTools\Similarity\Simhash;

class M_guru extends CI_Model
{


    public function getnamaguru()
    {
        $namaguru = $this->db->get('guru');
        return $namaguru;
    }

    function getsiswa()
    {
        $query = $this->db->query("SELECT * FROM siswa");
        return $query;
    }

    // jumlah guru
    function jumlahGuru()
    {
        return $this->db->count_all('guru');
    }

    //jumlah tugas uraian
    function jml_tessay()
    {
        return $this->db->count_all('tessay');
    }

    //jumlah tugas pilihan
    function jml_tpil()
    {
        return $this->db->count_all('tpilihan');
    }

    // jumlah kuis uraian
    function jml_kessay()
    {
        return $this->db->count_all('kessay');
    }

    // jumlah 
    function jml_kpil()
    {
        return $this->db->count_all('kpilihan');
    }

    //memanggil data mapel
    function getMapel()
    {
        $query = $this->db->query("SELECT * FROM mapel");
        return $query;
    }

    //memanggil data kelas
    function getKelas()
    {
        $query = $this->db->query("SELECT * FROM kelas");
        return $query;
    }

    //memanggil data topik tugas 
    function getTugas()
    {

        $this->db->select('*');
        $this->db->from('judul_tugas');
        $this->db->join('mapel', 'mapel.id_mapel=judul_tugas.id_mapel');
        $this->db->join('kelas', 'kelas.id_kelas=judul_tugas.id_kelas');
        // $this->db->where('kelas.id_jTugas', $id_kelas);
        $query = $this->db->get();
        return $query;
        // if ($query->num_rows() != 0) {
        //     return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    //memanggil data tugas uraian
    function get_tessay()
    {
        $query = $this->db->query("SELECT * FROM tessay");
        return $query;
    }

    //join kuis
    // function getKuis()
    // {

    //     $this->db->select('*');
    //     $this->db->from('judul_kuis');
    //     $this->db->join('mapel', 'mapel.id_mapel=judul_kuis.id_mapel');
    //     $this->db->join('kelas', 'kelas.id_kelas=judul_kuis.id_kelas');
    //     // $this->db->where('kelas.id_jTugas', $id_kelas);
    //     $query = $this->db->get();
    //     return $query;
    // }


    function show_soal_by_topik($id_judul = "")
    {
        $this->db->select("*");
        $this->db->from("tessay");
        if ($id_judul) $this->db->where("id_jTugas", $id_judul);
        $this->db->get()->result_array();
    }

    //join topik tugas
    function gettopik()
    {
        $this->db->select('*');
        $this->db->from('tessay');
        $this->db->join('judul_tugas', 'judul_tugas.id_jTugas=tessay.id_jTugas');
        // $this->db->where('kelas.id_jTugas', $id_kelas);
        $query = $this->db->get();
        return $query;
    }

    //memanggil data topik tugas
    function get_judultugas()
    {
        $query = $this->db->query("SELECT * FROM judul_tugas");
        return $query;
    }

    //memanggil data guru
    function get_biodata($id_guru)
    {
        $query = $this->db->get_where('guru', array('id_guru' => $id_guru));
        $query = $query->result_array();
        return $query;
        //     $this->db->select('*');
        //     $this->db->from('guru');
        //     $this->db->where('id_guru', $id_guru);
        //     return $this->db->get()->result();
    }


    //ubah password
    function change_password($password)
    {
        $this->db->set('password', $password);
        $this->db->where('id_guru', $this->session->userdata('id_guru'));
        $this->db->update('guru');
    }

    function get_user($id_guru)
    {
        $this->db->where('id_guru', $id_guru);
        return $this->db->get('guru')->row();
    }
    function get_data($id_guru)
    {
        $this->db->from('guru');
        $this->db->where('guru.id_guru', $id_guru);
        return $this->db->get()->result_array();
    }

    //insert data topik tugas
    function set_jtugas($judul, $id_kelas, $id_mapel)
    {
        $hasil = $this->db->query("INSERT INTO judul_tugas (judul, id_kelas, id_mapel) VALUES ('$judul', '$id_kelas', '$id_mapel')");
        return $hasil;
    }

    // //insert data topik kuis
    // function set_jkuis($judul, $id_kelas, $id_mapel)
    // {
    //     $hasil = $this->db->query("INSERT INTO judul_kuis (judul, id_kelas, id_mapel) VALUES ('$judul', '$id_kelas', '$id_mapel')");
    //     return $hasil;
    // }
    // function set_tEssay($data, $table)
    // {
    //     $query = $this->db->insert($data, $table);
    //     return $query;
    // }
    // function get_judul()
    // {
    //     $query = $this->db->query("SELECT * FROM tessay JOIN judul_tugas ON judul_tugas.id_jTugas = tessay.id_jTugas");
    //     return $query;
    // }

    //insert data tugas uraian
    function simpan_tessay($table, $data)
    {
        $hasil = $this->db->insert($table, $data);
        return $hasil;
    }

    //insert data tugas pilihan
    function set_tpilihan($data, $table)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    //edit topik tugas
    public function editJudultgs($id, $data)
    {
        $query = $this->db->where('id_jTugas', $id);
        $query = $this->db->update('judul_tugas', $data);
        $query = $this->db->affected_rows();
        return $query;
    }

    //hapus topik tugas
    public function hapustugas($id)
    {
        $query = $this->db->delete("judul_tugas", $id);
        return $query;
    }

    //edit topik kuis
    // public function edit_kjudul($id, $data)
    // {
    //     $query = $this->db->where('id_jKuis', $id);
    //     $query = $this->db->update('judul_kuis', $data);
    //     $query = $this->db->affected_rows();
    //     return $query;
    // }

    //hapus topik kuis
    // public function hapusKuis($id)
    // {
    //     $query = $this->db->delete("judul_kuis", $id);
    //     return $query;
    // }
    // public function getnamatugas($idjudultugas)
    // {
    //     $query = $this->db->query("SELECT * FROM judul_tugas WHERE id_jtugas = '$idjudultugas'");
    //     return $query;
    // }

    //memangil data kuis uraian
    function get_kessay()
    {
        $query = $this->db->query("SELECT * FROM kessay");
        return $query;
    }

    //memanggil data topik kuis
    // function get_jkuis()
    // {
    //     $query = $this->db->query("SELECT * FROM judul_kuis");
    //     return $query;
    // }

    //join rapor
    function get_rapor()
    {
        $this->db->select('*');
        $this->db->from('rapor');
        $this->db->join('mapel', 'mapel.id_mapel=judul_kuis.id_mapel');
        $this->db->join('kelas', 'kelas.id_kelas=judul_kuis.id_kelas');
        // $this->db->where('kelas.id_jTugas', $id_kelas);
        $query = $this->db->get();
        return $query;
    }

    //memanggil data jawaban tugas
    function get_datajawaban()
    {
        $query = $this->db->query("SELECT * FROM jawaban_tessay");
        return $query;
    }

    //cek plagiasi
    function cekplagiat($topik, $jawaban)
    {
        $p1 = $jawaban;
        //memanggil jawaban
        $p2 = $this->get_jawaban_by_topik($topik)->result();
        $tok = new WhitespaceTokenizer();
        $cos = new CosineSimilarity();

        $setA = $tok->tokenize($p1);
        foreach ($p2 as $loop) {
            $setB = $tok->tokenize($loop->jawaban);
            $hasil = $cos->similarity($setA, $setB);
            $data[] = array(
                'jawaban' => $loop->jawaban,
                'hasil' => $hasil
            );
        }
        return $data;
    }

    //memanggil jawaban berdasarkan topik
    function get_jawaban_by_topik($topik)
    {
        $this->db->select('*');
        $this->db->from('jawaban_tessay');
        $this->db->where('id_jTugas', $topik);
        $query = $this->db->get();
        return $query;
    }

    // function get_jawaban_by_siswa($siswa)
    // {
    //     $this->db->select('*');
    //     $this->db->from('jawaban_tessay');
    //     $this->db->where('id_siswa', $siswa);
    //     $query = $this->db->get();
    //     return $query;
    // }

    function waktu($start)
    {
        $this->db->insert('countdowntime', $start);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function select_time()
    {
        $this->db->select('*');
        $this->db->from('countdowntime');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    // private function uploadtpilihan()
    // {
    //     if (!empty($_FILES['tpilihan']['image'])) {
    //         $config['upload_path'] = './assets/uploads/soal';
    //         $config['allowed_types'] = 'jpg|png|jpeg';
    //         $config['max_size']    = 3000;
    //         $config['overwrite'] = true;
    //         $config['file_name'] = $this->id_tpilihan;
    //         // $config['file_name'] = strtolower($_FILES[$field_name]['image']);

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('tpilihan')) {
    //             return $this->upload->data("file_name");
    //         }
    //         return "tidak ada gambar";
    //     }
    // }
    // public function simpan_tpilihan()
    // {

    //     $post = $this->input->post();
    //     // $this->id_tEssay = $post['id_tEssay'];
    //     $this->pertanyaan = $post['pertanyaan'];
    //     $this->pilihan_a = $post['pilihan_a'];
    //     $this->pilihan_b = $post['pilihan_b'];
    //     $this->pilihan_c = $post['pilihan_c'];
    //     $this->pilihan_d = $post['pilihan_d'];
    //     $this->kunci_jawaban = $post['kunci_jawaban'];
    //     $this->image = $this->uploadtpilihan();
    //     $this->id_jTugas = $post['id_jTugas'];
    //     $this->db->insert('tpilihan', $this);
    // }

}
