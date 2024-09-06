<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

	public function index()
	{
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Passwword', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "BackOffice - DPMPTSP | Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('login_view');
            $this->load->view('templates/auth_footer');
        } else {
            $this->login_model->proses_login();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata(
            'msg_error',
            '<div class="alert alert-success">Anda telah keluar!</div>'
        );
        redirect('login');
    }
}
