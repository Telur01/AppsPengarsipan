<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">
    <!-- button_view.php -->
    <div class="row">
        <div class="col d-flex">
            <a class="btn btn-primary btn-sm mb-4" href="<?= site_url('c_monitoring/tambah_data'); ?>">
                <i class="fas fa-plus mr-2"></i> Tambah Data Monitoring Izin Terbit</a>
        </div>
    </div>

    <div class="card shadow " style="font-size: 12px">
        <div class="card-header">
            <form class="mb-3" method="GET" action="">
                <div class="row">
                    <div class="col-3">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" class="form-control form-control-sm" id="tanggal_awal" name="tanggal_awal" value="<?php echo (date('Y-m-d', time())); ?>">
                    </div>
                    <div class="col-3">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control form-control-sm" id="tanggal_akhir" name="tanggal_akhir" value="<?php echo (date('Y-m-d', time())); ?>">
                    </div>
                    <div class="col-3 mt-3 pt-2">
                        <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-eye mr-2"></i> Tampilkan Data</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive " style="font-size: 13px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="font-weight-bold text-center">
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>No. Izin</td>
                            <td>Jenis izin</td>
                            <td>Jenis Layanan</td>
                            <td>Nama Pemohon</td>
                            <td>Nama Perusahaan</td>
                            <td>Alamat Perusahaan</td>
                            <td>Alamat Persil</td>
                            <td>Peruntukan</td>
                            <td>Dokumen/file</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_monitoring as $dm) : ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $dm['tanggal'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['no_izin'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['jenis_izin'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['jenis_layanan'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['nama_pemohon'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['nama_perusahaan'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['alamat_perusahaan'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['alamat_persil'] ?>
                                </td>
                                <td>
                                    <?php echo $dm['peruntukan'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('c_monitoring/lihat_data/' . $dm['id_monitoring']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
                                        Lihat
                                </td>
                                <td class="text-center">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusModal<?php echo $dm['id_monitoring']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal<?php echo $dm['id_monitoring']; ?>">
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
<!-- /.container-fluid -->

<!-- hapus data -->
<?php
$no = 0;
foreach ($data_monitoring as $monitoring) :
    $no++; ?>
    <div class="modal fade" id="hapusModal<?php echo $monitoring['id_monitoring']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo form_open('c_monitoring/hapus_data/' . $monitoring['id_monitoring']) ?>
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan menghapus data ini ?<br>
                    </h5>
                </div>
                <div class="modal-body d-flex align-content-center justify-content-center">
                    <span class="text-danger">
                        <?= $monitoring['tanggal'] ?> |
                        <?= $monitoring['no_izin'] ?>

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

<!-- Edit Data -->
<?php
$no = 0;
foreach ($data_monitoring as $monitoring) :
    $no++ ?>
    <div class="modal fade" id="editModal<?php echo $monitoring['id_monitoring']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class=" modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title text-light text-sm">Edit Data Dokumentasi Rapat</h6>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('c_monitoring/edit_data/' . $monitoring['id_monitoring']) ?>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="tanggal">Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?= $monitoring['tanggal'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="no_izin">No. Izin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="no_izin" name="no_izin" value="<?= $monitoring['no_izin'] ?>">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="jenis_izin">Jenis Izin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="jenis_izin" name="jenis_izin" value="<?= $monitoring['jenis_izin'] ?>">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="jenis_layanan">Jenis Layanan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="jenis_layanan" name="jenis_layanan" value="<?= $monitoring['jenis_layanan'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama_pemohon">Nama Pemohon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="nama_pemohon" name="nama_pemohon" value="<?= $monitoring['nama_pemohon'] ?>">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="nama_perusahaan" name="nama_perusahaan" value="<?= $monitoring['nama_perusahaan'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="alamat_perusahaan">Alamat Perusahaan</label>
                            <textarea class="form-control form-control-sm " rows="2" name="alamat_perusahaan"><?= $monitoring['alamat_perusahaan'] ?></textarea>
                        </div>
                        <div class="col mb-3">
                            <label for="alamat_persil">Alamat Persil</label>
                            <textarea class="form-control form-control-sm " rows="2" name="alamat_persil"><?= $monitoring['alamat_persil'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="peruntukan">Peruntukan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm " id="peruntukan" name="peruntukan" value="<?= $monitoring['peruntukan'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="document">Document</label>
                            <div class="input-group mb-3 text-xs">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="document" name="document">
                                    <label class="custom-file-label" for="document">
                                        <?= $monitoring['document'] ?>
                                    </label>
                                </div>
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