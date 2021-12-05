<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function index()
    {
        $data = [
            "judul" => "Halaman Menu Setting",
            "menu" => "All Settings",
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('templete/admin_header', $data);
        $this->load->view('setting/index', $data);
        $this->load->view('templete/admin_footer');
    }

    public function ubah_password()
    {
        $data = [
            "judul" => "Halaman Menu Password",
            "menu" => "Ubah Password",
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Inputan password wajib di isi'
        ]);

        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Inputan password wajib di isi',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Password dan konfirmasi password harus sama'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[5]|matches[password1]', [
            'required' => 'Inputan password wajib di isi',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Password dan konfirmasi password harus sama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('setting/ubah_password', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $password = $this->input->post('password');
            $password1 = $this->input->post('password1');

            if (!password_verify($password, $data['user_session']['password'])) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password yang anda masukna salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('setting/ubah_password');
            } else {
                if ($password == $password1) {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password saat ini tidak boleh sama dengan password baru
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('setting/ubah_password');
                } else {
                    $new_password = password_hash($password1, PASSWORD_DEFAULT);
                    $this->db->set('password', $new_password);
                    $this->db->where('email', $data['user_session']['email']);
                    $this->db->update('users');

                    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password berhasil di ubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('setting/ubah_password');
                }
            }
        }
    }

    public function ubah_email()
    {
        $data = [
            "judul" => "Halaman Menu Email",
            "menu" => "Ubah Email",
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
            'required' => 'Inputan email wajib di isi',
            'valid_email' => 'Format email salah'
        ]);

        $this->form_validation->set_rules('email1', 'Email Baru', 'required|valid_email|trim|is_unique[users.email]', [
            'required' => 'Inputan email baru wajib di isi',
            'valid_email' => 'Format email salah',
            'is_unique' => 'Email sudah digunakan'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Inputan password wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('setting/ubah_email', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $data_email = $data['user_session']['email'];

            if ($email != $data_email) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email yang anda masukan salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('setting/ubah_email');
            } else {
                if (!password_verify($password, $data['user_session']['password'])) {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password yang anda masukan salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('setting/ubah_email');
                } else {
                    $new_email = $this->input->post('email1');

                    $this->db->set('email', $new_email);
                    $this->db->where('email', $data['user_session']['email']);
                    $this->db->update('users');
                    redirect('setting/success_ubah_email');
                }
            }
        }
    }

    public function success_ubah_email()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level_id');
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Email berhasil di ubah, silahkan login kembali
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('auth');
    }
}
