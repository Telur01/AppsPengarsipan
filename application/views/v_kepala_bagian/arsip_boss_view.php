<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-800">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

    <!-- table dokumentasi rapat -->
    <div class="card" style="font-size: 12px">
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
                            <td rowspan="2">No.</td>
                            <td rowspan="2">No. Pendaftaran</td>
                            <td rowspan="2">No. SK</td>
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
                            <td rowspan="2">Date Created</td>
                            <td rowspan="2">Dokumen/Files</td>
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
                                    <?php echo $arbos['no_sk'] ?>
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
                                <td>
                                    <?php echo $arbos['date_created'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('c_arsipboss/lihat_data/' . $arbos['id_arsipboss']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
                                        Lihat
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