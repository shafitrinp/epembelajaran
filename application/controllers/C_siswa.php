<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_siswa');
        $this->load->library('form_validation');
    }
    public function topbarSiswa()
    {
        $data['siswa'] = $this->M_siswa->getnamasiswa($this->session->userdata('id_siswa'))->row_array();
        $this->load->view('templates/siswa_topbar', $data);
    }
    public function index()
    {
        $this->load->view('templates/siswa_sidebar');
        $this->topbarSiswa();
        $this->load->view('view_siswa/V_dashsiswa');
        $this->load->view('templates/user_footer');
    }

    function biodata()
    {
        $data['biodata'] = $this->M_siswa->get_biodata($this->session->userdata('id_siswa'));
        // $data['datauser'] = $this->set_datauser();
        $this->load->view('templates/siswa_sidebar');
        $this->topbarSiswa();
        $this->load->view('view_siswa/V_profil', $data);
        $this->load->view('templates/user_footer');
    }

    public function get_profil()
    {
        $cek = $this->M_siswa->get_biodata($this->session->userdata('id_siswa'))->result();
        if (count($cek) > 0) {
            foreach ($cek as $c) { };
            $data = array(
                'id_siswa' => $c->id_siswa,
                'nama' => $c->nama,
                'jurusan' => $c->jurusan,
                'kelas' => $c->kelas,
                'email' => $c->email

            );
            $this->load->view('view_siswa/V_editprofile', $data);
        } else {
            redirect('C_siswa');
            //$this->load->view('V_biodata');
        }
    }
    public function ubahpassword()
    {
        $this->load->view('templates/siswa_sidebar');
        $this->topbarSiswa();
        $this->load->view('view_siswa/V_ubahpassword');
        $this->load->view('templates/user_footer');
    }
    public function ubahpassword_akun()
    {
        $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('no_identitas')])->row_array();

        $this->form_validation->set_rules(
            'current_password',
            'Kata Sandi Lama',
            'trim|required',
            ['required' => 'Password harus diisi']
        );
        $this->form_validation->set_rules(
            'new_password1',
            'Kata Sandi Baru',
            'trim|required|matches[new_password2]',
            ['required' => 'Password harus diisi!!!!'],
            ['matches' => 'Password harus sama!!']
        );
        $this->form_validation->set_rules(
            'new_password2',
            'Konfirmasi Kata Sandi Baru',
            'required|trim|matches[new_password1]',
            ['required' => 'Password harus diisi!!!!'],
            ['matches' => 'Password harus sama!!']
        );
        if ($this->form_validation->run() == false) {
            $this->ubahpassword();
        } else {
            $current_password = $this->input->post('current_password');
            $new_password1 = $this->input->post('new_password1');

            $currentpass = md5($current_password);
            $newpass = md5($new_password1);

            if ($currentpass == $data['siswa']['password']) {
                if ($currentpass == $newpass) {
                    $this->session->set_flashdata('messagepass', '<div class= "alert alert-danger" role="alert">Kata Sandi Tidak Boleh sama</div>');
                    redirect('C_siswa/ubahpassword_akun');
                } else {
                    //password sdh benar
                    $this->db->set('password', $newpass);
                    $this->db->where('id_siswa', $this->session->userdata('no_identitas'));
                    $this->db->update('siswa');
                    $this->session->set_flashdata('messagepass', '<div class= "alert alert-success" role="alert">Kata Sandi Berhasil Dirubah!</div>');
                    redirect('C_siswa/ubahpassword_akun');
                }
            } else {
                // password lama salah

                $this->session->set_flashdata('messagepass', '<div class= "alert alert-danger" role="alert">Kata Sandi Salah!</div>');
                redirect('C_siswa/ubahpassword_akun');
            }
        }
    }
    public function tampil_tugas()
    {
        $this->load->view('templates/siswa_sidebar');
        $this->topbarSiswa();
        $kelas = $this->session->userdata('id_kelas');
        $data['tugas'] = $this->M_siswa->tugassiswa($kelas)->result();
        $this->load->view('view_siswa/V_dashsiswa', $data);
        $this->load->view('templates/user_footer');
    }

    public function do_upload()
    {
        $config['upload_path']          = 'asset/uploads/';   //ini isi lokasi dimana kamu mau nyimpen filenya setelah di upload, saranku di dalem folder asset bikin folder uploads
        $config['allowed_types']        = 'pdf|doc|docx';  //ini isi format file yg kamu pingin upload, gamar ya jpg. kalo dokumen ya pdf atau doc, tanda ataunya pakek |
        $config['max_size']             = 2048;    // ini maks size, tapi di CI biasanya dibatasin biarpun kamu udh ubah lebih besar dari 2 MB itu gak bisa


        $this->load->library('upload', $config);        // ini default isiin untuk implement/ manggil dari librari COdeigniternya

        if (!$this->upload->do_upload('userfile'))            //'userfile' ini sesuai inputannya yg kayak name di view trus di controllernya harus sama
        {
            $error = array('error' => $this->upload->display_errors());        // ini biarin

            $this->load->view('view_siswa/V_plagiasi', $error);        //ini untuk ngarahin misal kalo error bisa di bikin redirect kehalaman yang sama atau ke view lain. variabel $error biarin
        } else {
            $data = array('upload_data' => $this->upload->data());        //biarin

            $this->load->view('view_siswa/V_dashsiswa', $data);        //ini sama kayak yg error cuma ini bener
        }
    }
}
    // public function edit()
    // {

    //     $this->load->view('view_siswa/V_editprofile');
    //     $this->load->view('templates/user_footer');
    // }
    // public function editprofile()
    // { }
