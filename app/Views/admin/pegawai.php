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
                            <h1 class="m-0 text-dark">Pegawai</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url("admin"); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Pegawai</li>
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
                            <h3 class="card-title">Data Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo base_url("admin/pegawai/insert"); ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="pegawai" name="nama" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="noTelp">No Telp</label>
                                    <input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="Masukkan No Telp">
                                </div>
                                <div class="form-group">
                                    <label for="peran">Peran</label>
                                    <select type="text" class="form-control peran " name="peran" id="peran" multiple="multiple">
                                        <?php foreach ($peran as $row) { ?>
                                            <option value="<?php echo $row['idPeran'] ?>"><?php echo $row['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
                                        <th class="text-center">Nama Pegawai</th>
                                        <th class="text-center">No Telp</th>
                                        <th class="text-center">Peran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pegawai as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['namaPegawai']; ?></td>
                                            <td><?php echo $row['noTelp']; ?></td>
                                            <td><?php echo $row['namaPeran']; ?></td>
                                            <td width="200">
                                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?php echo $row['idPegawai']; ?>">Delete</a>
                                                <a href="#" class="btn btn-secondary btn-sm btn-update" data-id="<?php echo $row['idPegawai']; ?>" data-name="<?php echo $row['namaPegawai']; ?>" data-telp="<?php echo $row['noTelp']; ?>" data-prn="<?php echo $row['idPeran']; ?>">Update</a>
                                                <a href="#" class="btn btn-info btn-sm btn-view" data-peran="<?php echo $row['namaPeran']; ?>" data-name="<?php echo $row['namaPegawai']; ?>" data-telp="<?php echo $row['noTelp']; ?>">View</a>
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

    <form action="<?php echo base_url('admin/pegawai/update') ?>" method="post">
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control namaPegawai" id="nama" name="nama" placeholder="Nama Pegawai">
                        </div>
                        <div class="form-group">
                            <label for="noTelp">No Telp</label>
                            <input type="text" class="form-control noTelp" id="noTelp" name="noTelp" placeholder="No Telp">
                        </div>
                        <div class="form-group">
                            <label for="prn">Peran</label>
                            <select type="text" class="form-control prn" name="prn" id="prn" multiple="multiple" style="width: 100%">
                                <?php foreach ($peran as $row) { ?>
                                    <option value="<?php echo $row['idPeran'] ?>"><?php echo $row['nama'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="idPegawai">
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
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control namaPegawai" name="nama" placeholder="Nama Kategori" readonly>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control noTelp" name="noTelp" placeholder="No Telp" readonly>
                    </div>
                    <div class="form-group">
                        <label>Peran</label>
                        <input type="text" class="form-control peranModal" name="peran" placeholder="Peran" readonly>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <form action="<?php echo base_url('admin/pegawai/delete') ?>" method="post">
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Yakin ingin menghapusnya?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="idPegawai">
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
            $('.peran').select2({
                maximumSelectionLength: 1,
                placeholder: "Peran"
            });
            $('.prn').select2({
                maximumSelectionLength: 1,
                placeholder: "Peran"
            });
            $('.btn-view').on('click', function() {
                // get data from button edit
                const name = $(this).data('name');
                const noTelp = $(this).data('telp');
                const peran = $(this).data('peran');

                $('.namaPegawai').val(name);
                $('.noTelp').val(noTelp);
                $('.peranModal').val(peran);
                // Call Modal Edit
                $('#modalView').modal('show');
            });

            $('.btn-update').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const name = $(this).data('name');
                const noTelp = $(this).data('telp');
                const idPeran = $(this).data('prn');
                // Set data to Form Edit
                $('.namaPegawai').val(name);
                $('.idPegawai').val(id);
                $('.noTelp').val(noTelp);
                $('.prn').val(idPeran).trigger("change");
                // Call Modal Edit
                $('#modalUpdate').modal('show')
            });

            $('.btn-delete').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                // Set data to Form Edit
                $('.idPegawai').val(id);
                // Call Modal Edit
                $("#modalDelete").modal('show');
            });
        });
    </script>
</body>

</html>