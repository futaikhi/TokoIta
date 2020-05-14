<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view("template/head"); ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Transaksi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <p>
                                    <script>
                                        document.write(new Date().toDateString());
                                    </script>
                                </p>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Transaksi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kodeBarang">Kode Barang</label>
                                <input type="text" class="form-control" id="kodeBarang" name="kodeBarang" placeholder="Masukkan Kode Barang">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="tabelTransaksi">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode Barang</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Harga</th>
                                    </tr>
                                </thead>
                            </table>
                            <p>
                                <h4 class="float-left">Total : </h4>
                                <h4 class="float-right" id="total">Rp 0</h4>
                            </p>
                        </div>
                        <div class="card-footer clearfix">
                            <button class="float-right btn btn-primary" id="btnSubmit">Submit</button>
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
    <?php echo view("template/js"); ?>
    <script>
        $(document).delegate("p", "keypress", function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                var row = $(this).closest("tr").index();
                var cells = document.getElementById("tabelTransaksi").rows[row].cells;
                var link = cells[0].innerHTML;
                var jumlah = Number(this.innerHTML);
                getHarga(link, row, jumlah);
            }
        });

        function getHarga(link, row, jumlah) {
            var cells = document.getElementById("tabelTransaksi").rows[row].cells;
            $.get("<?php echo base_url('transaksi/getBarang/'); ?>" + "/" + link, function(data) {
                var result = JSON.parse(data);
                $.each(result, function(i, item) {
                    cells[3].innerHTML = jumlah * Number(item.harga);
                    var table = document.getElementById("tabelTransaksi");
                    var rowCount = document.getElementById('tabelTransaksi').rows.length;
                    updateTotal();
                });
            });
        }

        function updateTotal() {
            var table = document.getElementById("tabelTransaksi");
            var rowCount = document.getElementById('tabelTransaksi').rows.length;
            var jumlahTotal = 0;
            for (var i = 1; i < rowCount; i++) {
                var x = Number(table.rows[i].cells[3].innerHTML);
                jumlahTotal += x;
            }
            document.getElementById("total").innerHTML = "Rp " + jumlahTotal;
            return jumlahTotal;
        }

        $(document).ready(function() {

            function storeData() {
                $.post("<?php echo base_url("/transaksi/save") ?>", {
                    data: getDataTable(),
                    total: updateTotal()
                }, function(data) {
                    if (data == 1) {
                        alert("Tidak bisa konek Printer");
                    }
                });
            }

            $('#kodeBarang').keypress(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    var kode = document.getElementById("kodeBarang").value;
                    productUpdate(kode);
                    document.getElementById("kodeBarang").value = "";

                }
            });

            function getDataTable() {
                var table = document.getElementById("tabelTransaksi");
                var rowCount = document.getElementById('tabelTransaksi').rows.length;
                var data = [];
                for (var j = 1; j < rowCount; j++) {
                    var x = table.rows[j].cells;
                    var str = String(x[2].innerHTML);
                    var y = Number(str.slice(22, 23));
                    data.push([String(x[0].innerHTML), String(x[1].innerHTML), y, String(x[3].innerHTML), String(x[4].innerHTML)]);
                }
                return data;
            }

            document.getElementById("btnSubmit").onclick = function() {
                var table = document.getElementById("tabelTransaksi");
                var rowCount = document.getElementById('tabelTransaksi').rows.length;
                storeData();
                document.getElementById("total").innerHTML = "Rp 0";
                for (var index = 1; index < rowCount; index++) {
                    table.deleteRow(1);
                }
            };

            function productUpdate(lala) {
                var table = document.getElementById("tabelTransaksi");
                var rowCount = document.getElementById('tabelTransaksi').rows.length;
                var index = 0;
                $.get("<?php echo base_url('transaksi/getBarang/'); ?>" + "/" + lala, function(data) {
                    if (data == "Kosong") {
                        alert("Barang Tidak Ditemukan");
                    }
                    var result = JSON.parse(data);
                    $.each(result, function(i, item) {
                        while (index < rowCount) {
                            var z = table.rows[index].cells;
                            if (lala.includes(String(z[0].innerHTML))) {
                                var x = table.rows[index].cells;
                                var str = String(x[2].innerHTML);
                                var y = Number(str.slice(22, 23)) + 1;
                                x[2].innerHTML = "<p contenteditable>" + y + "</p>";
                                x[3].innerHTML = y * Number(item.harga);
                                updateTotal();
                                table.deleteRow(rowCount);
                                break;
                            }
                            index++;
                        }
                        var row = table.insertRow(rowCount);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        cell1.innerHTML = item.kodeBarang;
                        cell2.innerHTML = item.nama;
                        cell3.innerHTML = "<p contenteditable>1</p>";
                        cell4.innerHTML = item.harga;
                        cell5.style.display = "none";
                        cell5.innerHTML = item.idBarang;
                        updateTotal();
                    });
                });
            }
        });
    </script>
</body>

</html>