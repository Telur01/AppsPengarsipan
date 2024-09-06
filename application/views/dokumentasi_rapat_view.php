<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">
    <div class="row">
        <div class="col d-flex mb-4">
            <a class="btn btn-primary btn-sm " href="<?= site_url('c_dokumentasi/tambah_data'); ?>">
                <i class="fas fa-plus mr-2"></i> Tambah Dokumentasi Rapat</a>
        </div>
    </div>
    <div class="card shadow " style="font-size: 12px">
        <div class="card-header">
            <form class="mb-3" method="GET" action="">
                <div class="row">
                    <div class="col-3">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" class="form-control form-control-sm" name="tanggal_awal" id="tanggal_awal" value="<?php echo (date('Y-m-d', time())); ?>">
                    </div>
                    <div class="col-3">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control form-control-sm" name="tanggal_akhir" id="tanggal_akhir" value="<?php echo (date('Y-m-d', time())); ?>">
                    </div>
                    <div class="col-3 mt-1">
                        <button class="btn btn-success btn-sm mt-4" type="submit"><i class="fas fa-eye mr-2"></i> Tampilkan Data</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive ">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="font-weight-bold text-center">
                            <td>No.</td>
                            <td>Waktu Kegiatan</td>
                            <td>Nama Kegiatan</td>
                            <td>Tempat Kegiatan</td>
                            <td>Peserta</td>
                            <td>Keterangan</td>
                            <td>Dokumen/file</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_dokumentasi as $dokrap) : ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $dokrap['waktu'] ?>
                                </td>
                                <td>
                                    <?php echo $dokrap['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $dokrap['tempat'] ?>
                                </td>
                                <td>
                                    <?php echo $dokrap['peserta'] ?>
                                </td>
                                <td>
                                    <?php echo $dokrap['keterangan'] ?>
                                </td>

                                <td class="text-center">
                                    <a href="<?php echo site_url('c_dokumentasi/lihat_data/' . $dokrap['id_dokumentasi']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                </td>

                                <td class="text-center">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusModal<?php echo $dokrap['id_dokumentasi']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal<?php echo $dokrap['id_dokumentasi']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- hapus data -->
<?php
$no = 0;
foreach ($data_dokumentasi as $dokrap) :
    $no++; ?>
    <div class="modal fade" id="hapusModal<?php echo $dokrap['id_dokumentasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo form_open('c_dokumentasi/hapus_data/' . $dokrap['id_dokumentasi']) ?>
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan menghapus data ini ?<br>
                    </h5>
                </div>
                <div class="modal-body d-flex align-content-center justify-content-center">
                    <span class="text-danger">
                        <?= $dokrap['waktu'] ?> |
                        <?= $dokrap['nama'] ?>
                    </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Hapus</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- edit data -->
<?php
$no = 0;
foreach ($data_dokumentasi as $dokrap) :
    $no++; ?>
    <div class="modal fade" id="editModal<?php echo $dokrap['id_dokumentasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class=" modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title text-light text-sm">Edit Data Dokumentasi Rapat</h6>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('c_dokumentasi/edit_data/' . $dokrap['id_dokumentasi']) ?>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="form-label">Waktu Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="datetime-local" class="form-control form-control-sm" id="form-label" name="waktu" value="<?= $dokrap['waktu'] ?>">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="form-label">Nama Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="form-label" name="nama" value="<?= $dokrap['nama'] ?>">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="form-label">Tempat Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="form-label" name="tempat" value="<?= $dokrap['tempat'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="form-label">Peserta Kegiatan</label>
                            <textarea class="form-control form-control-sm " rows="2" name="peserta"><?= $dokrap['peserta'] ?></textarea>
                        </div>
                        <div class="col mb-3">
                            <label for="form-label">Keterangan</label>
                            <textarea class="form-control form-control-sm " rows="2" name="keterangan"><?= $dokrap['keterangan'] ?></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="foto_kegiatan">Foto Kegiatan</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto_kegiatan" id="foto_kegiatan">
                                <label class="custom-file-label text-xs" for="foto_kegiatan">
                                    <?php echo $dokrap['foto_kegiatan']; ?>
                                </label>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="daftar_hadir">Daftar hadir</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="daftar_hadir" id="daftar_hadir">
                                <label class="custom-file-label text-xs" for="daftar_hadir">
                                    <?php echo $dokrap['daftar_hadir']; ?>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="notulen">Notulen</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="notulen" id="notulen">
                                <label class="custom-file-label text-xs" for="notulen">
                                    <?php echo $dokrap['notulen']; ?>
                                </label>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="berita_acara">Berita Acara</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="berita_acara" id="berita_acara">
                                <label class="custom-file-label text-xs" for="berita_acara">
                                    <?php echo $dokrap['berita_acara']; ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="surat_undangan">Surat Undangan</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="surat_undangan" id="surat_undangan">
                                <label class="custom-file-label text-xs" for="surat_undangan">
                                    <?php echo $dokrap['surat_undangan']; ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>