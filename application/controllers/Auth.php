<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('member');
        }
        $data = [
            "judul" => "Halaman Login"
        ];

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
            'required' => 'Inputan email wajib di isi',
            'valid_email' => 'Format email salah'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]', [
            'required' => 'Inputan password wajib di isi',
            'min_length' => 'Password minimal 5 karakter'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/auth_header', $data);
            $this->load->view('auth/index');
            $this->load->view('templete/auth_footer');
        } else {
            // siapkan inputan email dan password
            $email = $this->input->post('email');
            $password = $this->input->post('password1');
            // query data user where email
            $user = $this->db->get_where('users', ['email' => $email])->row_array();
            if (is_null($user)) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email belum terdaftar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('auth');
            } else {
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'level_id' => $user['level_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['level_id'] == 1) {
                            redirect('admin');
                        } else if ($user['level_id'] == 2) {
                            redirect('admin');
                        } else {
                            redirect('member');
                        }
                    } else {
                        $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password yang anda masukna salah
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun belum aktif, hubungi admin untuk aktivasi
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('auth');
                }
            }
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('member');
        }
        $data = [
            "judul" => "Halaman Registrasi"
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
            $this->load->view('templete/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templete/auth_footer');
        } else {
            $data = [
                'nama_admin' => htmlspecialchars($this->input->post('nama_admin', true)),
                'nama_resto' => htmlspecialchars($this->input->post('nama_resto', true)),
                'image' => 'default.png',
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                'level_id' => 3,
                'is_active' => 0,
                'date_created' => time()
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('flash', ' <div class="alert alert-success alert-dismissible fade show" role="alert">Registrasi berhasil, tunggu aktivasi
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level_id');
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Logout berhasil
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('auth');
    }

    public function block()
    {
        $data = [
            "judul" => "Access Blocked"
        ];
        $this->load->view('auth/blocked', $data);
    }
}
