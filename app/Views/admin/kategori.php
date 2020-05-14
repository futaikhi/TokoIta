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
                            <h1 class="m-0 text-dark">Kategori</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url("admin"); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Kategori</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo base_url("admin/kategori/insert"); ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kategori as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td width="200">
                                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?php echo $row['idKategori']; ?>">Delete</a>
                                                <a href="#" class="btn btn-secondary btn-sm btn-update" data-name="<?php echo $row['nama']; ?>" data-id="<?php echo $row['idKategori']; ?>">Update</a>
                                                <a href="#" class="btn btn-info btn-sm btn-view" data-name="<?php echo $row['nama']; ?>">View</a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <?php echo view("template/footer"); ?>
    </div>
    </div>

    <form action="<?php echo base_url('admin/kategori/update') ?>" method="post">
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control namaKategori" name="nama" placeholder="Nama Kategori">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="idKategori">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control namaKategori" name="nama" placeholder="Nama Kategori" readonly>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <form action="<?php echo base_url('admin/kategori/delete') ?>" method="post">
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Yakin ingin menghapusnya?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="idKategori">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <?php echo view("template/js"); ?>
    <script>
        $(document).ready(function() {
            $('.btn-view').on('click', function() {
                // get data from button edit
                const name = $(this).data('name');

                $('.namaKategori').val(name);
                // Call Modal Edit
                $('#modalView').modal('show');
            });

            $('.btn-update').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const name = $(this).data('name');
                // Set data to Form Edit
                $('.idKategori').val(id);
                $('.namaKategori').val(name);
                // Call Modal Edit
                $('#modalUpdate').modal('show')
            });

            $('.btn-delete').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                // Set data to Form Edit
                $('.idKategori').val(id);
                // Call Modal Edit
                $("#modalDelete").modal('show');
            });
        });
    </script>
</body>

</html>