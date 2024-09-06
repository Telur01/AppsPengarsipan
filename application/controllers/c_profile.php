<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

	public function index()
    {
        $data['title'] = "BackOffice | Dashboard";
        $data['title1'] = "Halaman Dashboard";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        
        $id_biodata = $this->session->userdata('id_biodata');
        // mengambil data user
        $data['data_user'] = $this->user_model->getBiodataByUserId()->row();

        $this->load->view('templates/header', $data);

        if ($data['user']['level'] === 'administrator') {
            $this->load->view('templates/sidebar_admin');
        } elseif ($data['user']['level'] === 'kepala_bagian') {
            $this->load->view('templates/sidebar_leader');
        } else {
            $this->load->view('templates/sidebar_staff');
        }

        $this->load->view('templates/topbar', $data);
        $this->load->view('profile_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changePassword()
    {
        $data['title'] = "BackOffice | Ubah Password ";
        $data['title1'] = "Ubah Password";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(); 

        $this->form_validation->set_rules('pwd_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('pwd_baru_1', 'Password Baru', 'required|trim|min_length[6]|matches[pwd_baru_2]');
        $this->form_validation->set_rules('pwd_baru_2', 'Konfirmasi Password Baru', 'required|trim|min_length[6]|matches[pwd_baru_1]');
        

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            if ($data['user']['level'] === 'administrator') {
                $this->load->view('templates/sidebar_admin');
            } elseif ($data['user']['level'] === 'kepala_bagian') {
                $this->load->view('templates/sidebar_leader');
            } else {
                $this->load->view('templates/sidebar_staff');
            }
            $this->load->view('templates/topbar', $data);
            $this->load->view('change_password_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $pwd_lama = $this->input->post('pwd_lama');
            $pwd_baru = $this->input->post('pwd_baru_1');
            if(!password_verify($pwd_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div id="successAlert" class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 13px">
                Password Salah!
                </div>
                <script>
                // Menetapkan waktu timeout untuk alert
                setTimeout(function() {
                    $("#successAlert").alert("close");
                }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
                </script>'
                );
                redirect('c_profile/changePassword');
            } else {
                if ($pwd_lama == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div id="successAlert" class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 13px">
                    Password Lama tidak boleh sama dengan Password Baru!
                    </div> 
                    <script>
                    // Menetapkan waktu timeout untuk alert
                    setTimeout(function() {
                        $("#successAlert").alert("close");
                    }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
                    </script>');
                    redirect('c_profile/changePassword');
                } else {
                    // password sudah benar
                    $pwd_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $pwd_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('pesan', '<div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                    Ubah Password Berhasil!
                    </div>
                    <script>
                    // Menetapkan waktu timeout untuk alert
                    setTimeout(function() {
                        $("#successAlert").alert("close");
                    }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
                    </script>');
                    redirect('c_profile');
                }
            }
        }
    }

    public function ubah_biodata() 
    {

        $data['title'] = "BackOffice | Ubah Profile ";
        $data['title1'] = "Ubah Profile";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(); 
      
        // mengambil data user
        $data['data_user'] = $this->user_model->getBiodataByUserId()->row();

        $this->load->view('templates/header', $data);
        if ($data['user']['level'] === 'administrator') {
            $this->load->view('templates/sidebar_admin');
        } elseif ($data['user']['level'] === 'kepala_bagian') {
            $this->load->view('templates/sidebar_leader');
        } else {
            $this->load->view('templates/sidebar_staff');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('ubah_biodata_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function proses_update_biodata() {
        $this->user_model->proses_update_biodata();
        $alert_pesan = '
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil di Update!
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
            redirect('c_profile');
    }
 
    
}

