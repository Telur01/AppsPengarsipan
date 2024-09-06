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
                    <div class="card-header bg-primary mb-3">
                     <p class="text-white text-center mb-0"><strong>Data Diri</strong></p>    
                    </div>
                    <form method="post" action="<?php echo site_url('c_profile/proses_update_biodata'); ?>" enctype="multipart/form-data">
                    
                    <div class="row mb-2">
                        
                            <!-- NIP -->
                            <div class="col">
                                <label for="NIP">NIP</label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control form-control-sm" id="NIP" name="NIP" value="<?= $data_user->NIP;?>" >
                                </div>
                                <?= form_error('NIP', '<small class="text-danger ">', '</small>'); ?>
                            </div>

                            <!-- nama lengkap-->
                            <div class="col">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" value="<?= $data_user->nama_lengkap;?>" >
                                </div>
                                <?= form_error('nama_lengkap', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- Kode Klasifikasi -->
                            <div class="col">
                                <label for="username">Username</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" value="<?= $user['username']?>" readonly>
                                </div>
                                <?= form_error('username', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- tempat lahir-->
                            <div class="col">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" value="<?= $data_user->tempat_lahir;?>">
                                </div>
                                <?= form_error('tempat_lahir', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- tanggal lahir-->
                            <div class="col">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <div class="input-group mb-2">
                                    <input type="date" class="form-control form-control-sm" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data_user->tanggal_lahir;?>">
                                </div>
                                <?= form_error('tanggal_lahir', '<small class="text-danger ">', '</small>'); ?>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col">
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk" class="form-control form-control-sm">
                                    <option value="Laki-Laki" <?= set_value('jk', $data_user->jk) == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?= set_value('jk', $data_user->jk) == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                                <?= form_error('jk', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- golongan_darah -->
                            <div class="col">
                                <label for="golongan_darah">Golongan Darah</label>
                                <div class="input-group mb-2">
                                    <select class="form-control form-control-sm" id="golongan_darah" name="golongan_darah">
                                        <option value="" selected disabled>Pilih Golongan Darah</option>
                                        <option value="A" <?= set_select('golongan_darah', 'A', ($data_user->golongan_darah == 'A')); ?>>A</option>
                                        <option value="B" <?= set_select('golongan_darah', 'B', ($data_user->golongan_darah == 'B')); ?>>B</option>
                                        <option value="AB" <?= set_select('golongan_darah', 'AB', ($data_user->golongan_darah == 'AB')); ?>>AB</option>
                                        <option value="O" <?= set_select('golongan_darah', 'O', ($data_user->golongan_darah == 'O')); ?>>O</option>
                                    </select>
                                </div>
                                <?= form_error('golongan_darah', '<small class="text-danger">', '</small>'); ?>
                            </div>



                           <!-- agama -->
                           <div class="col">
                                <label for="agama">Agama</label>
                                <div class="input-group mb-2">
                                    <select class="form-control form-control-sm" id="agama" name="agama">
                                        <option value="" selected disabled>Pilih Agama</option>
                                        <option value="Islam" <?= set_select('agama', 'Islam', ($data_user->agama == 'Islam')); ?>>Islam</option>
                                        <option value="Kristen" <?= set_select('agama', 'Kristen', ($data_user->agama == 'Kristen')); ?>>Kristen</option>
                                        <option value="Katolik" <?= set_select('agama', 'Katolik', ($data_user->agama == 'Katolik')); ?>>Katolik</option>
                                        <option value="Hindu" <?= set_select('agama', 'Hindu', ($data_user->agama == 'Hindu')); ?>>Hindu</option>
                                        <option value="Buddha" <?= set_select('agama', 'Buddha', ($data_user->agama == 'Buddha')); ?>>Buddha</option>
                                        <option value="Konghucu" <?= set_select('agama', 'Konghucu', ($data_user->agama == 'Konghucu')); ?>>Konghucu</option>
                                    </select>
                                </div>
                                <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="col">
                                <label for="photo_profile"> Photo Profile</label>
                                <div class="input-group  text-xs">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo_profile" name="photo_profile" accept="image/*" onchange="validateImage()" >
                                        <label class="custom-file-label" for="photo_profile">Upload File</label>
                                    </div>
                                </div>
                                <small class="text-danger"> *Batas Maksimum : 2MB</small>
                            </div>
                        </div>

                        
                        <div class="card-header bg-primary mb-3">
                            <p class="text-white text-center mb-0"><strong>Alamat</strong></p>    
                        </div>

                        <div class="row">
                            <!-- dusun -->
                            <div class="col">
                                <label for="dusun">Dusun</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control form-control-sm" id="dusun" name="dusun" value="<?= $data_user->dusun;?>" >
                                </div>
                                <?= form_error('dusun', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- rt -->
                            <div class="col">
                                <label for="rt">RT</label>
                                <div class="input-group mb-2">  
                                    <input type="number" class="form-control form-control-sm" id="rt" name="rt" value="<?= $data_user->rt;?>" >
                                </div>
                                <?= form_error('rt', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- rw -->
                            <div class="col">
                                <label for="rw">RW</label>
                                <div class="input-group mb-2"> 
                                    <input type="number" class="form-control form-control-sm" id="rw" name="rw" value="<?= $data_user->rw;?>">
                                </div>
                                <?= form_error('rw', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row">
                            <!-- kelurahan -->
                            <div class="col">
                                <label for="kelurahan">Kelurahan</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control form-control-sm" id="kelurahan" name="kelurahan" value="<?= $data_user->kelurahan;?>">
                                </div>
                                <?= form_error('kelurahan', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- kecamatan -->
                            <div class="col">
                                <label for="kecamatan">Kecamatan</label>
                                <div class="input-group mb-2">
                                   
                                    <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" value="<?= $data_user->kecamatan;?>">
                                </div>
                                <?= form_error('kecamatan', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <!-- kab_kota -->
                            <div class="col">
                                <label for="kab_kota">Kabupaten/Kota</label>
                                <div class="input-group mb-2">
                                   
                                    <input type="text" class="form-control form-control-sm" id="kab_kota" name="kab_kota" value="<?= $data_user->kab_kota;?>">
                                </div>
                                <?= form_error('kab_kota', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                             <!-- provinsi -->
                             <div class="col">
                                <label for="provinsi">Provinsi</label>
                                <div class="input-group mb-2">
                                   
                                    <input type="text" class="form-control form-control-sm" id="provinsi" name="provinsi" value="<?= $data_user->provinsi;?>">
                                </div>
                                <?= form_error('provinsi', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                             <!-- kode_pos -->
                             <div class="col">
                                <label for="kode_pos">Kode Pos</label>
                                <div class="input-group mb-2">
                                   
                                    <input type="text" class="form-control form-control-sm" id="kode_pos" name="kode_pos" value="<?= $data_user->kode_pos;?>">
                                </div>
                                <?= form_error('kode_pos', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="card-header bg-primary mb-3">
                            <p class="text-white text-center mb-0"><strong>Alamat</strong></p>    
                        </div>
                        <div class="row">
                             <!-- telepon -->
                             <div class="col">
                                <label for="telepon">Telepon</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="telepon" name="telepon" value="<?= $data_user->telepon;?>">
                                </div>
                                <?= form_error('telepon', '<small class="text-danger ">', '</small>'); ?>
                            </div> <!-- email -->
                             <div class="col">
                                <label for="email">Email</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-at"></i>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?= $data_user->email;?>">
                                </div>
                                <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                            </div>
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