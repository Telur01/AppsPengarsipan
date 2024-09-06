<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-800">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="font-size: 13px;">
                <p class="card-header"> Form Filter</p>
                <div class="card-body">
                    <form id="jenis_filter_form">
                        <div class="form-group">
                            <label for="jenis_filter">Pilih Jenis Filter Berdasarkan :</label>
                            <select class="form-control form-control-sm" id="jenis_filter" name="jenis_filter">
                                <option>Pilih...</option>
                                <option value="tanggal">Filter berdasarkan Tanggal</option>
                                <option value="bulan">Filter berdasarkan Bulan</option>
                                <option value="tahun">Filter berdasarkan Tahun</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Pilih</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form Filter Berdasarkan Tanggal  -->
        <div class="col-sm-6" id="filter_tanggal" style="display: none; font-size: 12px;">
            <div class="card " style="font-size: 13px;">
                <p class="card-header"> Form Filter Berdasarkan Tanggal</p>
                <div class="card-body">
                    <form method="GET" action="<?= base_url('c_monitoring/filter_tanggal') ?>">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_awal">Tanggal Awal</label>
                                    <input type="date" class="form-control form-control-sm" id="tanggal_awal" name="tanggal_awal">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                    <input type="date" class="form-control form-control-sm" id="tanggal_akhir" name="tanggal_akhir">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"> Lihat Data</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Form Filter Berdasarkan Bulan  -->
        <div class="col-sm-6" id="filter_bulan" style="display: none;">
            <div class="card" style="font-size: 13px;">
                <h6 class="card-header">Form Filter Berdasarkan Bulan</h6>
                <div class="card-body">
                    <form method="GET" action="<?= base_url('c_monitoring/filter_bulan') ?>"> <!-- Ubah URL sesuai dengan route yang Anda tentukan -->
                        <div class="row">
                            <div class="form-group col">
                                <label for="bulan">Bulan</label>
                                <select class="form-control form-control-sm" name="bulan" id="bulan">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="tahun">Tahun</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Tahun" name="tahun">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm"> Lihat Data</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form Filter Berdasarkan Tahun -->
        <div class="col-sm-6" id="filter_tahun" style="display: none;">
            <div class="card">
                <h6 class="card-header">Form Filter Berdasarkan Tahun</h6>
                <div class="card-body">
                    <form method="GET" action="<?= base_url('c_monitoring/filter_tahun') ?>">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Tahun" name="tahun">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($show_table) && $show_table === true) : ?>
        <?php if (!empty($data_monitoring)) : ?>
            <div class="row mt-5">
                <div class="col">
                    <div class="card" style="font-size: 12px;">
                        <div class="card-header">
                            <p class="h6 text-left"> Data Hasil Filter</p>
                            <?php if (!empty($tanggal_awal) && !empty($tanggal_akhir)) : ?>
                                <div class="row">
                                    <div class="col ">
                                        Periode tanggal : <?= date('d F Y', strtotime($tanggal_awal)) ?> s/d <?= date('d F Y', strtotime($tanggal_akhir)) ?>
                                    </div>
                                    <div class="col text-right ">
                                        <a href="<?= base_url('c_monitoring/export_excel?tanggal_awal=' . $tanggal_awal . '&tanggal_akhir=' . $tanggal_akhir) ?>" class="btn btn-primary btn-sm"> Export Excel</a>
                                    </div>
                                </div>
                            <?php elseif (!empty($bulan) && !empty($tahun)) : ?>
                                <div class="row">
                                    <div class="col">
                                        Periode <br>Bulan : <?= date('F', strtotime("$tahun-$bulan")) ?> <br>Tahun : <?= $tahun ?>
                                    </div>
                                    <div class="col text-right">
                                        <a href="<?= base_url('c_monitoring/export_excel?bulan=' . $bulan . '&tahun=' . $tahun) ?>" class="btn btn-primary btn-sm"> Export Excel</a>
                                    </div>
                                </div>
                            <?php elseif (!empty($tahun)) : ?>
                                <div class="row">
                                    <div class="col">
                                        Periode Tahun : <?= $tahun ?>
                                    </div>
                                    <div class="col  text-right">
                                        <a href="<?= base_url('c_monitoring/export_excel?tahun=' . $tahun) ?>" class="btn btn-primary btn-sm"> Export Excel</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <card class="card-body">
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
                                            <td>Dokumen/file</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_monitoring as $monitoring) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['tanggal'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['no_izin'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['jenis_izin'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['jenis_layanan'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['nama_pemohon'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['nama_perusahaan'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['alamat_perusahaan'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['alamat_persil'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $monitoring['peruntukan'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('c_monitoring/lihat_data/' . $monitoring['id_monitoring']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
                                                        Lihat
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </card>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row mt-5">
                <div class="col">
                    <p>Data tidak tersedia.</p>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->