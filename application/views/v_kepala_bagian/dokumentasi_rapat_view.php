<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-800">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

    <!-- table dokumentasi rapat -->
    <div class="card" style="font-size: 12px;">
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
                        <button class="btn btn-success btn-sm" type="submit"> Tampilkan Data</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="font-weight-bold text-center">
                            <td>No.</td>
                            <td>Waktu Kegiatan</td>
                            <td>Nama Kegiatan</td>
                            <td>Tempat Kegiatan</td>
                            <td>Peserta Kegiatan</td>
                            <td>Keterangan</td>
                            <td>Dokumen/file</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_dokumentasi as $dokrap) :
                        ?>
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
                                    <a href="<?php echo base_url('c_dokumentasi/lihat_data/' . $dokrap['id_dokumentasi']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->