<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?= base_url('c_user/tambah_data') ?>">
                        <!-- kode user -->
                        <div class="row mb-2">
                            <div class="col">
                                <label for="kode_user">Kode User</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="kode_user" name="kode_user" value="<?= $kode_user; ?>" readonly>
                                </div>
                            </div>

                            <!-- Id_Biodata -->
                            <div class="col">
                                <label for="id_biodata">ID Biodata</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="id_biodata" name="id_biodata" value="<?= $id_biodata; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="row mb-2">
                            <div class="col">
                                <label for="username">Username</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Masukan username" value="<?= set_value('username') ?>">
                                </div>
                                <?= form_error('username', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <!-- Nama Password-->
                        <div class="row mb-2">
                            <div class="col">
                                <label for="password1">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control form-control-sm" id="password1" name="password1" placeholder="Masukan password">
                                </div>
                                <?= form_error('password1', '<small class="text-danger ">', '</small>'); ?>
                            </div>

                            <!-- passsword2 -->
                            <div class="col">
                                <label for="password2">Ulangi Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control form-control-sm" id="password2" name="password2" placeholder="Ulangi password">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="level">Level Account</label>
                                <select id="level" name="level" class="form-control form-control-sm">
                                    <option selected>Pilih...</option>
                                    <option value="administrator">administrator</option>
                                    <option value="kepala_bagian">kepala_bagian</option>
                                    <option value="staff">staff</option>
                                </select>
                                <?= form_error('level', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success btn-sm btn-block"> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->