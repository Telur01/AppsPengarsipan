<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

	public function dashboard_admin()
	{
        $data['title'] = "BackOffice | Dashboard ";
        $data['title1'] = "Halaman Dashboard";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['total_data_dokrap'] = $this->db->count_all('tb_dokumentasi');
        $data['total_data_arbos'] = $this->db->count_all('tb_arsipboss');
        $data['total_data_monitoring'] = $this->db->count_all('tb_monitoring');
        $data['total_data_inaktif'] = $this->db->count_all('tb_inaktif');
        $data['total_data_Peminjaman'] = $this->db->count_all('tb_peminjaman');
        $data['total_data_user'] = $this->db->count_all('tb_user');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard_admin_view', $data);
        $this->load->view('templates/footer', $data);
	}

	public function dashboard_leader()
	{
        $data['title'] = 'BackOffice | Dashboard';
        $data['title1'] = 'Dashboard Kepala Bagian';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_leader');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard_kabag_view');
        $this->load->view('templates/footer', $data);
	}

	public function dashboard_staff()
	{
	    $data['title'] = "BackOffice | Dashboard Staff";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_staff');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard_staff_view');
        $this->load->view('templates/footer');
	}
}
