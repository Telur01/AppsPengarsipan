<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

    <div class="row mb-2">
        <div class="col">
            <div class="card mb-5">
                <div class="card-body">
                    <form method="post" action="<?= site_url('c_arsipboss/tambah_data') ?>" enctype="multipart/form-data">
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
                                    <input type="number" class="form-control form-control-sm" id="no_pendaftaran" name="no_pendaftaran" value="<?= set_value('no_pendaftaran') ?>">
                                </div>
                                <?= form_error('no_pendaftaran', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <label for="no_sk_lengkap">No. SK Lengkap</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="no_sk_lengkap" name="no_sk_lengkap" value="<?= set_value('no_sk_lengkap') ?>">
                                </div>
                                <?= form_error('no_sk_lengkap', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- Jenis Izin -->
                            <div class="col">
                                <label for="jenis_izin">Jenis Izin</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="jenis_izin" name="jenis_izin" value="<?= set_value('jenis_izin') ?>">
                                </div>
                                <?= form_error('jenis_izin', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="text" class="form-control form-control-sm" id="jenis_layanan" name="jenis_layanan" value="<?= set_value('jenis_layanan') ?>">
                                </div>
                                <?= form_error('jenis_layanan', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- Nama Pemohon -->
                            <div class="col">
                                <label for="nama_pemohon">Nama Pemohon</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="nama_pemohon" name="nama_pemohon" value="<?= set_value('nama_pemohon') ?>">
                                </div>
                                <?= form_error('nama_pemohon', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="nama_perusahaan" value="<?= set_value('nama_perusahaan') ?>">
                                </div>
                                <?= form_error('nama_perusahaan', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- Alamat Perusahaan -->
                            <div class="col mb-2">
                                <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                <textarea class="form-control form-control-sm " rows="2" name="alamat_perusahaan"></textarea>
                                <?= form_error('alamat_perusahaan', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- Alamat Persil -->
                            <div class="col ">
                                <label for="alamat_persil">Alamat Persil</label>
                                <textarea class="form-control form-control-sm " rows="2" name="alamat_persil"></textarea>
                                <?= form_error('alamat_persil', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <!-- Peruntukan -->
                            <div class="col">
                                <label for="peruntukan">Peruntukan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="peruntukan" name="peruntukan" value="<?= set_value('peruntukan') ?>">
                                </div>
                                <?= form_error('peruntukan', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="date" class="form-control form-control-sm" id="tanggal_ttd" name="tanggal_ttd" value="<?= set_value('tanggal_ttd') ?>">
                                </div>
                                <?= form_error('tanggal_ttd', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- Kelurahan -->
                            <div class="col">
                                <label for="kelurahan">Kelurahan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="kelurahan" name="kelurahan" value="<?= set_value('kelurahan') ?>">
                                </div>
                                <?= form_error('kelurahan', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan') ?>">
                                </div>
                                <?= form_error('kecamatan', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="text" class="form-control form-control-sm" id="wilayah" name="wilayah" value="<?= set_value('wilayah') ?>">
                                </div>
                                <?= form_error('wilayah', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <!-- Ruang -->
                            <div class="col">
                                <label for="ruang">Ruang</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-door-open"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="ruang" name="ruang" value="<?= set_value('ruang') ?>">
                                </div>
                                <?= form_error('ruang', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="text" class="form-control form-control-sm" id="rak" name="rak" value="<?= set_value('rak') ?>">
                                </div>
                                <?= form_error('rak', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="text" class="form-control form-control-sm" id="box" name="box" value="<?= set_value('box') ?>">
                                </div>
                                <?= form_error('box', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- Bulan -->
                            <div class="form-group col">
                                <label for="bulan">Bulan</label>
                                <select class="form-control form-control-sm" name="bulan" id="bulan">
                                    <option>Pilih...</option>
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
                            <?= form_error('bulan', '<small class="text-danger ">', '</small>'); ?>
                            <!-- Tahun-->
                            <div class="col">
                                <label for="tahun">Tahun</label>
                                <select class="form-control form-control-sm" name="tahun" id="tahun">
                                    <option selected="Selected">Pilih...</option>
                                    <?php
                                    for($i=date('Y'); $i>=date('Y')-32;$i-=1){
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                    <option value=""></option>
                                </select>
                                <?= form_error('tahun', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row row mb-2">
                            <!-- Dokument 1 -->
                            <div class="col">
                                <label for="file1">Document-1</label>
                                <div class="input-group  text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file1" name="file1">
                                        <label class="custom-file-label" for="file1">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-danger"> *Batas Maksimum : 5MB</small>
                            </div>
                        <button type="submit" class="btn btn-success btn-sm btn-block mt-4"> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>