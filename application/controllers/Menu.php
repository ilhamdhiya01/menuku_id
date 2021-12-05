<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        // function helper
        menuku_id();
    }
    // ______________________________________Menu Managemenet________________________________________________
    // Access menu management
    // User Access Menu


    public function index()
    {
        $data = [
            "judul" => "Halaman Role User",
            "menu" => "Role User",
            "roles" => $this->db->get('user_role')->result_array(),
            "user_session" =>  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required', [
            'required' => 'Inputan Nama Role tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('menu/role_user', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $data = [
                'role' => $this->input->post('nama_role')
            ];
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Role erhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('menu');
        }
    }


    public function hapusRole($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Role User berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('menu');
    }

    // _________________________________________Submenu Managemenet________________________________________
    // Sub menu management 
    public function subMenu()
    {
        $data = [
            "judul" => "Halaman User Sub Menu",
            "menu" => "User Sub Menu",
            "sub_menu" => $this->Menu_model->getSubMenu(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('templete/admin_header', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templete/admin_footer');
    }

    public function hapus_semuaSub()
    {
        if($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for($count = 0; $count < count($id); $count++) {
                $this->db->delete('user_sub_menu', ['id' => $id[$count]]);
            }
        }
    }

    public function add_submenu()
    {
        $data = [
            "judul" => "Tambah User Sub Menu",
            "menu" => "Tambah Sub Menu",
            "aktif" => $this->db->get('user_aktivasi')->result_array(),
            "user_menu" => $this->db->get('user_menu')->result_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('sub_menu', 'Sub Menu', 'required', [
            'required' => 'Inputan Sub Menu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => 'Inputan Url tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', [
            'required' => 'Inputan Icon tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('menu/add_submenu', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $data = [
                'menu_id' => $this->input->post('menu', true),
                'menu' => $this->input->post('sub_menu', true),
                'url' => $this->input->post('url', true),
                'icon' => $this->input->post('icon', true),
                'is_active' => $this->input->post('is_active', true)
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Sub Menu berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('menu/subMenu');
        }
    }

    public function hapusSub($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Sub Menu berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('menu/subMenu');
    }

    public function ubah_sub($id)
    {
        $data = [
            "judul" => "Edit User Sub Menu",
            "menu" => "Edit Sub Menu",
            "user_menu" => $this->db->get('user_menu')->result_array(),
            "aktif" => $this->db->get('user_aktivasi')->result_array(),
            "user_submenu" => $this->db->get_where('user_sub_menu', ['id' => $id])->row_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('sub_menu', 'Sub Menu', 'required', [
            'required' => 'Inputan Sub Menu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => 'Inputan Url tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', [
            'required' => 'Inputan Icon tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $data = [
                'menu_id' => $this->input->post('menu', true),
                'menu' => $this->input->post('sub_menu', true),
                'url' => $this->input->post('url', true),
                'icon' => $this->input->post('icon', true),
                'is_active' => $this->input->post('is_active', true)
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Sub Menu berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('menu/subMenu');
        }
    }

    // ______________________________Menu management_____________________________________________

    // User Menu
    public function userMenu()
    {
        $data = [
            "menu" => "User Menu",
            "judul" => "Halaman User Menu",
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "user_menu" => $this->db->get('user_menu')->result_array()
        ];
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required', [
            'required' => 'Inputan Nama Menu tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $data = [
                'nama_menu' => $this->input->post('nama_menu', true)
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data User Menu berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('menu/userMenu');
        }
    }

    public function hapusMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data User Menu berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('menu/userMenu');
    }
}
