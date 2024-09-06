<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">

    <!-- button_view.php -->
    <div class="row">
        <div class="col d-flex">
            <a class="btn btn-primary btn-sm mb-3" href="<?= site_url('c_user/tambah_data'); ?>">
                <i class="fas fa-plus mr-2"></i> Tambah Data Users</a>
        </div>
    </div>

    <!-- Table data user -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= $this->session->flashdata('pesan') ?>
            <div class="table-responsive" style="font-size: 13px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="font-weight-bold text-center">
                            <th>No</th>
                            <th>Kode User</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Date Create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_user as $user) :
                        ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $user['kode_user']; ?>
                                </td>
                                <td>
                                    <?= $user['username']; ?>
                                </td>
                                <td>
                                    <?= $user['level']; ?>
                                </td>
                                <td>
                                    <?php echo date('d F Y ', strtotime($user['date_created'])) ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusModal<?= $user['id_user']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <button type="button" class="btn btn-sm btn-success " data-toggle="modal" data-target="#lihatModal<?= $user['id_user']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#resetPasswordModal<?= $user['id_user']; ?>">
                                        <i class="fas fa-key"></i>  Reset Password
                                    </button>
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


<!-- lihat data -->
<?php
$no = 0;
foreach ($data_user as $user) :
    $no++; ?>
    <div class="modal fade" id="lihatModal<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light text-sm">
                    <p class="modal-title " id="exampleModalLabel">Detail Data Users</p>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 13px">
                    <table class="table table-bordered">
                        <tr>
                            <td>Kode User</td>
                            <td>
                                <?= $user['kode_user'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>
                                <?= $user['username'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <?= $user['username'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Level Account</td>
                            <td>
                                <?= $user['level'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td>
                                <?= $user['date_created'] ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- hapus data -->
<?php
$no = 0;
foreach ($data_user as $user) :
    $no++; ?>
    <div class="modal fade" id="hapusModal<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?= form_open('c_user/hapus_data/' . $user['id_user']) ?>
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan menghapus data ini ?<br>
                    </h5>
                </div>
                <div class="modal-body d-flex align-content-center justify-content-center">
                    <span class="text-danger">
                        <?= $user['kode_user'] ?> |
                        <?= $user['username'] ?> 
                    </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Hapus</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Reset Password -->
<?php foreach ($data_user as $user) : ?>
    <div class="modal fade" id="resetPasswordModal<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel<?= $user['id_user']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetPasswordModalLabel<?= $user['id_user']; ?>">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mereset password "<?= $user['username'] ?>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <?= anchor('c_user/reset_password/' . $user['id_user'], 'Reset Password', ['class' => 'btn btn-warning btn-sm']) ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>