<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view("template/head"); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php echo view("template/sidebar"); ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Home</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url("admin"); ?>">Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <?php echo view("template/footer"); ?>
    </div>
    <?php echo view("template/js"); ?>
</body>

</html>