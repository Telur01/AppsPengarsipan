<div class="container-fluid">
<?php echo $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center">
                    <img class="card-img-top rounded-circle" src="<?= $data_user->photo_profile; ?>" alt="Card image cap" style="max-width: 200px; max-height: 200px;  object-fit: cover;">
                        <h5 class="card-title font-weight-bold"><?= $data_user->nama_lengkap; ?></h5>
                        <p class="card-text">- <?= $user['level'] ?> -</p>   
                    <a href="<?= site_url('c_profile/ubah_biodata') ?>" class="btn btn-primary mb-2 btn-block">Ubah Biodata</a>
                    <a href="<?= site_url('c_profile/changePassword') ?>" class="btn btn-primary btn-block">Ubah Password</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    Information
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container">
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav mx-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="javascript:void(0);" onclick="showDataDiri()"><i class="fas fa-user mr-1"></i>Data Diri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);" onclick="showAlamat()"><i class="fas fa-map-marker-alt mr-1"></i>Alamat</a>
                                        </li>
                                        <li class= "nav-item">
                                            <a class="nav-link" href="javascript:void(0);" onclick="showKontak()"><i class="fas fa-phone-alt mr-1"></i> Kontak</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </li>
                    <li class="list-group-item" id="data-diri">
                        <div class="row">
                            <div class="col-3">
                            <p>NIP</p>
                            <p>Username</p>
                            <p>Nama Lengkap</p>
                            <p>Tempat / Tanggal Lahir</p>
                            <p>Jenis Kelamin</p>
                            <p>Golongan Darah</p>
                            <p>Agama</p>
                            </div>
                            <div class="col">
                                <P>: <?= $data_user->NIP; ?></P>
                                <p>: <?= $this->session->userdata('username') ?></p>
                                <p>: <?= $data_user->nama_lengkap; ?></p>
                                <p>: <?= $data_user->tempat_lahir; ?> / <?= $data_user->tanggal_lahir; ?> </p>
                                <p>: <?= $data_user->jk; ?></p>
                                <p>: <?= $data_user->golongan_darah; ?></p>
                                <p>: <?= $data_user->agama; ?></p>
                        </div>
                    </li>
                    <li class="list-group-item" id="alamat" style="display: none;">
                        <div class="row">
                            <div class="col-3">
                                <p>Dusun</p>
                                <p>RT / RW</p>
                                <p>Kelurahan</p>
                                <p>Kecamatan</p>
                                <p>Kabupaten/Kota</p>
                                <p>Kode Pos</p>
                                <p>Provinsi</p>
                            </div>
                            <div class="col">
                                
                                    <p>: <?= $data_user->dusun; ?></p>
                                    <p>: <?= $data_user->rt;?> / <?= $data_user->rw;?></p>
                                    <p>: <?= $data_user->kelurahan;?></p>
                                    <p>: <?= $data_user->kecamatan;?></p>
                                    <p>: <?= $data_user->kab_kota;?></p>
                                    <p>: <?= $data_user->kode_pos;?></p>
                                    <p>: <?= $data_user->provinsi;?></p>
                                
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item" id="kontak" style="display: none;">
                        <div class="row">
                            <div class="col-3">
                                <p>Telepon</p>
                                <p>Email</p>
                            </div>
                            <div class="col">
                            
                                    <p>: <?= $data_user->telepon;?></p>
                                    <p>: <?= $data_user->email;?></p>
                                
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function showDataDiri() {
        document.getElementById('data-diri').style.display = 'block';
        document.getElementById('alamat').style.display = 'none';
        document.getElementById('kontak').style.display = 'none';

        // Tambahkan kelas "active" ke tautan "Data Diri" dan hilangkan dari yang lain
        document.querySelector(".nav-link.active").classList.remove("active");
        document.querySelector(".nav-link:nth-child(1)").classList.add("active");
    }

    function showAlamat() {
        document.getElementById('data-diri').style.display = 'none';
        document.getElementById('alamat').style.display = 'block';
        document.getElementById('kontak').style.display = 'none';

        // Tambahkan kelas "active" ke tautan "Alamat" dan hilangkan dari yang lain
        document.querySelector(".nav-link.active").classList.remove("active");
        document.querySelector(".nav-link:nth-child(2)").classList.add("active");
    }

    function showKontak() {
        document.getElementById('data-diri').style.display = 'none';
        document.getElementById('alamat').style.display = 'none';
        document.getElementById('kontak').style.display = 'block';

        // Tambahkan kelas "active" ke tautan "Kontak" dan hilangkan dari yang lain
        document.querySelector(".nav-link.active").classList.remove("active");
        document.querySelector(".nav-link:nth-child(3)").classList.add("active");
    }
</script>
