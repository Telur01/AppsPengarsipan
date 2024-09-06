<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recycle_bin_model extends CI_Model {

    // Dokumentasi Rapat
    public function get_RecycleBin_Dokrap() {
        return $this->db->get('tb_rb_dokrap')->result_array();
    }

    public function restore_dokrap($id_rb_dokrap) {
        // Ambil data yang akan direstore dari recycle bin
        $data = $this->db->get_where('tb_rb_dokrap', array('id_rb_dokrap' => $id_rb_dokrap))->row();
    
        // Daftar nama file yang akan dikembalikan
        $files_to_restore = [
            'foto_kegiatan',
            'daftar_hadir',
            'notulen',
            'berita_acara',
            'surat_undangan'
        ];
    
        // Lokasi folder untuk memindahkan file kembali
        $destination_folder = 'assets/document/data_dokumentasi/';
    
        // Loop untuk memindahkan file-file terkait
        foreach ($files_to_restore as $file_field) {
            $source_path = 'assets/document/rb_dokrap/' . $data->$file_field;
            $destination_path = $destination_folder . $data->$file_field;
    
            if (file_exists($source_path) && is_file($source_path)) {
                // Pindahkan file kembali ke folder data dokumen
                rename($source_path, $destination_path);
            }
        }
    
        // Pindahkan data kembali ke tabel dokumen
        $this->db->insert('tb_dokumentasi', $data);
    
        // Hapus data dari recycle bin
        $this->db->delete('tb_rb_dokrap', array('id_rb_dokrap' => $id_rb_dokrap));
    }

    public function hapus_permanen_dokrap($id_rb_dokrap) {
        // Ambil informasi file dari recycle bin
        $data = $this->db->get_where('tb_rb_dokrap', array('id_rb_dokrap' => $id_rb_dokrap))->row();
    
        // Daftar nama file yang akan dihapus permanen
        $files_to_delete_permanently = [
            'foto_kegiatan',
            'daftar_hadir',
            'notulen',
            'berita_acara',
            'surat_undangan'
        ];
    
        // Lokasi folder recycle bin
        $recycle_bin_folder = 'assets/document/rb_dokrap/';
    
        // Loop untuk menghapus file-file permanen dari recycle bin
        foreach ($files_to_delete_permanently as $file_field) {
            $file_path = $recycle_bin_folder . $data->$file_field;
            if (file_exists($file_path) && is_file($file_path)) {
                // Hapus file permanen dari recycle bin
                unlink($file_path);
            }
        }
    
        // Hapus data dari recycle bin
        $this->db->delete('tb_rb_dokrap', array('id_rb_dokrap' => $id_rb_dokrap));
    }

    // Monitoring Izin Terbit
    public function get_RecycleBin_MIT(){
        return $this->db->get('tb_rb_mit')->result_array();
    }

    public function restore_mit($id_rb_mit) {
        // Ambil data yang akan direstore dari recycle bin
        $data = $this->db->get_where('tb_rb_mit', array('id_rb_mit' => $id_rb_mit))->row();
    
        // Daftar nama file yang akan dikembalikan
        $files_to_restore = ['document'];
    
        // Lokasi folder untuk memindahkan file kembali
        $destination_folder = 'assets/document/data_monitoring/';
    
        // Loop untuk memindahkan file-file terkait
        foreach ($files_to_restore as $file_field) {
            $source_path = 'assets/document/rb_mit/' . $data->$file_field;
            $destination_path = $destination_folder . $data->$file_field;
    
            if (file_exists($source_path) && is_file($source_path)) {
                // Pindahkan file kembali ke folder data dokumen
                rename($source_path, $destination_path);
            }
        }
    
        // Pindahkan data kembali ke tabel dokumen
        $this->db->insert('tb_monitoring', $data);
    
        // Hapus data dari recycle bin
        $this->db->delete('tb_rb_mit', array('id_rb_mit' => $id_rb_mit));
    }

    public function hapus_permanen_mit($id_rb_mit) {
        // Ambil informasi file dari recycle bin
        $data = $this->db->get_where('tb_rb_mit', array('id_rb_mit' => $id_rb_mit))->row();
    
        // Daftar nama file yang akan dihapus permanen
        $files_to_delete_permanently = [ 'document'];
    
        // Lokasi folder recycle bin
        $recycle_bin_folder = 'assets/document/rb_mit/';
    
        // Loop untuk menghapus file-file permanen dari recycle bin
        foreach ($files_to_delete_permanently as $file_field) {
            $file_path = $recycle_bin_folder . $data->$file_field;
            if (file_exists($file_path) && is_file($file_path)) {
                // Hapus file permanen dari recycle bin
                unlink($file_path);
            }
        }
    
        // Hapus data dari recycle bin
        $this->db->delete('tb_rb_mit', array('id_rb_mit' => $id_rb_mit));
    }

    // Arsip Boss
    public function get_RecycleBin_Arbos(){
        return $this->db->get('tb_rb_arbos')->result_array();
    }

    public function restore_arbos($id_rb_arboss) {
        // Ambil data yang akan direstore dari recycle bin
        $data = $this->db->get_where('tb_rb_arbos', array('id_rb_arboss' => $id_rb_arboss))->row();
    
        // Daftar nama file yang akan dikembalikan
        $files_to_restore = ['file1'];
    
        // Lokasi folder untuk memindahkan file kembali
        $destination_folder = 'assets/document/data_arsip_boss/';
    
        // Loop untuk memindahkan file-file terkait
        foreach ($files_to_restore as $file_field) {
            $source_path = 'assets/document/rb_arbos/' . $data->$file_field;
            $destination_path = $destination_folder . $data->$file_field;
    
            if (file_exists($source_path) && is_file($source_path)) {
                // Pindahkan file kembali ke folder data dokumen
                rename($source_path, $destination_path);
            }
        }
    
        // Pindahkan data kembali ke tabel dokumen
        $this->db->insert('tb_arsipboss', $data);
    
        // Hapus data dari recycle bin
        $this->db->delete('tb_rb_arbos', array('id_rb_arboss' => $id_rb_arboss));
    }

    public function hapus_permanen_arbos($id_rb_arboss) {
        // Ambil informasi file dari recycle bin
        $data = $this->db->get_where('tb_rb_arbos', array('id_rb_arboss' => $id_rb_arboss))->row();
    
        // Daftar nama file yang akan dihapus permanen
        $files_to_delete_permanently = ['file1', 'file2', 'file3', 'file4', 'file5'];;
    
        // Lokasi folder recycle bin
        $recycle_bin_folder = 'assets/document/rb_arbos/';
    
        // Loop untuk menghapus file-file permanen dari recycle bin
        foreach ($files_to_delete_permanently as $file_field) {
            $file_path = $recycle_bin_folder . $data->$file_field;
            if (file_exists($file_path) && is_file($file_path)) {
                // Hapus file permanen dari recycle bin
                unlink($file_path);
            }
        }
    
        // Hapus data dari recycle bin
        $this->db->delete('tb_rb_arbos', array('id_rb_arboss' => $id_rb_arboss));
    }


    

    
    
    

    
}
