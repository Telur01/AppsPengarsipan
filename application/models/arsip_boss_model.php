<?php
defined('BASEPATH') or exit('No direct script access allowed');

class arsip_boss_model extends CI_Model
{
    public function getDataArsipBoss($tanggal_awal = null, $tanggal_akhir = null)
    {
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('date_created >=', $tanggal_awal);
            $this->db->where('date_created <=', $tanggal_akhir);
        }
        return $this->db->get('tb_arsipboss')->result_array();
    }

    public function getIdArsipBoss($id_arsipboss)
    {
        return $this->db->get_where('tb_arsipboss', ['id_arsipboss' => $id_arsipboss])->row_array();
    }

    public function tambah_data()
    {

        date_default_timezone_set('Asia/Jakarta');
        $data = [
            "no_pendaftaran" => $this->input->post('no_pendaftaran'),
            "no_sk_lengkap" => $this->input->post('no_sk_lengkap'),
            "jenis_izin" => $this->input->post('jenis_izin'),
            "jenis_layanan" => $this->input->post('jenis_layanan'),
            "nama_pemohon" => $this->input->post('nama_pemohon'),
            "nama_perusahaan" => $this->input->post('nama_perusahaan'),
            "alamat_perusahaan" => $this->input->post('alamat_perusahaan'),
            "alamat_persil" => $this->input->post('alamat_persil'),
            "kecamatan" => $this->input->post('kecamatan'),
            "kelurahan" => $this->input->post('kelurahan'),
            "wilayah" => $this->input->post('wilayah'),
            "peruntukan" => $this->input->post('peruntukan'),
            "tanggal_ttd" => $this->input->post('tanggal_ttd'),
            "ruang" => $this->input->post('ruang'),
            "rak" => $this->input->post('rak'),
            "box" => $this->input->post('box'),
            "bulan" => $this->input->post('bulan'),
            "tahun" => $this->input->post('tahun'),
            "date_created" => date('Y-m-d H:i:s'),
        ];

        // Konfigurasi Upload
        $config['upload_path'] = 'assets/document/data_arsip_boss';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        // Daftar File yang akan di Upload
        $Daftar_File = ['file1'];

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
        $this->db->insert('tb_arsipboss', $data);
    }

    public function edit_data($id_arsipboss)
    {
        // Data yang akan di Update
        $data = array(
            "no_pendaftaran" => $this->input->post('no_pendaftaran'),
            "no_sk_lengkap" => $this->input->post('no_sk_lengkap'),
            "jenis_izin" => $this->input->post('jenis_izin'),
            "jenis_layanan" => $this->input->post('jenis_layanan'),
            "nama_pemohon" => $this->input->post('nama_pemohon'),
            "nama_perusahaan" => $this->input->post('nama_perusahaan'),
            "alamat_perusahaan" => $this->input->post('alamat_perusahaan'),
            "alamat_persil" => $this->input->post('alamat_persil'),
            "kecamatan" => $this->input->post('kecamatan'),
            "kelurahan" => $this->input->post('kelurahan'),
            "wilayah" => $this->input->post('wilayah'),
            "peruntukan" => $this->input->post('peruntukan'),
            "tanggal_ttd" => $this->input->post('tanggal_ttd'),
            "ruang" => $this->input->post('ruang'),
            "rak" => $this->input->post('rak'),
            "box" => $this->input->post('box'),
            "bulan" => $this->input->post('bulan'),
            "tahun" => $this->input->post('tahun'),
            "date_created" => date('Y-m-d H:i:s'),
        );

        // Konfigurasi Upload

        $config['upload_path'] = 'assets/document/data_arsip_boss';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 5120;

        $this->load->library('upload', $config);

        // mengambil file data lama
        $fileLama_info = $this->getIdArsipBoss($id_arsipboss);

        // Daftar File yang akan di Update
        $Daftar_File = ['file1'];

        foreach ($Daftar_File as $file) {
            if ($this->upload->do_upload($file)) {
                $file_data = $this->upload->data();
                $data[$file] = $file_data['file_name'];

                // Menghapus file lama jika ada
                if ($fileLama_info[$file]) {
                    $file_path = 'assets/document/data_arsip_boss/' . $fileLama_info[$file];
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }
        }

        // Setelah unggah file, lanjutkan dengan menyimpan data yang telah diubah ke database
        $this->db->where('id_arsipboss', $id_arsipboss);
        $this->db->update('tb_arsipboss', $data);
    }

    public function hapus_data($id_arsipboss) {
        // Ambil data yang akan dihapus
        $data = $this->db->get_where('tb_arsipboss', array('id_arsipboss' => $id_arsipboss))->row();

        // Daftar nama file yang akan dipindahkan
        $files_to_move = ['file1'];

         // Lokasi folder untuk memindahkan file
        $destination_folder = 'assets/document/rb_arbos/';

        // Loop untuk memindahkan file-file terkait
        foreach ($files_to_move as $file_field) {
            $source_path = 'assets/document/data_arsip_boss/' . $data->$file_field;
            $destination_path = $destination_folder . $data->$file_field;
    
            if (file_exists($source_path) && is_file($source_path)) {
                // Pindahkan file ke folder recycle bin
                rename($source_path, $destination_path);
            }
        }

        // Pindahkan data ke recycle bin
        $this->db->insert('tb_rb_arbos', $data);

        // Hapus data dari tabel asli
        $this->db->delete('tb_arsipboss', array('id_arsipboss' => $id_arsipboss));
    }
    
    public function getDataByBulanTahun($bulan, $tahun)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai di database Anda
        $this->db->select('*');
        $this->db->from('tb_arsipboss');

        // Mengambil bulan dan tahun dari kolom 'waktu'
        $this->db->where('MONTH(date_created)', $bulan);
        $this->db->where('YEAR(date_created)', $tahun);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function filterByTahun($tahun)
    {
        // Menggunakan Active Record untuk mengambil data berdasarkan tahun
        $this->db->select('*');
        $this->db->from('tb_arsipboss');
        $this->db->where('YEAR(date_created)', $tahun); // Filter berdasarkan tahun
        $query = $this->db->get();

        return $query->result_array();
    }
}
