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
                        foreach ($recycle_bin_data as $item) : ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $item['no_pendaftaran'] ?>
                                </td>
                                <td>
                                    <?php echo $item['no_sk_lengkap'] ?>
                                </td>
                                <td>
                                    <?php echo $item['jenis_izin'] ?>
                                </td>
                                <td>
                                    <?php echo $item['jenis_layanan'] ?>
                                </td>
                                <td>
                                    <?php echo $item['nama_pemohon'] ?>
                                </td>
                                <td>
                                    <?php echo $item['nama_perusahaan'] ?>
                                </td>
                                <td>
                                    <?php echo $item['alamat_perusahaan'] ?>
                                </td>
                                <td>
                                    <?php echo $item['alamat_persil'] ?>
                                </td>
                                <td>
                                    <?php echo $item['kelurahan'] ?>
                                </td>
                                <td>
                                    <?php echo $item['kecamatan'] ?>
                                </td>
                                <td>
                                    <?php echo $item['wilayah'] ?>
                                </td>
                                <td>
                                    <?php echo $item['peruntukan'] ?>
                                </td>
                                <td>
                                    <?php echo $item['tanggal_ttd'] ?>
                                </td>
                                <td>
                                    <?php echo $item['ruang'] ?>
                                </td>
                                <td>
                                    <?php echo $item['rak'] ?>
                                </td>
                                <td>
                                    <?php echo $item['box'] ?>
                                </td>
                                <td>
                                    <?php echo $item['bulan'] ?>
                                </td>
                                <td>
                                    <?php echo $item['tahun'] ?>
                                </td>
                                <td class="text-center">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusModal<?php echo $item['id_rb_arboss']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#RecycleModal<?php echo $item['id_rb_arboss']; ?>">
                                                <i class="fas fa-undo"></i>
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
</div>
</div>

<!-- Restore -->
<?php
$no = 0;
foreach ($recycle_bin_data as $item) :
    $no++; ?>
    <div class="modal fade" id="RecycleModal<?php echo $item['id_rb_arboss']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo form_open('c_recycleBin/restore_arbos/' . $item['id_rb_arboss']); ?>
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan me-restore data ini ?<br>
                    </h5>
                </div>
                <div class="modal-body d-flex align-content-center justify-content-center">
                    <span class="text-danger">
                        <?= $item['no_sk_lengkap'] ?> |
                        <?= $item['nama_pemohon'] ?>
                    </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- hapus data -->
<?php
$no = 0;
foreach ($recycle_bin_data as $item) :
    $no++; ?>
    <div class="modal fade" id="hapusModal<?php echo $item['id_rb_arboss']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo form_open('c_recycleBin/hapus_permanen_arbos/' . $item['id_rb_arboss']); ?>
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan menghapus data ini ?<br>
                    </h5>
                </div>
                <div class="modal-body d-flex align-content-center justify-content-center">
                    <span class="text-danger">
                        <?= $item['no_sk_lengkap'] ?> |
                        <?= $item['nama_pemohon'] ?>

                    </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

