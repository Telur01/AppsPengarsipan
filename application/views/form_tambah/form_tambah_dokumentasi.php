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
                    <form method="post" action="<?= site_url('c_dokumentasi/tambah_data') ?>" enctype="multipart/form-data">

                        <!-- Waktu -->
                        <div class="row mb-2">
                            <div class="col">
                                <label for="waktu">Waktu Kegiatan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="datetime-local" class="form-control form-control-sm" id="waktu" name="waktu">
                                </div>
                                <?= form_error('waktu', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <!-- Nama Kegiatan-->
                        <div class="row mb-2">
                            <div class="col">
                                <label for="nama">Nama Kegiatan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= set_value('nama') ?>">
                                </div>
                                <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                            </div>

                            <!-- Tempat Kegiatan -->
                            <div class="col">
                                <label for="tempat">Tempat Kegiatan</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="tempat" name="tempat" value="<?= set_value('tempat') ?>">
                                </div>
                                <?= form_error('tempat', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <!-- Perserta Kegiatan-->
                            <div class="col">
                                <label for="peserta">Peserta Kegiatan</label>
                                <textarea class="form-control form-control-sm " rows="2" name="peserta"></textarea>
                                <?= form_error('peserta', '<small class="text-danger ">', '</small>'); ?>
                            </div>

                            <!-- Keterangan -->
                            <div class="col ">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control form-control-sm " rows="2" name="keterangan"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger ">', '</small>'); ?>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <!-- Foto Kegiatan -->
                            <div class="col">
                                <label for="foto_kegiatan">Foto Kegiatan</label>
                                <div class="input-group text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto_kegiatan" name="foto_kegiatan" accept="image/*" >
                                        <label class="custom-file-label" for="foto_kegiatan">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-secondary"> *Maks. 2MB, Format :  .jpg, .jpeg, .png</small>
                            </div>

                            <!-- Daftar Hadir -->
                            <div class="col">
                                <label for="daftar_hadir">Daftar Hadir</label>
                                <div class="input-group text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="daftar_hadir" name="daftar_hadir" accept=".pdf">
                                        <label class="custom-file-label" for="daftar_hadir">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-secondary"> *Maks. 2MB, Format : .pdf</small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <!-- Notulen -->
                            <div class="col">
                                <label for="notulen">Notulen</label>
                                <div class="input-group text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="notulen" name="notulen" accept=".pdf">
                                        <label class="custom-file-label" for="notulen">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-secondary"> *Maks. 2MB, Format : .pdf</small>
                            </div>

                            <!-- Berita Acara -->
                            <div class="col">
                                <label for="berita_acara">Berita Acara</label>
                                <div class="input-group text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="berita_acara" name="berita_acara" accept=".pdf">
                                        <label class="custom-file-label" for="berita_acara">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-secondary"> *Maks. 2MB, Format : .pdf</small>
                            </div>

                        </div>
                        <div class="row">

                            <!-- Surat Undangan-->
                            <div class="col mb-3">
                                <label for="surat_undangan">Surat Undangan</label>
                                <div class="input-group text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="surat_undangan" name="surat_undangan" accept=".pdf">
                                        <label class="custom-file-label" for="surat_undangan">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-secondary"> *Maks. 2MB, Format : .pdf</small>
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