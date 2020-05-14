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
                            <h1 class="m-0 text-dark">Barang</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url("admin"); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Barang</li>
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
                            <h3 class="card-title">Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo base_url("admin/barang/insert"); ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kodeBarang">Kode Barang</label>
                                    <input type="text" class="form-control" id="kodeBarang" one name="kodeBarang" placeholder="Masukkan Kode Barang">
                                </div>
                                <div class="form-group">
                                    <label for="namaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Masukkan Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok Barang</label>
                                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Barang">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Barang</label>
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Barang">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select type="text" class="form-control kategori " name="kategori" id="kategori" multiple="multiple">
                                        <?php foreach ($kategori as $row) { ?>
                                            <option value="<?php echo $row['idKategori'] ?>"><?php echo $row['nama'] ?></option>
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
                                        <th class="text-center">Kode Barang</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['kodeBarang']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['stok']; ?></td>
                                            <td><?php echo $row['harga']; ?></td>
                                            <td><?php echo $row['namaKategori']; ?></td>
                                            <td width="200">
                                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?php echo $row['idBarang']; ?>">Delete</a>
                                                <a href="#" class="btn btn-secondary btn-sm btn-update" data-ktgr="<?php echo $row['idKategori']; ?>" data-name="<?php echo $row['nama']; ?>" data-id="<?php echo $row['idBarang']; ?>" data-kode="<?php echo $row['kodeBarang']; ?>" data-stok="<?php echo $row['stok']; ?>" data-harga="<?php echo $row['harga']; ?>" data-kategori="<?php echo $row['namaKategori'] ?>">Update</a>
                                                <a href="#" class="btn btn-info btn-sm btn-view" data-name="<?php echo $row['nama']; ?>" data-kode="<?php echo $row['kodeBarang']; ?>" data-stok="<?php echo $row['stok']; ?>" data-harga="<?php echo $row['harga']; ?>" data-kategori="<?php echo $row['namaKategori'] ?>">View</a>
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

    <form action="<?php echo base_url('admin/barang/update') ?>" method="post">
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kodeBarang">Kode Barang Barang</label>
                            <input type="text" class="form-control kodeBarang" id="kodeBarang" name="kodeBarang" placeholder="Kode Barang">
                        </div>
                        <div class="form-group">
                            <label for="namaBarang">Nama Barang</label>
                            <input type="text" class="form-control namaBarang" id="namaBarang" name="namaBarang" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Barang</label>
                            <input type="text" class="form-control stokBarang" id="stok" name="stok" placeholder="Stok Barang">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Barang</label>
                            <input type="text" class="form-control hargaBarang" id="harga" name="harga" placeholder="Harga Barang">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select type="text" class="form-control ktgr " name="ktgr" id="ktgr" multiple="multiple" style="width: 100%">
                                <?php foreach ($kategori as $row) { ?>
                                    <option value="<?php echo $row['idKategori'] ?>"><?php echo $row['nama'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="idBarang">
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
                        <label for="kodeBarang">Kode Barang Barang</label>
                        <input type="text" class="form-control kodeBarang" id="kodeBarang" name="kodeBarang" placeholder="Kode Barang" readonly>
                    </div>
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" class="form-control namaBarang" id="namaBarang" name="namaBarang" placeholder="Nama Barang" readonly>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="text" class="form-control stokBarang" id="stok" name="stok" placeholder="Stok Barang" readonly>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="text" class="form-control hargaBarang" id="harga" name="harga" placeholder="Harga Barang" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kategoriBarang">Kategori</label>
                        <input type="text" class="form-control kategoriBarang" id="kategori" name="kategori" placeholder="Kategori" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <form action="<?php echo base_url('admin/barang/delete') ?>" method="post">
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Yakin ingin menghapusnya?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="idBarang">
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
            $('.kategori').select2({
                maximumSelectionLength: 1,
                placeholder: "Kategori"
            });
            $('.ktgr').select2({
                maximumSelectionLength: 1,
                placeholder: "Kategori"
            });
            $('#kodeBarang').keypress(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    document.getElementById("namaBarang").focus();

                }
            });
            $('.btn-view').on('click', function() {
                const name = $(this).data('name');
                const kode = $(this).data('kode');
                const stok = $(this).data('stok');
                const harga = $(this).data('harga');
                const kategori = $(this).data('kategori');

                $('.namaBarang').val(name);
                $('.kodeBarang').val(kode);
                $('.stokBarang').val(stok);
                $('.hargaBarang').val(harga);
                $('.kategoriBarang').val(kategori);

                $('#modalView').modal('show');
            });

            $('.btn-update').on('click', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const kode = $(this).data('kode');
                const stok = $(this).data('stok');
                const harga = $(this).data('harga');
                const idKategori = $(this).data('ktgr');

                $('.namaBarang').val(name);
                $('.kodeBarang').val(kode);
                $('.stokBarang').val(stok);
                $('.hargaBarang').val(harga);
                $('.ktgr').val(idKategori).trigger('change');
                $('.idBarang').val(id);

                $('#modalUpdate').modal('show')
            });

            $('.btn-delete').on('click', function() {
                const id = $(this).data('id');

                $('.idBarang').val(id);

                $("#modalDelete").modal('show');
            });
        });
    </script>
</body>

</html>