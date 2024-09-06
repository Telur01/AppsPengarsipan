<?php
defined('BASEPATH') or exit('No direct script access allowed');

class monitoring_model extends CI_Model
{
    public function getDataMonitoring($tanggal_awal = null, $tanggal_akhir = null)
    {
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('tanggal >=', $tanggal_awal);
            $this->db->where('tanggal <=', $tanggal_akhir);
        }
        return $this->db->get('tb_monitoring')->result_array();
    }

    public function getIdDataMonitoring($id_monitoring)
    {
        return $this->db->get_where('tb_monitoring', ['id_monitoring' => $id_monitoring])->row_array();
    }


    public function tambah_data()
    {
        // Data yang akan ditambahkan
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'no_izin' => $this->input->post('no_izin'),
            'jenis_izin' => $this->input->post('jenis_izin'),
            'jenis_layanan' => $this->input->post('jenis_layanan'),
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
            'alamat_persil' => $this->input->post('alamat_persil'),
            'peruntukan' => $this->input->post('peruntukan'),
        ];

        // Konfigurasi Upload
        $config['upload_path'] = 'assets/document/data_monitoring';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        // Daftar File yang akan di upload

        // Daftar File yang akan di upload
        $Daftar_File = ['document'];

        foreach ($Daftar_File as $file) {
            if ($this->upload->do_upload($file)) {
                $file_data = $this->upload->data();
                $data[$file] = $file_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                echo $error;
            }
        }

        // Setelah Upload File, Dilanjukan dengan menyimpan ke dalam database
        $this->db->insert('tb_monitoring', $data);
    }

    public function edit_data($id_monitoring)
    {
        // Data yang akan diupdate
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'no_izin' => $this->input->post('no_izin'),
            'jenis_izin' => $this->input->post('jenis_izin'),
            'jenis_layanan' => $this->input->post('jenis_layanan'),
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
            'alamat_persil' => $this->input->post('alamat_persil'),
            'peruntukan' => $this->input->post('peruntukan'),
        ];

        // Konfigurasi Upload
        $config['upload_path'] = 'assets/document/data_monitoring';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        // mengambil file data lama
        $fileLama_info = $this->getIdDataMonitoring($id_monitoring);

        // Daftar File yang akan di update
        $Daftar_File = ['document'];

        foreach ($Daftar_File as $file) {
            if ($this->upload->do_upload($file)) {
                $file_data = $this->upload->data();
                $data[$file] = $file_data['file_name'];

                // Menghapus file lama jika ada
                if ($fileLama_info[$file]) {
                    $file_path = 'assets/document/data_monitoring/' . $fileLama_info[$file];
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }
        }

        // Setelah unggah file, lanjutkan dengan menyimpan data yang telah diubah ke database
        $this->db->where('id_monitoring', $id_monitoring);
        $this->db->update('tb_monitoring', $data);
    }

    public function hapus_data($id_monitoring) {
        // Ambil data yang akan dihapus
        $data = $this->db->get_where('tb_monitoring', array('id_monitoring' => $id_monitoring))->row();

        // Daftar nama file yang akan dipindahkan
        $files_to_move = ['document'];

         // Lokasi folder untuk memindahkan file
        $destination_folder = 'assets/document/rb_mit/';

        // Loop untuk memindahkan file-file terkait
        foreach ($files_to_move as $file_field) {
            $source_path = 'assets/document/data_monitoring/' . $data->$file_field;
            $destination_path = $destination_folder . $data->$file_field;
    
            if (file_exists($source_path) && is_file($source_path)) {
                // Pindahkan file ke folder recycle bin
                rename($source_path, $destination_path);
            }
        }

        // Pindahkan data ke recycle bin
        $this->db->insert('tb_rb_mit', $data);

        // Hapus data dari tabel asli
        $this->db->delete('tb_monitoring', array('id_monitoring' => $id_monitoring));
    }

    public function getDataByBulanTahun($bulan, $tahun)
    {

        $this->db->select('*');
        $this->db->from('tb_monitoring');

        // Mengambil bulan dan tahun dari kolom 'tanggal'
        $this->db->where('MONTH(tanggal)', $bulan);
        $this->db->where('YEAR(tanggal)', $tahun);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function filterDataByTahun($tahun)
    {
        // Menggunakan Active Record untuk mengambil data berdasarkan tahun
        $this->db->select('*');
        $this->db->from('tb_monitoring');
        $this->db->where('YEAR(tanggal)', $tahun); // Filter berdasarkan tahun
        $query = $this->db->get();

        return $query->result_array();
    }
}
