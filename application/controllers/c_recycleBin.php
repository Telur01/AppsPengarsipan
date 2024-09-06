<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_recycleBin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Recycle_bin_model');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        date_default_timezone_set('Asia/Jakarta');
    }

    // Recycle Bin Dokumentasi Rapat
    public function RecycleBin_Dokrap() {
        $data['title'] = "BackOffice | Recycle Bin - Dokrap ";
        $data['title1'] = "Halaman Recycle Bin";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        // Ambil data recycle bin dari model
        $data['recycle_bin_data'] = $this->Recycle_bin_model->get_RecycleBin_Dokrap();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('recycleBin_Dokrap_view', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function restore_dokrap($id_rb_dokrap) {
        // Panggil fungsi restore dari model
        $this->Recycle_bin_model->restore_dokrap($id_rb_dokrap);
        $alert_pesan = '
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px">
                Data Berhasil diRestore!
            </div>
             <script>
                // Menetapkan waktu timeout untuk alert
                setTimeout(function() {
                    $("#successAlert").alert("close");
                }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
            </script>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);

        // Redirect ke halaman recycle bin
        redirect('c_recycleBin/RecycleBin_Dokrap');
    }

    public function hapus_permanen_dokrap($id_rb_dokrap) {
        // Panggil fungsi hapus permanen dari model
        $this->Recycle_bin_model->hapus_permanen_dokrap($id_rb_dokrap);
        $alert_pesan = '
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px">
            Data Berhasil di hapus Permanen!
        </div>
         <script>
            // Menetapkan waktu timeout untuk alert
            setTimeout(function() {
                $("#successAlert").alert("close");
            }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
        </script>
        ';
        $this->session->set_flashdata('pesan', $alert_pesan);

        // Redirect ke halaman recycle bin
        redirect('c_recycleBin/RecycleBin_Dokrap');
    }

    // Recycle Bin Monitoring Izin Terbit
    public function RecycleBin_MIT() {
        $data['title'] = "BackOffice | Recycle Bin - MIT ";
        $data['title1'] = "Halaman Recycle Bin";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
       
        // Ambil data recycle bin dari model
        $data['recycle_bin_data'] = $this->Recycle_bin_model->get_RecycleBin_MIT();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('recycleBin_MIT_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function restore_mit($id_rb_mit) {
        // Panggil fungsi restore dari model
        $this->Recycle_bin_model->restore_mit($id_rb_mit);
        $alert_pesan = '
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px">
                Data Berhasil di Restore!
            </div>
             <script>
                // Menetapkan waktu timeout untuk alert
                setTimeout(function() {
                    $("#successAlert").alert("close");
                }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
            </script>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);

        // Redirect ke halaman recycle bin
        redirect('c_recycleBin/RecycleBin_MIT');
    }

    public function hapus_permanen_mit($id_rb_mit) {
        // Panggil fungsi hapus permanen dari model
        $this->Recycle_bin_model->hapus_permanen_mit($id_rb_mit);
        $alert_pesan = '
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px">
            Data Berhasil di hapus Permanen!
        </div>
         <script>
            // Menetapkan waktu timeout untuk alert
            setTimeout(function() {
                $("#successAlert").alert("close");
            }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
        </script>
        ';
        $this->session->set_flashdata('pesan', $alert_pesan);

        // Redirect ke halaman recycle bin
        redirect('c_recycleBin/RecycleBin_MIT');
    }

    // Recycle Bin Arsip Boss
    public function RecycleBin_Arbos() {
        $data['title'] = "BackOffice | Recycle Bin - ARBOS";
        $data['title1'] = "Halaman Recycle Bin";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        
        // Ambil data recycle bin dari model
        $data['recycle_bin_data'] = $this->Recycle_bin_model->get_RecycleBin_Arbos();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('recycleBin_Arbos_view', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function restore_arbos($id_rb_arboss) {
        // Panggil fungsi restore dari model
        $this->Recycle_bin_model->restore_arbos($id_rb_arboss);
        $alert_pesan = '
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px">
                Data Berhasil di Restore!
            </div>
             <script>
                // Menetapkan waktu timeout untuk alert
                setTimeout(function() {
                    $("#successAlert").alert("close");
                }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
            </script>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);

        // Redirect ke halaman recycle bin
        redirect('c_recycleBin/RecycleBin_Arbos');
    }

    public function hapus_permanen_arbos($id_rb_arbos) {
        // Panggil fungsi hapus permanen dari model
        $this->Recycle_bin_model->hapus_permanen_arbos($id_rb_arbos);
        $alert_pesan = '
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px">
            Data Berhasil di hapus Permanen!
        </div>
         <script>
            // Menetapkan waktu timeout untuk alert
            setTimeout(function() {
                $("#successAlert").alert("close");
            }, 3000); // Waktu dalam milidetik (5 detik dalam contoh ini)
        </script>
        ';
        $this->session->set_flashdata('pesan', $alert_pesan);

        // Redirect ke halaman recycle bin
        redirect('c_recycleBin/RecycleBin_Arbos');
    }
}
