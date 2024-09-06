<div class="container-fluid">

 <!-- Page Heading -->
    <p class="h5 mb-4 text-gray-900">
        <?= $title1; ?>
    </p>
    <hr class="sidebar-divider">
        
    
        <form action="<?= site_url('c_profile/changePassword') ?>" method="post">
        <div class="row">
            <div class="col-md-4">
            <?= $this->session->flashdata('pesan'); ?> 
                <!-- Password Lama -->
                <div class="form-group">
                    <label for="pwd_lama">Password Lama</label>
                    <input type="password" class="form-control" name="pwd_lama" >
                    <?= form_error('pwd_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- Password Baru -->
                <div class="form-group">
                    <label for="pwd_baru_1">Password Baru</label>
                    <input type="password" class="form-control" name="pwd_baru_1" >
                    <?= form_error('pwd_baru_1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- Konfirmasi Password Baru -->
                <div class="form-group">
                    <label for="pwd_baru_2">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" name="pwd_baru_2" >
                    <?= form_error('pwd_baru_2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Ubah Password </button>
                </div>
            </div>
        </div>
        </form>
            
    </div>
</div>