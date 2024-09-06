<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_monitoring extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('monitoring_model');
    }

    public function index()
    {
        $data['title'] = "DPMPTSP | Halaman Data Monitoring Izin Terbit";
        $data['title1'] = "Halaman Monitoring Izin terbit";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data['data_monitoring'] = $this->monitoring_model->getDataMonitoring($tanggal_awal, $tanggal_akhir);

        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('monitoring_view', $data);
            $this->load->view('templates/footer', $data);
        } elseif($data['user']['level'] === 'kepala_bagian'){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_leader');
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_kepala_bagian/monitoring_izin_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_staff');
            $this->load->view('templates/topbar', $data);
            $this->load->view('monitoring_view', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function tambah_data()
    {

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required',
        [ 'required' => 'Field *Tanggal* tidak boleh kosong!'] );
        $this->form_validation->set_rules('no_izin', 'No. Izin', 'required',
        [ 'required' => 'Field *No. Izin* tidak boleh kosong!'] );
        $this->form_validation->set_rules('jenis_izin', 'Jenis Izin', 'required',
        [ 'required' => 'Field *Jenis Izin* tidak boleh kosong!'] );
        $this->form_validation->set_rules('jenis_layanan', 'Jenis Layanan', 'required', 
        [ 'required' => 'Field *Jenis Layanan* tidak boleh kosong!'] );
        $this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required', 
        [ 'required' => 'Field *Nama Pemohon* tidak boleh kosong!'] );
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required', 
        [ 'required' => 'Field *Nama Perusahaan* tidak boleh kosong!'] );
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required',
        [ 'required' => 'Field *Alamat Perusahaan* tidak boleh kosong!'] );
        $this->form_validation->set_rules('alamat_persil', 'Alamat Persil', 'required', 
        [ 'required' => 'Field *Alamat Persil* tidak boleh kosong!'] );
        $this->form_validation->set_rules('peruntukan', 'Peruntukan', 'required', 
        [ 'required' => 'Field *Peruntukan* tidak boleh kosong!'] );

        if ($this->form_validation->run() == false) {
            $data['title'] = "DPMPTSP | Halaman Monitoring Izin Terbit";
            $data['title1'] = "Tambah Monitoring Izin Terbit";
            $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
            $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
            $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();


            $this->load->view('templates/header', $data);
            if($data['user']['level'] === 'administrator'){
                $this->load->view('templates/sidebar_admin');
            }  else {
                $this->load->view('templates/sidebar_staff');
            }
            $this->load->view('templates/topbar', $data);
            $this->load->view('form_tambah/form_tambah_monitoring');
            $this->load->view('templates/footer', $data);
        } else {
            $this->monitoring_model->tambah_data();
            $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
            $this->session->set_flashdata('pesan', $alert_pesan);
            redirect('c_monitoring');
        }
    }

    public function edit_data($id_monitoring)
    {
        $this->monitoring_model->edit_data($id_monitoring);
        $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil diUpdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);
        redirect('c_monitoring');
    }

    public function hapus_data($id_monitoring)
    {
        $this->monitoring_model->hapus_data($id_monitoring);
        $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);
        redirect('c_monitoring');
    }

    public function lihat_data($id_peminjaman)
    {
        $data['title'] = "DPMPTSP | Halaman Monitoring Izin Terbit";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['document'] = $this->monitoring_model->getIdDataMonitoring($id_peminjaman);
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } elseif($data['user']['level'] === 'kepala_bagian'){
            $this->load->view('templates/sidebar_leader');
        } else {
            $this->load->view('templates/sidebar_staff');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('lihat_dokumen/lihat_dokumen_monitoring', $data);
        $this->load->view('templates/footer', $data);
    }

    public function laporan()
    {
        $data['title'] = 'BackOffice | Monitoring Izin Terbit';
        $data['title1'] = 'Laporan Monitoring Izin Terbit ';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_monitoring');
        $this->load->view('templates/footer', $data);
    }

    public function filter_tanggal()
    {
        // Ambil tanggal awal dan tanggal akhir dari input GET
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        // Tambahkan kondisi untuk menentukan apakah tabel harus ditampilkan
        $data['show_table'] = !empty($tanggal_awal) && !empty($tanggal_akhir);

        if ($data['show_table']) {
            // Jika tanggal_awal dan tanggal_akhir diisi, filter data
            $data['data_monitoring'] = $this->monitoring_model->getDataMonitoring($tanggal_awal, $tanggal_akhir);
        }

        // Tambahkan tanggal_awal dan tanggal_akhir ke data yang dikirimkan ke tampilan
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['title'] = 'BackOffice | Monitoring Izin Terbit';
        $data['title1'] = 'Laporan Monitoring Izin Terbit ';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_monitoring', $data);
        $this->load->view('templates/footer', $data);
    }

    public function filter_bulan()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        // Panggil model untuk mengambil data berdasarkan bulan dan tahun
        $data['data_monitoring'] = $this->monitoring_model->getDataByBulanTahun($bulan, $tahun);

        $data['show_table'] = true; // Menampilkan tabel hasil filter

        // Set data bulan dan tahun
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['title'] = 'BackOffice | Monitoring Izin Terbit';
        $data['title1'] = 'Laporan Monitoring Izin Terbit ';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_monitoring', $data);
        $this->load->view('templates/footer', $data);
    }

    public function filter_tahun()
    {
        $tahun = $this->input->get('tahun');

        $data['data_monitoring'] = $this->monitoring_model->filterDataByTahun($tahun);

        $data['show_table'] = true;

        $data['tahun'] = $tahun;
        $data['title'] = 'BackOffice | Monitoring Izin Terbit';
        $data['title1'] = 'Laporan Monitoring Izin Terbit ';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_monitoring', $data);
        $this->load->view('templates/footer', $data);
    }

    public function export_excel()
    {

        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        // Memeriksa apakah parameter bulan dan tahun telah disetel dalam filter
        if (!empty($bulan) && !empty($tahun)) {
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
        }

        // Memeriksa apakah parameter tahun telah disetel dalam filter
        if (!empty($tahun)) {
            $data['tahun'] = $tahun;
        }

        // Memeriksa apakah parameter tanggal_awal dan tanggal_akhir telah disetel dalam filter
        if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
            $data['tanggal_awal'] = $tanggal_awal;
            $data['tanggal_akhir'] = $tanggal_akhir;
        }


        $data['title'] = 'Rekap Data Monitoring Izin Terbit';

        // Memanggil model dengan filter yang sesuai
        if (!empty($bulan) && !empty($tahun)) {
            $data['data_monitoring'] = $this->monitoring_model->getDataByBulanTahun($bulan, $tahun);
        } elseif (!empty($tahun)) {
            $data['data_monitoring'] = $this->monitoring_model->filterDataByTahun($tahun);
        } elseif (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
            $data['data_monitoring'] = $this->monitoring_model->getDataMonitoring($tanggal_awal, $tanggal_akhir);
        }

        $this->load->view('cetak_laporan/cetak_laporan_monitoring', $data);
    }
}
