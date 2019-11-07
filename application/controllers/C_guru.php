<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_guru');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
    }
    public function topbarGuru()
    {
        $data['guru'] = $this->M_guru->getnamaguru($this->session->userdata('id_guru'))->row_array();
        $this->load->view('templates/guru_topbar', $data);
    }
    public function index()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $data['datauser'] = $this->set_datauser();
        $data["jmltessay"] = $this->M_guru->jml_tessay();
        $data["jmltpil"] = $this->M_guru->jml_tpil();
        $data["jmlkessay"] = $this->M_guru->jml_kessay();
        $data["jmlkpil"] = $this->M_guru->jml_kpil();
        $this->load->view('view_guru/V_dashguru', $data);
        $this->load->view('templates/user_footer');
    }
    //ubah password
    function do_ubahpass()
    {

        $user = $this->M_guru->get_user($this->session->userdata('id_guru'));         //mendapatkan data user dalam row
        $passasli = $user->password;                    // mendapatkan password user
        $passlama = $this->input->post('passlama');    // mendapatkan pasword lama dari form sebelumnya
        $passlama = hash('sha256', sha1($passlama));    // melakukan hashing
        $passbaru1 = $this->input->post('passbaru1'); // mendapatkan password baru1 dari form
        $passbaru1 = hash('sha256', sha1($passbaru1)); // melakukan hashing
        $passbaru2 = $this->input->post('passbaru2'); // mendapatkan password baru2 dari form
        $passbaru2 = hash('sha256', sha1($passbaru2)); // melakukan hashing

        if ($passasli == $passlama && $passbaru1 == $passbaru2) {
            $this->M_guru->change_password($passbaru1);
            $this->session->set_flashdata('ubahpass', '<br><div style="max-width:50%; text-align:center; margin-left:auto; margin-right:auto;"><font><h5 style="color:green;">Ubah Password Berhasil!!!</h5></div>');
            redirect('C_guru/password');
        } else {
            $this->session->set_flashdata('ubahpass', '<br><div style="max-width:50%; text-align:center; margin-left:auto; margin-right:auto;"><font><h5 style="color:red;">Ubah Password Gagal!!!</h5></div>');
            redirect('C_guru/password');
        }
    }
    function password()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $data['datauser'] = $this->set_datauser();
        $this->load->view('view_guru/V_ubahpass.php', $data);
        $this->load->view('templates/user_footer');
    }

    //profil
    function biodata()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $id = $this->session->userdata('id_guru');
        $data['biodata'] = $this->M_guru->get_biodata($id);
        // $data['datauser'] = $this->set_datauser();
        // $data = array(
        //     'id_guru' => $this->input->post('id_guru'),
        //     'nama' => $this->input->post('nama'),
        //     'email' => $this->input->post('email')
        // );
        $this->load->view('view_guru/V_profil', $data);
        $this->load->view('templates/user_footer');
    }

    function set_datauser()
    {
        $user = $this->M_guru->get_user($this->session->userdata('nama'));
        $data['datauser'] = $this->M_guru->get_data($this->session->userdata('nama')); //set data user
        return $data;
    }

    //menampilkan form buat tugas uraian
    public function form_tessay()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $idjudultugas = $this->input->post('id_jTugas');
        $data['data_tEssay'] = $this->M_guru->get_tessay()->result();
        // $data['data_tEssay'] = $this->M_guru->getTugas()->result();
        $data['judul_tugas'] = $this->M_guru->get_judultugas($idjudultugas)->result();
        // $data['upload_data'] = $this->M_guru->
        // $this->image = $this->uploadtgas();
        $this->load->view('view_guru/V_formturaian', $data);
        $this->load->view('templates/user_footer');
    }

    //input data soal tugas uraiana
    public function add_tessay()
    {
        $this->load->library('form_validation');

        $topik = $this->input->post('id_jTugas');
        $id_tEssay = $this->input->post('id_tEssay');
        $soal = $this->input->post('pertanyaan');
        // $gambar = $this->input->post('image');


        $id_tEssay = $this->db->get_where('tessay', ['id_tEssay' => $id_tEssay])->row_array();
        $this->load->model('m_guru');



        $this->form_validation->set_rules(
            'id_jTugas',
            'Pilih Topik',
            'trim|required',
            ['required' => 'Harus di isi']
        );

        $this->form_validation->set_rules(
            'pertanyaan',
            'Soal',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        if ($topik == '' || $soal == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Field Kosong</div>');
            redirect('C_guru/form_tessay');
        } else {


            $data = array(
                'id_jTugas' => $topik,
                // 'id_tEssay' => $id_tEssay,
                // 'image' => $gambar,
                'pertanyaan' => $soal,

            );
            $berhasil = $this->M_guru->simpan_tessay('tessay', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tersimpan</div>');
            redirect('C_guru/form_tessay');
        }
    }
    // public function uploadtgs()
    // {
    //     if (!empty($_FILES['image']['name'])) {


    // if (!$this->upload->do_upload('image')) {
    //     $error = array('error' => $this->upload->display_errors());
    //     $this->load->view('view_guru/V_formturaian', $error);
    // } else {
    //     $data = array('upload_data' => $this->upload->data());
    //     $this->load->view('view_guru/V_formturaian', $data);
    // }


    //     }
    // }
    // public function simpan()
    // {

    //     $post = $this->input->post();
    //     // $this->id_tEssay = uniqid();
    //     $this->pertanyaan = $post["editor"];
    //     $this->image = $this->uploadtgs();
    //     $this->id_jTugas = $post["id_jTugas"];
    //     $this->db->insert('tessay', $this);
    // }

    //menampilkan soal per topik
    public function show_soal()
    {
        $idjudul = $this->input->get("id_jTugas");
        $soal_per_topik = $this->M_guru->show_soal_by_topik($idjudul);
        return $this->output->set_content_type('application/json')->set_output(json_encode($soal_per_topik));
    }




    // public function tampil_detailsoal()
    // {
    //     $this->load->view('templates/guru_sidebar');
    //     $this->topbarGuru();
    //     // $data['detailsoal'] = $this->M_guru->get_judultugas()->result();
    //     $data['data_tEssay'] = $this->M_guru->get_tessay()->result();
    //     $this->load->view('view_guru/V_detailsoal', $data);
    //     $this->load->view('templates/user_footer');
    // }

    // public function tampil_soaluraian()
    // {
    //     $this->load->view('templates/guru_sidebar');
    //     $this->topbarGuru();
    //     $this->load->view('view_guru/V_soaluraian');
    //     $this->load->view('templates/user_footer');
    // }


    // public function tampil_soalpilihan()
    // {
    //     $this->load->view('templates/guru_sidebar');
    //     $this->topbarGuru();
    //     $this->load->view('view_guru/V_soalpilihan');
    //     $this->load->view('templates/user_footer');
    // }

    //menampilkan form input soal tugas pilihan
    public function form_tpilihan()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        // $idjudultugas = $this->input->post('id_jTugas');
        $data['data_tEssay'] = $this->M_guru->get_tessay()->result();
        // $data['data_tEssay'] = $this->M_guru->getTugas()->result();
        $data['judul_tugas'] = $this->M_guru->get_judultugas()->result();
        $this->load->view('view_guru/V_formtpilihan', $data);
        $this->load->view('templates/user_footer');
    }

    //input data soal tugas pilihan
    public function add_tPilihan()
    {
        $id_tpilihan = $this->input->post('id_tpilihan');
        $id_judul = $this->input->post('id_jTugas');
        $soal = $this->input->post('pertanyaan');
        $a = $this->input->post('pilihan_a');
        $b = $this->input->post('pilihan_b');
        $c = $this->input->post('pilihan_c');
        $d = $this->input->post('pilihan_d');
        $gambar = $this->input->post('image');
        $kunci = $this->input->post('kunci_jawaban');

        $kode_tpilihan = $this->db->get_where('tpilihan', ['id_tpilihan' => $id_tpilihan])->row_array();
        $this->load->model('m_guru');

        $data = array(
            // 'id_tpilihan' => $id_tpilihan,
            'id_jTugas' => $id_judul,
            'pertanyaan' => $soal,
            'pilihan_a' => $a,
            'pilihan_b' => $b,
            'pilihan_c' => $c,
            'pilihan_d' => $d,
            'image' => $gambar,
            'kunci_jawaban' => $kunci,
        );


        $this->form_validation->set_rules(
            'id_jTugas',
            'Pilih Topik',
            'trim|required',
            ['required' => 'Harus di isi']
        );

        $this->form_validation->set_rules(
            'pertanyaan',
            'Soal',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_a',
            'Jawaban A',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_b',
            'Jawaban B',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_c',
            'Jawaban C',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_d',
            'Jawaban D',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'kunci_jawaban',
            'Kunci Jawaban',
            'trim|required',
            ['required' => 'Harus di isi']
        );

        if ($id_judul == '' || $image = '' || $soal == '' || $a = '' || $b = '' || $c = '' || $d = '' || $kunci = '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Field Kosong</div>');
            redirect('C_guru/form_tpilihan');
        } else {
            // $jml_data = count($_POST[nis]);
            // $jawaban = $_POST[jawaban];
            // for ($i=1; $i <= $jml_data; $i++){

            // mysql_query("INSERT INTO absensi VALUES ('".$jawaban[$i]."',  '".date('Y-m-d H:i:s')."')");


            $berhasil = $this->M_guru->simpan_tpilihan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tersimpan</div>');
            redirect('C_guru/form_pilihan');
        }
    }

    public function tampil_detailsoal()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $data['data_tugas'] = $this->M_guru->get_tessay()->result();
        $this->load->view('view_guru/V_soalpilihan', $data);
        $this->load->view('templates/user_footer');
    }

    //menampilkan form buat topik tugas
    public function tampil_jtugas()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $data['data_tEssay'] = $this->M_guru->getTugas()->result();
        $data['mapel'] = $this->M_guru->getMapel()->result();
        $data['kelas'] = $this->M_guru->getKelas()->result();
        $this->load->view('view_guru/V_jtugas', $data);
        $this->load->view('templates/user_footer');
    }

    //input data buat topik tugas
    public function jtugas()
    {
        $id_jTugas = $this->input->post('id_jTugas');
        $id_mapel = $this->input->post('id_mapel');
        $judul = $this->input->post('judul');
        $id_kelas = $this->input->post('id_kelas');

        $id_jTugas = $this->db->get_where('judul_tugas', ['id_jTugas' => $id_jTugas])->row_array();
        $this->load->model('M_guru');


        // $data = array(

        //     'id_mapel' => $id_mapel,
        //     'judul' => $judul,
        //     'id_kelas' => $id_kelas,
        // );
        $this->form_validation->set_rules(
            'judul',
            'Judul',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'id_kelas',
            'Kelas',
            'trim|required',
            ['required' => 'Harus di isi']

        );
        $this->form_validation->set_rules(
            'id_mapel',
            'Mata Pelajaran',
            'trim|required',
            ['required' => 'Harus di isi']

        );
        if ($judul == '' || $id_mapel == '' || $id_kelas == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Field Kosong</div>');
            redirect('C_guru/tampil_jtugas');
        } else {
            $berhasil = $this->M_guru->set_jtugas($judul, $id_kelas, $id_mapel);
            $this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Data Tersimpan</div>');
            redirect('C_guru/tampil_jtugas');
        }
    }

    //menampilkan form buat kuis uraian
    public function tampil_formKU()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $data['data_kessay'] = $this->M_guru->get_kessay()->result();

        $data['judul_kuis'] = $this->M_guru->get_jkuis()->result();
        $this->load->view('view_guru/V_formkuisuraian', $data);
        $this->load->view('templates/user_footer');
    }

    //input data soal kuis uraian
    public function add_kessay()
    {
        $this->load->library('form_validation');

        $id_jTugas = $this->input->post('id_jTugas');
        $id_kEssay = $this->input->post('id_kEssay');
        $pertanyaan = $this->input->post('editor');
        $gambar = $this->input->post('image');
        $waktu = $this->input->post('time');


        $id_kEssay = $this->db->get_where('kessay', ['id_kEssay' => $id_kEssay])->row_array();
        $this->load->model('m_guru');

        $data = array(
            'id_jTugas' => $id_jTugas,
            // 'id_tEssay' => $id_tEssay,
            'image' => $gambar,
            'editor' => $pertanyaan,
            'time' => $waktu

        );

        $this->form_validation->set_rules(
            'id_jTugas',
            'Pilih Topik',
            'trim|required',
            ['required' => 'Harus di isi']
        );

        $this->form_validation->set_rules(
            'editor',
            'Soal',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        if ($id_jTugas == '' || $pertanyaan == '' || $gambar = '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Field Kosong</div>');
            redirect('C_guru/form_tessay');
        } else {
            $post = $this->input->post();
            // $this->id_tEssay = uniqid();
            $data = $this->id_jTugas = $post["id_jTugas"];
            $data = $this->pertanyaan = $post["editor"];
            $data = $this->image = $this->uploadtgs();

            $berhasil = $this->M_guru->simpan('kessay', $data);
            // $this->db->insert('tessay', $this);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tersimpan</div>');
            redirect('C_guru/form_tessay');
            // }
        }
    }

    public function uploadkuis()
    {
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './assets/uploads/soal';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = 3000;
            // $config['overwrite'] = true;
            $config['file_name'] = $_FILES['image']['name'];
            // $config['file_name'] = strtolower($_FILES[$field_name]['image']);

            $this->load->library('upload', $config);

            // if (!$this->upload->do_upload('image')) {
            //     $error = array('error' => $this->upload->display_errors());
            //     $this->load->view('view_guru/V_formturaian', $error);
            // } else {
            //     $data = array('upload_data' => $this->upload->data());
            //     $this->load->view('view_guru/V_formturaian', $data);
            // }

            if ($this->upload->do_upload('image')) {
                return $config['file_name'];
            }
            return "tidak ada gambar";
        }
    }


    //menampilkan form soal kuis uraian
    public function tampil_kPilihan()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $data['data_kPilihan'] = $this->M_guru->getKuis()->result();
        $data['mapel'] = $this->M_guru->getMapel()->result();
        $this->load->view('view_guru/V_formkuispilihan', $data);
        $this->load->view('templates/user_footer');
    }

    //input soal kuis pilihan
    public function add_kpilihan()
    {
        $id_tpilihan = $this->input->post('id_tpilihan');
        $id_judul = $this->input->post('id_jTugas');
        $soal = $this->input->post('pertanyaan');
        $a = $this->input->post('pilihan_a');
        $b = $this->input->post('pilihan_b');
        $c = $this->input->post('pilihan_c');
        $d = $this->input->post('pilihan_d');
        $gambar = $this->input->post('image');
        $kunci = $this->input->post('kunci_jawaban');

        $kode_tpilihan = $this->db->get_where('tpilihan', ['id_tpilihan' => $id_tpilihan])->row_array();
        $this->load->model('m_guru');

        $data = array(
            // 'id_tpilihan' => $id_tpilihan,
            'id_jTugas' => $id_judul,
            'pertanyaan' => $soal,
            'pilihan_a' => $a,
            'pilihan_b' => $b,
            'pilihan_c' => $c,
            'pilihan_d' => $d,
            'image' => $gambar,
            'kunci_jawaban' => $kunci,
        );


        $this->form_validation->set_rules(
            'id_jTugas',
            'Pilih Topik',
            'trim|required',
            ['required' => 'Harus di isi']
        );

        $this->form_validation->set_rules(
            'pertanyaan',
            'Soal',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_a',
            'Jawaban A',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_b',
            'Jawaban B',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_c',
            'Jawaban C',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'pilihan_d',
            'Jawaban D',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'kunci_jawaban',
            'Kunci Jawaban',
            'trim|required',
            ['required' => 'Harus di isi']
        );

        if ($id_judul == '' || $image = '' || $soal == '' || $a = '' || $b = '' || $c = '' || $d = '' || $kunci = '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Field Kosong</div>');
            redirect('C_guru/form_tpilihan');
        } else {
            // $jml_data = count($_POST[nis]);
            // $jawaban = $_POST[jawaban];
            // for ($i=1; $i <= $jml_data; $i++){

            // mysql_query("INSERT INTO absensi VALUES ('".$jawaban[$i]."',  '".date('Y-m-d H:i:s')."')");


            $berhasil = $this->M_guru->simpan_tpilihan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tersimpan</div>');
            redirect('C_guru/form_pilihan');
        }
    }


    public function jkpilihan()
    {
        $id_kpilihan = $this->input->post('id_pilihan');
        $id_mapel = $this->input->post('id_mapel');
        $judul = $this->input->post('judul');
        $id_kelas = $this->input->post('id_kelas');

        $id_judul = $this->db->get_where('judul_kuis', ['id_jKuis' => $id_kpilihan])->row_array();
        $this->load->model('m_guru');

        $data = array(
            'id_kpilihan' => $id_kpilihan,
            'id_mapel' => $id_mapel,
            'judul' => $judul,
            'id_kelas' => $id_kelas,
        );
        $error = "";

        $berhasil = $this->M_guru->set_jkuis($data, 'judul_kuis');
        redirect('C_guru/tampil_kPilihan');
    }

    //edit topik tugas
    public function edit_jtugas()
    {
        $id = $this->input->post('id_jTugas');

        $data = array(

            'judul' => $this->input->post('judul'),
            'id_kelas' => $this->input->post('id_kelas'),
            'id_mapel' => $this->input->post('id_mapel')
        );
        // echo $id;
        // echo "<br>";
        // print_r($data);
        // die;


        $this->M_guru->editJudultgs($id, $data);
        // // $this->session->set_userdata('id_jTugas', $this->input->post('id_jTugas'));
        redirect('C_guru/tampil_jtugas');
    }

    //hapus topik tugas
    public function hapus_jtugas()
    {
        $id = $this->input->post('id_jTugas');

        $data = array(
            'id_jTugas' => $id,
        );

        $this->M_guru->hapustugas($data);
        redirect('C_guru/tampil_jtugas');
    }

    //edit topik kuis
    // public function edit_kjudul()
    // {
    //     $id = $this->input->post('id_jKuis');

    //     $data = array(

    //         'judul' => $this->input->post('judul'),
    //         'id_kelas' => $this->input->post('id_kelas'),
    //         'id_mapel' => $this->input->post('id_mapel')
    //     );
    // echo $id;
    // echo "<br>";
    // print_r($data);
    // die;


    // $this->M_guru->edit_kjudul($id, $data);
    // // $this->session->set_userdata('id_jTugas', $this->input->post('id_jTugas'));
    //     redirect('C_guru/tampil_jkuis');
    // }

    //hapus topik kuis
    // public function del_kuis()
    // {
    //     $id = $this->input->post('id_jKuis');

    //     $data = array(
    //         'id_jKuis' => $id,
    //     );

    //     $this->M_guru->hapusKuis($data);
    //     redirect('C_guru/tampil_jkuis');
    // }

    //menampilkan form topik kuis
    // public function tampil_jkuis()
    // {
    //     $this->load->view('templates/guru_sidebar');
    //     $this->topbarGuru();
    //     $data['data_jkuis'] = $this->M_guru->getKuis()->result();
    //     $data['mapel'] = $this->M_guru->getMapel()->result();
    //     $data['kelas'] = $this->M_guru->getKelas()->result();
    //     $this->load->view('view_guru/V_jkuis', $data);
    //     $this->load->view('templates/user_footer');
    // }

    // //input data topik kuis
    // public function jkuis()
    // {
    //     $id_jKuis = $this->input->post('id_jKuis');
    //     $id_mapel = $this->input->post('id_mapel');
    //     $judul = $this->input->post('judul');
    //     $id_kelas = $this->input->post('id_kelas');

    //     $id_jKuis = $this->db->get_where('judul_kuis', ['id_jKuis' => $id_jKuis])->row_array();
    //     $this->load->model('M_guru');

    //     $this->form_validation->set_rules(
    //         'judul',
    //         'Judul',
    //         'trim|required',
    //         ['required' => 'Harus di isi']
    //     );
    //     $this->form_validation->set_rules(
    //         'id_kelas',
    //         'Kelas',
    //         'trim|required',
    //         ['required' => 'Harus di isi']

    //     );
    //     $this->form_validation->set_rules(
    //         'id_mapel',
    //         'Mata Pelajaran',
    //         'trim|required',
    //         ['required' => 'Harus di isi']

    //     );
    //     if ($judul == '' || $id_mapel == '' || $id_kelas == '') {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Field Kosong</div>');
    //         redirect('C_guru/tampil_jkuis');
    //     } else {
    //         $berhasil = $this->M_guru->set_jkuis($judul, $id_kelas, $id_mapel);
    //         $this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Data Tersimpan</div>');
    //         redirect('C_guru/tampil_jkuis');
    //     }
    // }

    //menampilkan form cek plagiasi
    public function tampil_formplagiasi()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $data['judul_tugas'] = $this->M_guru->get_judultugas()->result();
        $this->load->view('view_guru/V_plagiasi', $data);
        $this->load->view('templates/user_footer');
    }

    //input data plagiasi
    public function plagiasi()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();
        $topik = $this->input->post('id_jTugas');
        $siswa = $this->input->post('id_siswa');
        $jawaban = $this->input->post('jawaban');

        $data['hasil'] = $this->M_guru->cekplagiat($topik, $siswa, $jawaban);
        $data['judul_tugas'] = $this->M_guru->get_judultugas()->result();
        $data['siswa'] = $this->M_guru->getsiswa()->result();
        $this->load->view('view_guru/V_hasilplagiasi', $data);
        $this->load->view('templates/user_footer');
    }

    public function tampil_rapor()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();

        $this->load->view('view_guru/V_rapor');
        $this->load->view('templates/user_footer');
    }

    //countdown
    public function tampilwaktu()
    {
        $this->load->view('templates/guru_sidebar');
        $this->topbarGuru();

        $this->load->view('view_guru/V_countdown');
        $this->load->view('templates/user_footer');
    }

    public function countdown()
    {
        $tanggal_start = $this->input->post('start');
        $waktu_start = $this->input->post('waktu_start');
        $s = strtotime("$waktu_start $tanggal_start");
        $start = array('waktu' => date('Y:m:d H:i:s', $s));
        $result = $this->mcountdown->time($start);
        if ($result == true) {
            redirect(site_url('countdown/lihat_countdown'));
        } else {
            redirect(site_url());
        }
    }

    public function lihat_countdown()
    {
        $result['timer'] = $this->mcountdown->select_time();
        $this->load->view('v_timer', $result);
    }

    //coba soal
}
