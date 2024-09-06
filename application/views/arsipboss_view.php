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
            <a class="btn btn-primary btn-sm mb-4" href="<?= site_url('c_arsipboss/tambah_data'); ?>">
                <i class="fas fa-plus mr-2"></i> Tambah Data Arsip Boss</a>
        </div>
    </div>

    <div class="card shadow mb-4" style=" font-size: 12px">
        <div class="card-header">
            <form class="mb-3" method="GET" action="">
                <div class="row">
                    <div class="col-3">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" class="form-control form-control-sm" id="tanggal_awal" name="tanggal_awal">
                    </div>
                    <div class="col-3">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control form-control-sm" id="tanggal_akhir" name="tanggal_akhir">
                    </div>
                    <div class="col-3 mt-3 pt-2">
                        <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-eye mr-2"></i> Tampilkan Data</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="font-weight-bold text-center">
                            <td rowspan="2">No.</td>
                            <td rowspan="2">No. Pendaftaran</td>
                            <td rowspan="2">No. SK Lengkap</td>
                            <td rowspan="2">Jenis Izin</td>
                            <td rowspan="2">Jenis Layanan</td>
                            <td rowspan="2">Nama Pemohon</td>
                            <td rowspan="2">Nama Perusahaan</td>
                            <td rowspan="2">Alamat Perusahaan</td>
                            <td rowspan="2">Alamat Persil</td>
                            <td rowspan="2">Keluruhan</td>
                            <td rowspan="2">Kecamatan</td>
                            <td rowspan="2">Wilayah</td>
                            <td rowspan="2">Peruntukan</td>
                            <td rowspan="2">Tanggal TTD</td>
                            <td colspan="5" class="text-center">Tempat Penyimpanan</td>
                            <td rowspan="2">Dokumen/Files</td>
                            <td rowspan="2">Action</td>
                        </tr>
                        <tr>
                            <td>Ruang</td>
                            <td>Rak</td>
                            <td>Box</td>
                            <td>Bulan</td>
                            <td>Tahun</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_arsip_boss as $arbos) : ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $arbos['no_pendaftaran'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['no_sk_lengkap'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['jenis_izin'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['jenis_layanan'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['nama_pemohon'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['nama_perusahaan'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['alamat_perusahaan'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['alamat_persil'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['kelurahan'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['kecamatan'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['wilayah'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['peruntukan'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['tanggal_ttd'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['ruang'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['rak'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['box'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['bulan'] ?>
                                </td>
                                <td>
                                    <?php echo $arbos['tahun'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('c_arsipboss/lihat_data/' . $arbos['id_arsipboss']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
                                        Lihat
                                </td>
                                <td class="text-center">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusModal<?php echo $arbos['id_arsipboss']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal<?php echo $arbos['id_arsipboss']; ?>">
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


        <!-- /.container-fluid -->
    </div>
    <!-- Modal Edit -->
    <?php
    $no = 0;
    foreach ($data_arsip_boss as $arbos) :
        $no++; ?>
        <div class="modal fade" id="editModal<?php echo $arbos['id_arsipboss']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h6 class="modal-title text-light text-sm">Edit Data Arsip Boss</h6>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('c_arsipboss/edit_data/' . $arbos['id_arsipboss']) ?>

                        <input type="hidden" name="id" value="<?php echo $arbos['id_arsipboss']; ?>">
                        <!-- No Pendaftaran-->
                        <div class="row mb-2">
                            <div class="col">
                                <label for="no_pendaftaran">No. Pendafaran</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="no_pendaftaran" name="no_pendaftaran" value="<?= $arbos['no_pendaftaran']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- No. SK -->
                            <div class="col">
                                <label for="no_sk">No. SK</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="no_sk" name="no_sk" value="<?= $arbos['no_sk']; ?>">
                                </div>
                            </div>
                            <!-- no.SK LENGKAP-->
                            <div class="col">
                                <label for="no_sk_lengkap">No. SK Lengkap</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="no_sk_lengkap" name="no_sk_lengkap" value="<?= $arbos['no_sk_lengkap']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Jenis Izin -->
                            <div class="col">
                                <label for="jenis_izin">Jenis Izin</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="jenis_izin" name="jenis_izin" value="<?= $arbos['jenis_izin']; ?>">
                                </div>
                            </div>

                            <!-- Jenis Layanan-->
                            <div class="col">
                                <label for="jenis_layanan">Jenis Layanan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="jenis_layanan" name="jenis_layanan" value="<?= $arbos['jenis_layanan']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Nama Pemohon -->
                            <div class="col">
                                <label for="nama_pemohon">Nama Pemohon</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="nama_pemohon" name="nama_pemohon" value="<?= $arbos['nama_pemohon']; ?>">
                                </div>
                            </div>
                            <!-- Nama Peusahaan-->
                            <div class="col">
                                <label for="nama_perusahaan">Nama Peusahaan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="nama_perusahaan" value="<?= $arbos['nama_perusahaan']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Alamat Perusahaan -->
                            <div class="col mb-2">
                                <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                <textarea class="form-control form-control-sm " rows="2" name="alamat_perusahaan"><?= $arbos['alamat_perusahaan']; ?></textarea>
                            </div>
                            <!-- Alamat Persil -->
                            <div class="col ">
                                <label for="alamat_persil">Alamat Persil</label>
                                <textarea class="form-control form-control-sm " rows="2" name="alamat_persil"><?= $arbos['alamat_persil']; ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Kelurahan -->
                            <div class="col">
                                <label for="kelurahan">Kelurahan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="kelurahan" name="kelurahan" value="<?= $arbos['kelurahan']; ?>">
                                </div>
                            </div>

                            <!-- Kecamatan-->
                            <div class="col">
                                <label for="kecamatan">Kecamatan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" value="<?= $arbos['kecamatan']; ?>">
                                </div>
                            </div>

                            <!-- Wilayah-->
                            <div class="col">
                                <label for="wilayah">Wilayah</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="wilayah" name="wilayah" value="<?= $arbos['wilayah']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Peruntukan -->
                            <div class="col">
                                <label for="peruntukan">Peruntukan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="peruntukan" name="peruntukan" value="<?= $arbos['peruntukan']; ?>">
                                </div>
                            </div>
                            <!-- tanggal TTD-->
                            <div class="col">
                                <label for="tanggal_ttd">Tanggal TTD</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control form-control-sm" id="tanggal_ttd" name="tanggal_ttd" value="<?= $arbos['tanggal_ttd']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Ruang -->
                            <div class="col">
                                <label for="ruang">Ruang</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-door-open"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="ruang" name="ruang" value="<?= $arbos['ruang']; ?>">
                                </div>
                            </div>
                            <!-- Rak-->
                            <div class="col">
                                <label for="rak">Rak</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-boxes"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="rak" name="rak" value="<?= $arbos['rak']; ?>">
                                </div>
                            </div>
                            <!-- Box-->
                            <div class="col">
                                <label for="box">Box</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-box"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="box" name="box" value="<?= $arbos['box']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Bulan -->
                            <div class="col">
                                <label for="bulan">Bulan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="bulan" name="bulan" value="<?= $arbos['bulan']; ?>">
                                </div>
                            </div>
                            <!-- Tahun-->
                            <div class="col">
                                <label for="tahun">Tahun</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="tahun" name="tahun" value="<?= $arbos['tahun']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <!-- Dokument 1 -->
                            <div class="col">
                                <label for="file1">Document-1</label>
                                <div class="input-group mb-3 text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file1" name="file1">
                                        <label class="custom-file-label" for="file1">
                                            <?= $arbos['file1']; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Dokument 2 -->
                            <div class="col">
                                <label for="file2">Document-2</label>
                                <div class="input-group mb-3 text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file2" name="file2">
                                        <label class="custom-file-label" for="file2">
                                            <?= $arbos['file2']; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Dokument 3 -->
                            <div class="col">
                                <label for="file3">Document-3</label>
                                <div class="input-group mb-3 text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file3" name="file3">
                                        <label class="custom-file-label" for="file3">
                                            <?= $arbos['file3']; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Dokument 4 -->
                            <div class="col">
                                <label for="file4">Document-4</label>
                                <div class="input-group mb-3 text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file4" name="file4">
                                        <label class="custom-file-label" for="file4">
                                            <?= $arbos['file4']; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <!-- Dokument 5 -->
                            <div class="col">
                                <label for="file5">Document-5</label>
                                <div class="input-group mb-3 text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file5" name="file5">
                                        <label class="custom-file-label" for="file5">
                                            <?= $arbos['file5']; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Update Data</button>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End - Modal Edit -->

    <!-- hapus data -->
    <?php
    $no = 0;
    foreach ($data_arsip_boss as $arbos) :
        $no++; ?>
        <div class="modal fade" id="hapusModal<?php echo $arbos['id_arsipboss']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <?php echo form_open('c_arsipboss/hapus_data/' . $arbos['id_arsipboss']) ?>
                        <h6 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan menghapus data ini ?<br>
                        </h6>
                    </div>
                    <div class="modal-body d-flex align-content-center justify-content-center">
                        <span class="text-danger">
                            <?= $arbos['no_pendaftaran'] ?> |
                            <?= $arbos['no_sk_lengkap'] ?> |
                            <?= $arbos['nama_pemohon'] ?>

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