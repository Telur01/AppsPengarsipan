<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_dokumentasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokumentasi_rapat_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = "DPMPTSP | Dokumentasi Rapat";
        $data['title1'] = "Dokumentasi Rapat";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data['data_dokumentasi'] = $this->dokumentasi_rapat_model->getDataDokumentasi($tanggal_awal, $tanggal_akhir);

        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokumentasi_rapat_view', $data);
            $this->load->view('templates/footer', $data);
        } elseif($data['user']['level'] === 'kepala_bagian'){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_leader');
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokumentasi_rapat_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_staff');
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokumentasi_rapat_view', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function tambah_data()
    {

        $this->form_validation->set_rules('waktu', 'Waktu', 'required', 
        [ 'required' => 'Field *waktu* tidak boleh kosong!']);
        $this->form_validation->set_rules('nama', 'Nama Kegiatan', 'required', 
        [ 'required' => 'Field *Nama Kegiatan* tidak boleh kosong!']);
        $this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'required', 
        [ 'required' => 'Field *Tempat Kegiatan* tidak boleh kosong!']);
        $this->form_validation->set_rules('peserta', 'Peserta Kegiatan', 'required', 
        [ 'required' => 'Field *Peserta Kegiatan* tidak boleh kosong!']);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', 
        [ 'required' => 'Field *Keterangan* tidak boleh kosong!']);

        if ($this->form_validation->run() == false) {
            $data['title'] = "DPMPTSP | Dokumentasi Rapat";
            $data['title1'] = "Tambah Dokumentasi Rapat";
            $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
            $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            if($data['user']['level'] === 'administrator'){
                $this->load->view('templates/sidebar_admin');
            }  else {
                $this->load->view('templates/sidebar_staff');
            }
            $this->load->view('templates/topbar', $data);
            $this->load->view('form_tambah/form_tambah_dokumentasi');
            $this->load->view('templates/footer', $data);
        } else {
            $this->dokumentasi_rapat_model->tambah_data();
            $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
            $this->session->set_flashdata('pesan', $alert_pesan);
            redirect('c_dokumentasi');
        }
    }

    public function edit_data($id_dokumentasi)
    {
        $this->dokumentasi_rapat_model->edit_data($id_dokumentasi);
        $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil diUpdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);
        redirect('c_dokumentasi');
    }

    public function hapus_data($id_dokumentasi)
    {
        $this->dokumentasi_rapat_model->hapus_data($id_dokumentasi);
        $alert_pesan = '
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px">
                Data Berhasil dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        $this->session->set_flashdata('pesan', $alert_pesan);
        redirect('c_dokumentasi');
    }

    public function lihat_data($id_dokumentasi)
    {
        $data['title'] = "DPMPTSP | Dokumentasi Rapat";
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu 2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['document'] = $this->dokumentasi_rapat_model->getIdDataDokumentasi($id_dokumentasi);

        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } elseif($data['user']['level'] === 'kepala_bagian'){
            $this->load->view('templates/sidebar_leader');
        } else {
            $this->load->view('templates/sidebar_staff');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('lihat_dokumen/lihat_dokumen_dokrap', $data);
        $this->load->view('templates/footer', $data);
    }

    public function laporan()
    {
        $data['title'] = 'BackOffice | Dokumentasi Rapat';
        $data['title1'] = 'Laporan Dokumentasi Rapat';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_dokrap');
        $this->load->view('templates/footer', $data);
    }

    public function filter_tanggal()
    {
        // Ambil tanggal awal dan tanggal akhir dari input GET
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');


        $data['title'] = 'BackOffice | Dokumentasi Rapat';
        $data['title1'] = 'Laporan Dokumentasi Rapat';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';

        // Tambahkan kondisi untuk menentukan apakah tabel harus ditampilkan
        $data['show_table'] = !empty($tanggal_awal) && !empty($tanggal_akhir);

        if ($data['show_table']) {
            // Jika tanggal_awal dan tanggal_akhir diisi, filter data
            $data['data_dokumentasi'] = $this->dokumentasi_rapat_model->getDataDokumentasi($tanggal_awal, $tanggal_akhir);
        }

        // Tambahkan tanggal_awal dan tanggal_akhir ke data yang dikirimkan ke tampilan
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_dokrap', $data);
        $this->load->view('templates/footer', $data);
    }

    public function filter_bulan()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        // Panggil model untuk mengambil data berdasarkan bulan dan tahun
        $data['data_dokumentasi'] = $this->dokumentasi_rapat_model->getDataByBulanTahun($bulan, $tahun);

        $data['show_table'] = true; // Menampilkan tabel hasil filter

        // Set data bulan dan tahun
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['title'] = 'BackOffice | Dokumentasi Rapat';
        $data['title1'] = 'Laporan Dokumentasi Rapat';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_dokrap', $data);
        $this->load->view('templates/footer', $data);
    }

    public function filter_tahun()
    {
        $tahun = $this->input->get('tahun');


        $data['data_dokumentasi'] = $this->dokumentasi_rapat_model->filterByTahun($tahun);

        $data['show_table'] = true;
        $data['tahun'] = $tahun;

        $data['title'] = 'BackOffice | Dokumentasi Rapat';
        $data['title1'] = 'Laporan Dokumentasi Rapat';
        $data['footer'] = 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  2023';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        if($data['user']['level'] === 'administrator'){
            $this->load->view('templates/sidebar_admin');
        } else {
            $this->load->view('templates/sidebar_leader');
        }
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_dokrap', $data);
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


        $data['title'] = 'Rekap Data Dokumentasi Rapat';

        // Memanggil model dengan filter yang sesuai
        if (!empty($bulan) && !empty($tahun)) {
            $data['data_dokumentasi'] = $this->dokumentasi_rapat_model->getDataByBulanTahun($bulan, $tahun);
        } elseif (!empty($tahun)) {
            $data['data_dokumentasi'] = $this->dokumentasi_rapat_model->filterByTahun($tahun);
        } elseif (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
            $data['data_dokumentasi'] = $this->dokumentasi_rapat_model->getDataDokumentasi($tanggal_awal, $tanggal_akhir);
        }

        $this->load->view('cetak_laporan/cetak_laporan_dokrap', $data);
    }
}
