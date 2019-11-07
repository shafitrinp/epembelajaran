<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_siswa');
        $this->load->model('M_guru');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
    }
    public function topbarAdmin()
    {
        $data['admin'] = $this->M_admin->getnamaadmin($this->session->userdata('username'))->row_array();
        $this->load->view('templates/admin_topbar', $data);
    }
    public function index()
    {
        // $this->load->view('templates/head');


        $this->load->view('templates/admin_sidebar');
        $this->topbarAdmin();
        $data["jmlSiswa"] = $this->M_siswa->jumlahSiswa();
        $data["jmlGuru"] = $this->M_guru->jumlahGuru();
        $data["jmlKelas"] = $this->M_admin->jumlahKelas();
        $data["jmlMapel"] = $this->M_admin->jumlahMapel();
        $this->load->view('view_admin/V_dashadmin', $data);
        $this->load->view('templates/user_footer');
    }
    public function ubahpassword()
    {
        $this->load->view('templates/admin_sidebar');
        $this->topbarAdmin();
        $this->load->view('view_admin/V_ubahpassword');
        $this->load->view('templates/user_footer');
    }
    public function ubahpassword_akun()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules(
            'current_password',
            'Kata Sandi Lama',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'new_password1',
            'Kata Sandi Baru',
            'required|trim|matches[new_password2]'
        );
        $this->form_validation->set_rules(
            'new_password2',
            'Konfirmasi Kata Sandi Baru',
            'required|trim|matches[new_password1]'
        );
        if ($this->form_validation->run() == false) {
            $this->ubahpassword();
        } else {
            $current_password = $this->input->post('current_password');
            $new_password1 = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['admin']['password'])) {
                $this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Kata Sandi Tidak Boleh sama</div>');
                redirect('C_admin/ubahpassword_akun');
            } else {
                if ($current_password == $new_password1) {
                    $this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Kata Sandi Tidak Boleh sama</div>');
                    redirect('C_admin/ubahpassword_akun');
                } else {
                    // password sudah benar
                    $password_hash = password_hash('$new_password1', PASSWORD_DEFALT);
                    $this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">Kata Sandi Berhasil Dirubah</div>');
                    redirect('C_admin/ubahpassword_akun');
                }
            }
        }
    }

    public function register_guru()
    {
        $this->load->view('templates/admin_sidebar');
        $this->topbarAdmin();
        $this->load->view('view_admin/V_tambahakunguru');
        $this->load->view('templates/user_footer');
    }
    function daftar_guru()
    {
        $id_guru = $this->input->post('id_guru');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $email =  $this->input->post('email');

        $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
        $this->load->model('M_admin');

        $data = array(
            'id_guru' => $id_guru,
            'nama' => $nama,
            'password' => md5($password),
            'email' => $email,
        );

        $error = "";

        $berhasil = $this->M_admin->set_guru($data, 'guru');
        $this->index();
    }
    public function tampil_daftarsiswa()
    {
        // $data ['adm in'] = $this->db->get_where ('adm in',  ['userna me' => $this->session->userdata ('userna me')])->row_array();
        // $this->topbarAdmin();
        $this->load->view('templates/admin_sidebar');
        $this->topbarAdmin();
        $data['data_kelas'] = $this->M_admin->getkelas()->result();
        $this->load->view('view_admin/V_tambahakunsiswa', $data);
        $this->load->view('templates/user_footer');
    }
    public function daftar_siswa()
    {

        // $this->form_validation->set_error_delimiters('<div st y le="color:red; margin-bottom: 5px font-size:10px " >','< div>');
        $id_siswa = $this->input->post('id_siswa');
        $nama_siswa = $this->input->post('nama_siswa');
        $password = $this->input->post('password');
        $email =  $this->input->post('email');
        $id_kelas =  $this->input->post('id_kelas');

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $this->load->model('m_admin');

        $data = array(
            'id_siswa' => $id_siswa,
            'nama_siswa' => $nama_siswa,
            'password' => md5($password),
            'email' => $email,
            'id_kelas' => $id_kelas,

        );

        $error = "";

        $berhasil = $this->m_admin->set_siswa($data, 'siswa');
        redirect('C_admin/tampil_daftarsiswa');
    }
    public function tampil_formbuatkelas()
    {
        $this->load->view('templates/admin_sidebar');
        $this->topbarAdmin();
        $this->load->view('view_admin/V_formbuatkelas');
        $this->load->view('templates/user_footer');
    }
    public function tampil_datakelas()
    {
        // $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/admin_sidebar');
        $this->topbarAdmin();
        $data2['data_kelas'] = $this->M_admin->getkelas()->result();
        $this->load->view('view_admin/V_buatkelas', $data2);
        $this->load->view('templates/user_footer');
    }
    public function buatkelas()
    {
        $id = $this->input->post('id_kelas');
        $tingkat = $this->input->post('tingkat');
        $nama_kelas = $this->input->post('nama_kelas');



        $kelas = $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
        $this->load->model('M_admin');

        //     $data = array(
        //         'id_kelas' => $id_kelas,
        //         'tingkat' => $tingkat,
        //         'nama_kelas' => $nama_kelas,


        //     );

        //     $error = "";

        //     $berhasil = $this->M_admin->set_kelas($data, 'kelas');
        //     redirect('C_admin/tampil_datakelas');
        $this->form_validation->set_rules(
            'id_kelas',
            'Kode Kelas',
            'trim|required',
            ['required' => 'Harus di isi']
        );
        $this->form_validation->set_rules(
            'tingkat',
            'Tingkat',
            'trim|required',
            ['required' => 'Harus di isi']

        );
        $this->form_validation->set_rules(
            'nama_kelas',
            'Mata Pelajaran',
            'trim|required',
            ['required' => 'Harus di isi']

        );
        if ($id == '' || $tingkat == '' || $nama_kelas == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Field Kosong</div>');
            redirect('C_admin/tampil_datakelas');
        } else {
            $berhasil = $this->M_admin->set_kelas($id, $tingkat, $nama_kelas);
            $this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Data Tersimpan</div>');
            redirect('C_admin/tampil_datakelas');
        }
    }

    public function tampil_datamapel()
    {
        // $this->load->model('M_admin');


        $this->load->view('templates/admin_sidebar');
        $this->topbarAdmin();
        $data2['data_mapel'] = $this->M_admin->getMapel()->result();
        $this->load->view('view_admin/V_tambahmapel', $data2);
        $this->load->view('templates/user_footer');
    }

    public function tambahmapel()
    {
        $id_mapel = $this->input->post('id_mapel');
        $nama_mapel = $this->input->post('nama_mapel');
        $mapel = $this->db->get_where('mapel', ['id_mapel' => $id_mapel])->row_array();
        $this->load->model('M_admin');

        $data = array(
            'id_mapel' => $id_mapel,
            'nama_mapel' => $nama_mapel,
        );

        $error = "";

        $berhasil = $this->M_admin->set_mapel($data, 'mapel');
        redirect('C_admin/tampil_datamapel');
    }



    //ini sa tak perbaiki alurnya untuk delete sama update
    public function hapusMataPelajaran()
    {
        $id = $this->input->post('id_mapel');

        //ini array untuk jadi 'id_mapel' , terus diisi variabel yang isinya id
        $data = [
            'id_mapel' => $id
        ];

        $this->M_admin->hapus_mapel($data);
        //ngedirectnya ke controller dulu baru nama view
        redirect('C_admin/tampil_datamapel');
    }

    public function updateMataPelajaran()
    {
        $id = $this->input->post('id_mapel');

        $data = array(

            'id_mapel' => $this->input->post('id_mapel'),
            'nama_mapel' => $this->input->post('nama_mapel'),
        );
        // echo $id;
        // echo "<br>";
        // print_r($data);
        // die;

        $this->M_admin->updateMapel($id, $data);
        redirect('C_admin/tampil_datamapel');
    }

    public function updateKelas()
    {
        $id = $this->input->post('id_kelas');

        $data = array(
            'id_kelas' => $this->input->post('id_kelas'),
            'tingkat' => $this->input->post('tingkat'),
            'nama_kelas' => $this->input->post('nama_kelas')
        );

        $this->M_admin->update_kelas($id, $data);
        redirect('C_admin/tampil_datakelas');
    }
    public function hapusKelas()
    {
        $delete_id_kelas = $this->input->post('data_id_kelas');

        //ini array untuk jadi 'id_mapel' , terus diisi variabel yang isinya id
        $delete = [
            'id_kelas' => $delete_id_kelas
        ];

        $hapus = $this->M_admin->delete_kelas($delete);
        //ngedirectnya ke controller dulu baru nama view
        redirect('C_admin/tampil_datakelas');
    }
}
