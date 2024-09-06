<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

        <!-- Table data inaktif -->
    <div class="card shadow mb-4" style="font-size: 12px">
        <div class="card-header">
            <h5>Monitoring Izin Terbit</h5>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive">
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
                            <td>Waktu Hapus</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($recycle_bin_data as $item) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?php echo $item['tanggal']; ?></td>
                                <td><?php echo $item['no_izin']; ?></td>
                                <td><?php echo $item['jenis_izin']; ?></td>
                                <td><?php echo $item['jenis_layanan']; ?></td>
                                <td><?php echo $item['nama_pemohon']; ?></td>
                                <td><?php echo $item['nama_perusahaan']; ?></td>
                                <td><?php echo $item['alamat_perusahaan']; ?></td>
                                <td><?php echo $item['alamat_persil']; ?></td>
                                <td><?php echo $item['peruntukan']; ?></td>
                                <td>
                                    <?= date('d F Y', strtotime($item['delete_time'])) ?>
                                </td>
                                <td class="text-center">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusModal<?php echo $item['id_rb_mit']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#RecycleModal<?php echo $item['id_rb_mit']; ?>">
                                                <i class="fas fa-undo-alt"></i>
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
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Restore -->
<?php
$no = 0;
foreach ($recycle_bin_data as $item) :
    $no++; ?>
    <div class="modal fade" id="RecycleModal<?php echo $item['id_rb_mit']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo form_open('c_recycleBin/restore_mit/' . $item['id_rb_mit']); ?>
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan me-restore data ini ?<br>
                    </h5>
                </div>
                <div class="modal-body d-flex align-content-center justify-content-center">
                    <span class="text-danger">
                        <?= $item['no_izin'] ?> |
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
    <div class="modal fade" id="hapusModal<?php echo $item['id_rb_mit']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo form_open('c_recycleBin/hapus_permanen_mit/' . $item['id_rb_mit']); ?>
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan menghapus data ini ?<br>
                    </h5>
                </div>
                <div class="modal-body d-flex align-content-center justify-content-center">
                    <span class="text-danger">
                        <?= $item['no_izin'] ?> |
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

