<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dokumentasi_rapat_model extends CI_Model
{
    public function getDataDokumentasi($tanggal_awal = null, $tanggal_akhir = null)
    {
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('waktu >=', $tanggal_awal);
            $this->db->where('waktu <=', $tanggal_akhir);
        }
        return $this->db->get('tb_dokumentasi')->result_array();
    }

    public function getIdDataDokumentasi($id_dokumentasi)
    {
        return $this->db->get_where('tb_dokumentasi', ['id_dokumentasi' => $id_dokumentasi])->row_array();
    }

    public function tambah_data()
    {
        //  Data yang akan ditambahkan 
        $data = array(
            "waktu" => $this->input->post('waktu'),
            "nama" => $this->input->post('nama'),
            "tempat" => $this->input->post('tempat'),
            "peserta" => $this->input->post('peserta'),
            "keterangan" => $this->input->post('keterangan'),
        );

        // konfigurasi Upload
        $config['upload_path'] = 'assets/document/data_dokumentasi';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        // Daftar File yang akan di upload
        $Daftar_File = ['foto_kegiatan', 'daftar_hadir', 'notulen', 'berita_acara', 'surat_undangan'];

        foreach ($Daftar_File as $file) {
            if ($this->upload->do_upload($file)) {
                $file_data = $this->upload->data();
                $data[$file] = $file_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                echo $error;
            }
        }

        // Setelah unggah file, lanjutkan dengan menyimpan data ke database
        $this->db->insert('tb_dokumentasi', $data);
    }

    public function edit_data($id_dokumentasi)
    {
        // Data yang akan diedit
        $data = array(
            "waktu" => $this->input->post('waktu'),
            "nama" => $this->input->post('nama'),
            "tempat" => $this->input->post('tempat'),
            "peserta" => $this->input->post('peserta'),
            "keterangan" => $this->input->post('keterangan'),
        );

        // Konfigurasi untuk upload 
        $config['upload_path'] = 'assets/document/data_dokumentasi';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        // mengambil file data lama
        $fileLama_info = $this->getIdDataDokumentasi($id_dokumentasi);

        // daftar file yang akan di update
        $Daftar_File = ['foto_kegiatan', 'daftar_hadir', 'notulen', 'berita_acara', 'surat_undangan'];

        foreach ($Daftar_File as $file) {
            if ($this->upload->do_upload($file)) {
                $file_data = $this->upload->data();
                $data[$file] = $file_data['file_name'];

                // Menghapus file lama jika ada
                if ($fileLama_info[$file]) {
                    $file_path = 'assets/document/data_dokumentasi/' . $fileLama_info[$file];
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }
        }

        // Setelah unggah file, lanjutkan dengan menyimpan data yang telah diubah ke database
        $this->db->where('id_dokumentasi', $id_dokumentasi);
        $this->db->update('tb_dokumentasi', $data);
    }

    public function hapus_data($id_dokumentasi) {
        // Ambil data yang akan dihapus
        $data = $this->db->get_where('tb_dokumentasi', array('id_dokumentasi' => $id_dokumentasi))->row();

        // Daftar nama file yang akan dipindahkan
        $files_to_move = [
            'foto_kegiatan',
            'daftar_hadir',
            'notulen',
            'berita_acara',
            'surat_undangan'
        ];

         // Lokasi folder untuk memindahkan file
        $destination_folder = 'assets/document/rb_dokrap/';

        // Loop untuk memindahkan file-file terkait
        foreach ($files_to_move as $file_field) {
            $source_path = 'assets/document/data_dokumentasi/' . $data->$file_field;
            $destination_path = $destination_folder . $data->$file_field;
    
            if (file_exists($source_path) && is_file($source_path)) {
                // Pindahkan file ke folder recycle bin
                rename($source_path, $destination_path);
            }
        }

        // Pindahkan data ke recycle bin
        $this->db->insert('tb_rb_dokrap', $data);

        // Hapus data dari tabel asli
        $this->db->delete('tb_dokumentasi', array('id_dokumentasi' => $id_dokumentasi));
    }


    public function getDataByBulanTahun($bulan, $tahun)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai di database Anda
        $this->db->select('*');
        $this->db->from('tb_dokumentasi');

        // Mengambil bulan dan tahun dari kolom 'waktu'
        $this->db->where('MONTH(waktu)', $bulan);
        $this->db->where('YEAR(waktu)', $tahun);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function filterByTahun($tahun)
    {
        // Menggunakan Active Record untuk mengambil data berdasarkan tahun
        $this->db->select('*');
        $this->db->from('tb_dokumentasi');
        $this->db->where('YEAR(waktu)', $tahun); // Filter berdasarkan tahun
        $query = $this->db->get();

        return $query->result_array();
    }
}
