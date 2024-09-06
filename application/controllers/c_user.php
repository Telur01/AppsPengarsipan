<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "BackOffice | Data User ";
        $data['title1'] = "Halaman Data User";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data_user'] = $this->user_model->getDataUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_user_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_data()
    {
        $this->form_validation->set_rules('username', '*username*', 'required|trim|is_unique[tb_user.username]', [
            'is_unique' => 'Username ini sudah terdaftar!',
        ]);
        $this->form_validation->set_rules('password1', '*password*', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'password tidak cocok!',
            'min_length' => 'password terlalu pendek!',

        ]);
        $this->form_validation->set_rules('password2', '*password*', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('level', 'level', 'required|in_list[administrator,kepala_bagian,staff]');


        if ($this->form_validation->run() == false) {
            $data['title'] = "DPMPTSP | Halaman Data User";
            $data['title1'] = "Tambah Data Users";
            $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
            $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

            // Generate kode otomatis
            $kode_user = $this->user_model->generateKodeUser();
            $id_biodata = $this->user_model->GenerateIdBiodata();

            // Mengirimkan kode_user ke view
            $data['kode_user'] = $kode_user;
            $data['id_biodata'] = $id_biodata;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form_tambah/form_tambah_user');
            $this->load->view('templates/footer', $data);
        } else {
            $this->user_model->tambah_data();
            $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
            $this->session->set_flashdata('pesan', $alert_pesan);
            redirect('c_user');
        }
    }

    public function hapus_data($id_user)
    {
        $this->user_model->hapus_data($id_user);
        $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);
        redirect('c_user');
    }

     public function reset_password($id_user)
     {
    // Ambil data pengguna berdasarkan ID
    $user = $this->user_model->get_user_by_id($id_user);

    // Cek level pengguna
    if ($user['level'] == 'administrator') {
        $new_password = password_hash('admin123', PASSWORD_DEFAULT);
    } elseif ($user['level'] == 'kepala_bagian') {
        $new_password = password_hash('kabag123', PASSWORD_DEFAULT);
    } else {
        $new_password = password_hash('staff123', PASSWORD_DEFAULT);
    }

    // Reset password
    $this->user_model->reset_user_password($id_user, $new_password);

    // Tampilkan pesan sukses atau error
    $alert_pesan = '
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Password Berhasil Di Reset!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <script>
                // Menetapkan waktu timeout untuk alert
                setTimeout(function() {
                    $("#successAlert").alert("close");
                }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
            </script>
        ';
    $this->session->set_flashdata('pesan', $alert_pesan);
    redirect('c_user');
    }
}
