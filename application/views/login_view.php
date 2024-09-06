<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-xl-10">
            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-2">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                            <img src="<?= base_url('assets/img/logo_dpmptsp.png') ?>" class="img-fluid" style="width: 300px">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-left">
                                    <p class="h2 text-gray-900 mb-3 font-weight-bold">BackOffice Login</p>
                                    <p class="h6 text-gray-900 mb-2">We are happy to have you back</p>
                                    <hr class="mb-4">
                                </div>
                                <?= $this->session->flashdata('msg_error') ?>
                                <form class="user" method="post" action="<?= base_url('login') ?>">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <input type="text" name="username" id="username" class="form-control" placeholder=" Enter Username" value="<?= set_value('username') ?>">
                                    </div>
                                    <small class="text-danger">
                                        <?= form_error('username'); ?>
                                    </small>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                                    </div>
                                    <small class="text-danger">
                                        <?= form_error('password'); ?>
                                    </small>
                                    <div class="input-group mb-2 mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>