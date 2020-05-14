<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view("template/head"); ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Admin</b>LTE
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Masuk Untuk mengakses Admin</p>
                <?php
                $session = \Config\Services::session();
                $errors = $session->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errors; ?>
                    </div>
                <?php
                } ?>
                <form action="<?php echo base_url("login"); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="name" class="form-control" placeholder="Name" name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="No Telp" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <?php echo view("template/js"); ?>
</body>

</html>