<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Resto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_makanan_model');
    }

    public function index()
    {
        $data = [
            "judul" => "Menu Makanan",
            "menu" => "Data Makanan",
            "id" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "menu_makanan" => $this->Menu_makanan_model->getAllMenu(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('templete/admin_header', $data);
        $this->load->view('resto/index', $data);
        $this->load->view('templete/admin_footer');
    }

    public function add_menu($id)
    {
        $data = [
            "judul" => "Menu Makanan",
            "menu" => "Tambah Manu Makanan",
            "status" => $this->db->get('tb_status')->result_array(),
            "kategori" => $this->db->get_where('kat_makanan', ['user_id' => $id])->result_array(),
            "id" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('nama_makanan', 'Nama Makanan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('resto/add_menu', $data);
            $this->load->view('templete/admin_footer');
        } else {
            // upload gambar
            $upload_img = $_FILES['gambar']['name'];
            if ($upload_img) {
                $config = [
                    'upload_path' => './public/img/profile/',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'max_size' => '2048'
                ];

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('resto');
                }
            }
            $data = [
                "user_id" => $this->input->post('user_id', true),
                "nama_makanan" => $this->input->post('nama_makanan', true),
                "kat_id" => $this->input->post('kat_id', true),
                "harga" => preg_replace("/[^0-9]/", "", $this->input->post('harga', true)),
                "id_status" => $this->input->post('status'),
                "keterangan" => $this->input->post('keterangan')
            ];
            $this->db->insert('menu_makanan', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Menu makanan berhasi di tambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('resto');
        }
    }

    public function hapusMenu($id)
    {
        $this->db->delete('menu_makanan', ['id' => $id]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Hapus data berhasil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('resto');
    }

    public function detail_menu($id)
    {
        $data = [
            "judul" => "Menu Makanan",
            "menu" => "Detail Makanan",
            "detail" => $this->Menu_makanan_model->getMenuById($id),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('templete/admin_header', $data);
        $this->load->view('resto/detail_menu', $data);
        $this->load->view('templete/admin_footer');
    }

    public function edit_menu($id)
    {
        $data = [
            "judul" => "Menu Makanan",
            "menu" => "Ubah Menu Makanan",
            "status" => $this->db->get('tb_status')->result_array(),
            "kategori" => $this->Menu_makanan_model->getKatMenu(),
            "detail" => $this->db->get_where('menu_makanan', ['id' => $id])->row_array(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->form_validation->set_rules('nama_makanan', 'Nama Makanan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('resto/edit_menu', $data);
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
                    "user_id" => $this->input->post('user_id', true),
                    "nama_makanan" => $this->input->post('nama_makanan', true),
                    "kat_id" => $this->input->post('kat_id', true),
                    "harga" => preg_replace("/[^0-9]/", "", $this->input->post('harga', true)),
                    "id_status" => $this->input->post('id_status', true),
                    "keterangan" => $this->input->post('keterangan', true)
                ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('menu_makanan', $data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Menu makanan berhasil di ubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('resto');
            } else {
                $new_image = $this->upload->data('file_name');
                $data = [
                    "user_id" => $this->input->post('user_id', true),
                    "nama_makanan" => $this->input->post('nama_makanan', true),
                    "kat_id" => $this->input->post('kat_id', true),
                    "gambar" => $new_image,
                    "harga" => preg_replace("/[^0-9]/", "", $this->input->post('harga', true)),
                    "id_status" => $this->input->post('id_status', true),
                    "keterangan" => $this->input->post('keterangan', true)
                ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('menu_makanan', $data);
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Menu makanan berhasil di ubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('resto');
            }
        }
    }

    // ajax
    public function hapus_semuaMenu()
    {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->db->delete('menu_makanan', ['id' => $id[$count]]);
            }
        }
    }

    // Ktegori Makanan
    public function katMenu()
    {
        $data = [
            "judul" => "Menu Makanan",
            "menu" => "Tambah Kategori Menu",
            "kat_makanan" => $this->Menu_makanan_model->getKatMenu(),
            "user_session" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->form_validation->set_rules('kat_makanan', 'Kategori Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templete/admin_header', $data);
            $this->load->view('resto/kategori_menu', $data);
            $this->load->view('templete/admin_footer');
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'menu_kategori' => $this->input->post('kat_makanan')
            ];
            $this->db->insert('kat_makanan', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori menu berhasil ditambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('resto/katMenu');
        }
    }

    public function hapusKategori($id)
    {
        $this->db->delete('kat_makanan', ['id' => $id]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori menu berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('resto/katMenu');
    }

    // test
    // public function menu()
    // {
    //     $data = [
    //         'kategori_menu' => $this->db->get_where('kat_makanan', ['user_id' => $this->session->userdata('id')])->result_array()
    //     ];
    //     $this->load->view('templete/lp_header');
    //     $this->load->view('test/menu', $data);
    //     $this->load->view('templete/lp_footer');
    // }

    public function tampil_menu($id)
    {
        $data = [
            'kategori_menu' => $this->db->get_where('kat_makanan', ['user_id' => $this->session->userdata('id')])->result_array(),
            'menu_makanan' => $this->db->get_where('menu_makanan', ['kat_id' => $id])->result_array(),
            'row' => $this->db->get_where('kat_makanan', ['id' => $id])->row_array()
        ];
        $this->load->view('templete/lp_header');
        $this->load->view('test/tampil_menu', $data);
        $this->load->view('templete/lp_footer');
    }

    public function home($id)
    {
        $data = [
            'kategori_menu' => $this->db->get_where('kat_makanan', ['user_id' => $this->session->userdata('id')])->result_array(),
            'menu_makanan' => $this->db->get_where('menu_makanan', ['kat_id' => $id])->result_array(),
            'row' => $this->db->get_where('kat_makanan', ['id' => $id])->row_array(),
            'user_session' => $this->db->get_where('users',['id' => $this->session->userdata('id')])->row_array()
        ];
        $this->load->view('templete/lp_header', $data);
        $this->load->view('test/home', $data);
        $this->load->view('templete/lp_footer');
    }

    public function cetak() 
    {
        $data = [
            "judul" => "Cetak Data",
            "cetak" => $this->Menu_makanan_model->getAllMenu()
        ];
        $this->load->view('resto/cetak', $data);
    }
}
