<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        $this->load->model('Profil_model');
        menuku_id();
    }

    public function index()
    {
        $data = [
            "judul" => "Halaman Member",
            "profil" => $this->Profil_model->getAllProfil(),
            "data_null" => $this->db->get_where('profil_resto', ['user_id' => $this->session->userdata('id')])->row_array(),
            "user_session" =>  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('templete/admin_header', $data);
        $this->load->view('member/index');
        $this->load->view('templete/admin_footer');
    }

    public function edit_profile()
    {
        $data = [
            "judul" => "Edit Profile",
            "profil" => $this->Profil_model->getAllProfil(),
            "data_null" => $this->db->get_where('profil_resto', ['user_id' => $this->session->userdata('id')])->row_array(),
            "user_session" =>  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('member/editProfile', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $nama = $this->input->post('nama_admin');
            $resto = $this->input->post('nama_resto');
            $email = $this->input->post('email');

            // cek jika ada gambar yang di upload
            $upload_img = $_FILES['image']['name'];

            if ($upload_img) {
                $config = [
                    'upload_path' => './public/img/profile/',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => '2048'
                ];
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('member');
                }
            }

            $this->db->set('nama_admin', $nama);
            $this->db->set('nama_resto', $resto);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Ubah data berhasil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('member');
        }
    }

    public function add_profil()
    {
        $data = [
            "judul" => "Profil Resto",
            "menu" => "Profil Restaurant",
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->form_validation->set_rules('no_tlp', 'No Tlp', 'required|numeric');
        $this->form_validation->set_rules('no_wa', 'No Wa', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('about', 'About', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('member/add_profil', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $data = [
                'user_id' => $this->input->post('user_id', true),
                'no_tlp' => $this->input->post('no_tlp', true),
                'no_wa' => $this->input->post('no_wa', true),
                'alamat' => $this->input->post('alamat', true),
                'about' => $this->input->post('about', true)
            ];

            $this->db->insert('profil_resto', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Profil berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/index');
        }
    }

    public function ubah_profil()
    {
        $data = [
            "judul" => "Profil Resto",
            "menu" => "Profil Restaurant",
            "profil" => $this->Profil_model->getAllProfil(),
            "data_null" => $this->db->get_where('profil_resto', ['user_id' => $this->session->userdata('id')])->row_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Tlp', 'required|numeric');
        $this->form_validation->set_rules('no_wa', 'No Wa', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('member/ubah_profil_resto', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $data = [
                "user_id" => $this->input->post('user_id', true),
                "no_tlp" => $this->input->post('no_tlp', true),
                "no_wa" => $this->input->post('no_wa', true),
                "alamat" => $this->input->post('alamat', true),
                "about" => $this->input->post('about', true)
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('profil_resto', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Profil berhasil ubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('member/ubah_profil');
        }
    }

    public function cabang()
    {
        $data = [
            "judul" => "Cabang Restaurant",
            "menu" => "Cabang Resto",
            "cabang" => $this->db->get_where('tb_cabang', ['user_id' => $this->session->userdata('id')])->result_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('templete/admin_header', $data);
        $this->load->view('member/cabang', $data);
        $this->load->view('templete/admin_footer');
    }

    public function add_cabang()
    {
        $data = [
            "judul" => "Cabang Restaurant",
            "menu" => "Tambah Cabang",
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('nama_cabang', 'Nama Cabang', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('member/tambah_cabang', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $upload_img = $_FILES['gambar']['name'];
            if ($upload_img) {
                $config = [
                    'upload_path' => './public/img/profile/',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'max_size' => '2048'
                ];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_img);
                }
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('member/cabang');
            }
            $data = [
                'user_id' => $this->input->post('user_id'),
                'nama_cabang' => $this->input->post('nama_cabang'),
                'alamat_cabang' => $this->input->post('alamat'),
                'no_tlp' => $this->input->post('no_tlp'),
                'no_wa' => $this->input->post('no_wa'),
                'about' => $this->input->post('about')
            ];
            $this->db->insert('tb_cabang', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data cabang berhasil di tambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('member/cabang');
        }
    }

    public function detail_cabang($id)
    {
        $data = [
            "judul" => "Detail Restaurant",
            "menu" => "Detail Cabang",
            "detail" => $this->db->get_where('tb_cabang', ['id' => $id])->row_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('templete/admin_header', $data);
        $this->load->view('member/detail_cabang', $data);
        $this->load->view('templete/admin_footer');
    }

    public function hapus_cabang($id)
    {
        $this->db->delete('tb_cabang', ['id' => $id]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data cabang berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('member/cabang');
    }

    public function ubah_cabang($id)
    {
        $data = [
            "judul" => "Cabang Restaurant",
            "menu" => "Ubah Cabang",
            "data" => $this->db->get_where('tb_cabang', ['id' => $id])->row_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('nama_cabang', 'Nama Cabnag', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('member/ubah_cabang', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $config = [
                'upload_path' => './public/img/profile/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => '2048'
            ];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $data = [
                    'user_id' => $this->input->post('user_id'),
                    'nama_cabang' => $this->input->post('nama_cabang'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'no_wa' => $this->input->post('no_wa'),
                    'alamat_cabang' => $this->input->post('alamat'),
                    'about' => $this->input->post('about')
                ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('tb_cabang', $data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data cabang berhasil di ubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('member/cabang');
            } else {
                $new_img = $this->upload->data('file_name');
                $data = [
                    'user_id' => $this->input->post('user_id'),
                    'nama_cabang' => $this->input->post('nama_cabang'),
                    'alamat_cabang' => $this->input->post('alamat'),
                    'gambar' => $new_img,
                    'no_tlp' => $this->input->post('no_tlp'),
                    'no_wa' => $this->input->post('no_wa'),
                    'about' => $this->input->post('about')
                ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('tb_cabang', $data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data cabang berhasil di ubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('member/cabang');
            }
        }
    }

    public function hapus_semuaCabang()
    {
        if($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for($i = 0; $i < count($id); $i++) {
                $this->db->delete('tb_cabang',['id' => $id[$i]]);
            }
        }
    }
}
