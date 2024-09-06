<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

	public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        // Jika user ada
        if ($user) {
            // Cek password
            if (password_verify($password, $user['password'])) {
                $data = array(

                    'id_biodata' => $user['id_biodata'],
                    'username' => $user['username'],
                    'level' => $user['level']
                );

                $this->session->set_userdata($data);
                if ($user['level'] == 'administrator') {
                    redirect('c_dashboard/dashboard_admin');
                } elseif ($user['level'] == 'kepala_bagian') {
                    redirect('c_dashboard/dashboard_leader');
                } else {
                    redirect('c_dashboard/dashboard_staff');
                }
            } else {
                $this->session->set_flashdata(
                    'msg_error',
                    '<div class="alert alert-danger">Password salah!</div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'msg_error',
                '<div class="alert alert-danger">Akun tidak terdaftar!</div>'
            );
            redirect('login');
        }
    }
}
