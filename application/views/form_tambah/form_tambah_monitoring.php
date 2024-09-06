<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

    <div class="row">
        <div class="col">
            <div class="card mb-5">
                <div class="card-body">
                    <form method="post" action="<?= base_url('c_monitoring/tambah_data') ?>" enctype="multipart/form-data">

                        <!-- Tanggal -->
                        <div class="row mb-2">
                            <div class="col">
                                <label for="tanggal">Tanggal</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?= set_value('tanggal') ?>">
                                </div>
                                <?= form_error('tanggal', '<small class="text-danger ">', '</small>'); ?>
                            </div>

                             <!-- No.Izin-->
                             <div class="col">
                                <label for="no_izin">No. Izin</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="no_izin" name="no_izin" value="<?= set_value('no_izin') ?>">
                                </div>
                                <?= form_error('no_izin', '<small class="text-danger ">', '</small>'); ?>
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
                                    <input type="text" class="form-control form-control-sm" id="jenis_layanan" name="jenis_layanan" value="<?= set_value('jenis_layanan') ?>" >
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

                            <!-- Nama Perusahaan -->
                            <div class="col">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-building"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="nama_perusahaan" value="<?= set_value('nama_perusahaan') ?>">
                                </div>
                                <?= form_error('nama_perusahaan', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- alamat perusahaan -->
                            <div class="col">
                                <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                <textarea class="form-control form-control-sm " rows="2" name="alamat_perusahaan"></textarea>
                                <?= form_error('alamat_perusahaan', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- alamat persil -->
                            <div class="col ">
                                <label for="alamat_persil">Alamat Persil</label>
                                <textarea class="form-control form-control-sm " rows="2" name="alamat_persil"></textarea>
                                <?= form_error('alamat_persil', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- peruntukan -->
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
                        </div>

                        <div class="row mb-2">
                            <!-- document -->
                            <div class="col">
                                <label for="document">Document</label>
                                <div class="input-group text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="document" name="document">
                                        <label class="custom-file-label" for="document">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-danger"> *Batas Maksimum : 5MB</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm btn-block"> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->