<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getDataUser()
    {
        return $this->db->get('tb_user')->result_array();
    }

    public function get_user_by_id($id_user){
        return $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
    }

    public function getBiodataByUserId() {
        $id_user = $this->session->userdata('id_biodata');
        return $this->db->get_where('tb_biodata', array('id_biodata' => $id_user));
    }

    public function getBiodataByUser($id) {
        return $this->db->get_where('tb_biodata', array('id_biodata' => $id))->row();
    }


    public function tambah_data()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'kode_user' => $this->input->post('kode_user'),
            'id_biodata' => $this->input->post('id_biodata'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'level' => $this->input->post('level'),
            'date_created' => date('Y-m-d H:i:s'),
        ];

        $biodata = [
            'photo_profile' => base_url('assets/img/undraw_profile.svg'),
            'id_biodata' => $this->input->post('id_biodata'),
        ];

        $this->db->insert('tb_user', $data);
        $this->db->insert('tb_biodata', $biodata);
    }

    public function edit_data($id_biodata)
    {
        // Mendapatkan data lama berdasarkan id_biodata
        $dataLama = $this->getIdDataBiodata($id_biodata);

        // Konfigurasi Upload
        $config['upload_path'] = 'assets/document/photo_profile';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;

        // Daftar File yang akan diupload
        $daftarFile = ['photo_profile'];

        foreach ($daftarFile as $file) {
            // Cek apakah file diupload
            if ($this->upload->do_upload($file)) {
                $fileData = $this->upload->data();
                $data[$file] = $fileData['file_name'];
            } else {
                // Jika gagal upload, gunakan data lama
                $data[$file] = $dataLama[$file];
                $error = $this->upload->display_errors();
                echo $error;
            }
        }

        // Mendapatkan data dari form
        $dataForm = [
            'NIP' => $this->input->post('NIP'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jk' => $this->input->post('jk'),
            'golongan_darah' => $this->input->post('golongan_darah'),
            'agama' => $this->input->post('agama'),
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            'dusun' => $this->input->post('dusun'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kab_kota' => $this->input->post('kab_kota'),
            'kode_pos' => $this->input->post('kode_pos'),
            'provinsi' => $this->input->post('provinsi'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
        ];

        // Menggabungkan data lama dengan data dari form
        $data = array_merge($dataLama, $dataForm);

        // Memperbarui data ke database berdasarkan id_biodata
        $this->db->where('id_biodata', $id_biodata);
        $this->db->update('tb_biodata', $data);
    }

    public function generateKodeUser()
    {
        // Mengambil kode_user tertinggi dari tabel tb_user
        $this->db->select_max('kode_user');
        $query = $this->db->get('tb_user');
        $result = $query->row();
        $max_kode_user = $result->kode_user;

        // Jika tidak ada data sebelumnya, inisialisasi dengan angka 1
        if (empty($max_kode_user)) {
            $kode_user = 'US001';
        } else {
            // Ambil angka dari kode_user terakhir dan tambahkan 1
            $angka_terakhir = (int) substr($max_kode_user, 4);
            $angka_berikutnya = $angka_terakhir + 1;
            $kode_user = 'US00' . $angka_berikutnya;
        }

        return $kode_user;
    }

    public function hapus_data($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');
    }

    public function reset_user_password($id_user, $new_password)
    {
        $data = array('password' => $new_password);

        // Implementasi untuk menyimpan password baru ke database
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);
    }

    public function GenerateIdBiodata()
    {

        // Mengambil id biodata tertinggi dari tabel tb_user
        $this->db->select_max('id_biodata');
        $query = $this->db->get('tb_user');
        $result = $query->row();
        $max_id_biodata = $result->id_biodata;

        // Inisialisasi ID biodata dengan angka 1 jika tidak ada data sebelumnya
        $id_biodata = empty($max_id_biodata) ? '1' : $max_id_biodata + 1;

        return $id_biodata;
    }

    public function proses_update_biodata()
    {
        // Dapatkan ID biodata dari sesi
        $id_biodata = $this->session->userdata('id_biodata');

        // Data untuk update
        $data = array(
            'NIP' => $this->input->post('NIP'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jk' => $this->input->post('jk'),
            'golongan_darah' => $this->input->post('golongan_darah'),
            'agama' => $this->input->post('agama'),
            'dusun' => $this->input->post('dusun'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kab_kota' => $this->input->post('kab_kota'),
            'kode_pos' => $this->input->post('kode_pos'),
            'provinsi' => $this->input->post('provinsi'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'), 
        );

        // Konfigurasi untuk upload 
        $config['upload_path'] = './assets/document/photo_profile/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        // Menggunakan daftar file untuk diupdate
        $daftar_file = ['photo_profile'];

        foreach ($daftar_file as $file) {
            if ($this->upload->do_upload($file)) {
                $file_data = $this->upload->data();
                $data[$file] = $file_data['file_name'];

                // Menghapus file lama jika ada
                if ($fileLama_info[$file]) {
                    $file_path = './assets/document/photo_profile/' . $fileLama_info[$file];
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
        }

        // Update data biodata
        $this->db->where('id_biodata', $id_biodata);
        $this->db->update('tb_biodata', $data);
    }

}
