<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Level_id_model');
        $this->load->model('Role_model');
        $this->load->model('Menu_model');
        // function helper
        menuku_id();
    }
    // _______________________________________Dashboard___________________________________________________
    public function index()
    {
        $data = [
            "judul" => "Halaman Admin",
            "menu" => $this->uri->segment(2),
            "level_id" => $this->Level_id_model->getLevel(),
            "member" => $this->db->get_where('users', ['level_id' => 3])->result_array(),
            "user_session" =>  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('templete/admin_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templete/admin_footer');
    }


    // ___________________________________Pengguna sistem_________________________________________________________
    // menu penggun sistem
    public function member()
    {
        $data = [
            "judul" => "Pengguna Sistem",
            "menu" => $this->uri->segment(2),
            "level_id" => $this->Level_id_model->getLevel(),
            "users" => $this->Role_model->getRole(),
            "user_session" =>  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('templete/admin_header', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templete/admin_footer');
    }

    public function add_users()
    {
        $data = [
            'judul' => "Halaman Tambah Users",
            'menu' => "Tambah Data Users",
            'level_id' => $this->db->get('user_role')->result_array(),
            'is_active' => $this->db->get('user_aktivasi')->result_array(),
            'user_session' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required', [
            'required' => 'Inputan nama admin wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_resto', 'Nama Resto', 'required', [
            'required' => 'Inputan nama resto wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]', [
            'required' => 'Inputan email wajib di isi',
            'valid_email' => 'Format email salah',
            'is_unique' => 'Email sudah digunakan'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Inputan password wajib di isi',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Password dan konfirmasi password harus sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password Konfirmasi', 'required|trim|min_length[5]|matches[password1]', [
            'required' => 'Inputan password wajib di isi',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Password dan konfirmasi password harus sama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('admin/add_users', $data);
            $this->load->view('templete/admin_footer');
        } else {

            // cek jika ada gambar yang di upload
            $image = $_FILES['image']['name'];

            if ($image) {
                $config = [
                    'upload_path' => './public/img/profile/',
                    'allowed_types' => 'gif|jpg|png|JPEG',
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
                    redirect('admin/member');
                }
            }

            $data = [
                'nama_admin' => $this->input->post('nama_admin', true),
                'nama_resto' => $this->input->post('nama_resto', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level_id' => $this->input->post('level_id'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => $this->input->post('date_created')
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Tambah data user berhasil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/member');
        }
    }

    public function hapus_semuaPengguna()
    {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->db->delete('users', ['id' => $id[$count]]);
            }
        }
    }

    public function hapus($id)
    {
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data member berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/member');
    }

    // menu penggun sistem
    public function ubah($id)
    {
        $data = [
            "judul" => "Ubah Pengguna Sistem",
            "menu" => "Ubah Data Member",
            "user_aktivasi" => $this->db->get('user_aktivasi')->result_array(),
            "users" => $this->db->get_where('users', ['id' => $id])->row_array(),
            "role_id" => $this->db->get('user_role')->result_array(),
            "user_session" =>  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required', [
            'required' => 'Inputan nama admin wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_resto', 'Nama Resto', 'required', [
            'required' => 'Inputan nama resto wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
            'required' => 'Inputan email wajib di isi',
            'valid_email' => 'Format email salah'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $config = [
                'upload_path' => './public/img/profile/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => '2048'
            ];
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $data = [
                    "nama_admin" => $this->input->post('nama_admin', true),
                    "nama_resto" => $this->input->post('nama_resto', true),
                    "email" => $this->input->post('email', true),
                    "password" => $this->input->post('password'),
                    "level_id" => $this->input->post('level_id'),
                    "is_active" => $this->input->post('is_active'),
                    "date_created" => $this->input->post('date_created')
                ];
                // $this->db->where('id', $this->input->post('id'));
                $this->db->update('users', $data, ['id' => $this->input->post('id')]);
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data member berhasil di ubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('admin/member');
            } else {
                $new_image = $this->upload->data('file_name');
                $data = [
                    "nama_admin" => $this->input->post('nama_admin', true),
                    "nama_resto" => $this->input->post('nama_resto', true),
                    "image" => $new_image,
                    "email" => $this->input->post('email', true),
                    "password" => $this->input->post('password'),
                    "level_id" => $this->input->post('level_id'),
                    "is_active" => $this->input->post('is_active'),
                    "date_created" => $this->input->post('date_created')
                ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('users', $data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Ubah data pengguna sistem berhasil
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('admin/member');
            }
        }
    }

    // dengan ajax wajib di controller admin
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'level_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Access Berhasil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
    }

    // wajib di controller admin
    public function access($role)
    {
        $data = [
            "judul" => "Halaman User Access",
            "menu" => "User Access Menu",
            "user_access" => $this->db->get_where('user_role', ['id' => $role])->row_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $data["user_menu"] = $this->db->get('user_menu')->result_array();
        $this->load->view('templete/admin_header', $data);
        $this->load->view('menu/user_access', $data);
        $this->load->view('templete/admin_footer');
    }
}
