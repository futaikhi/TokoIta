<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\DetailTransaksiModel;
use App\Models\PegawaiModel;
use App\Models\SettingModel;
use App\Models\TransaksiModel;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class TransaksiController extends BaseController
{
    public function index()
    {

        $model = new PegawaiModel();
        if ($model->isLogin()) {
            return view('transaksi');
        } else {
            return redirect()->to(base_url());
        }
    }

    public function getBarang($id)
    {
        $model = new BarangModel();
        if (empty($model->getBarang($id))) {
            echo "Kosong";
        } else {
            echo json_encode($model->getBarang($id));
        }
    }

    public function insertTransaksi()
    {
        $print = $this->print();
        if ($print) {
            $session = \Config\Services::session();
            $model = new TransaksiModel();
            $dataTable = $this->request->getPost('data');
            $date = date('Y-m-d H:i:s');
            $data = array(
                'tanggal'  => $date,
                'totalHarga'  => $this->request->getPost('total'),
                'idPegawai'  => $session->get('idPegawai')
            );
            $model->saveTransaksi($data);
            $this->insertDetailTransaksi($dataTable);
            return true;
        } else {
            return 1;
        }
    }

    public function insertDetailTransaksi($dataTable)
    {
        $transaksi = new TransaksiModel();
        $model = new DetailTransaksiModel();
        $data = array();
        $index = 0; // Set index array awal dengan 0
        foreach ($dataTable as $i) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            $data[] = array(
                'idTransaksi' => $transaksi->getMax()[0]->idTransaksi,
                'idBarang' => $i[4],  // Ambil dan set data nama sesuai index array dari $index
                'jumlah' => $i[2],  // Ambil dan set data telepon sesuai index array dari $index
                'diskon' => "0",  // Ambil dan set data alamat sesuai index array dari $index
            );

            $index++;
        }
        $model->saveDetailTransaksi($data);
    }

    public function print()
    {
        $session = \Config\Services::session();
        if ($session->get('logged_in')) {

            function buatKolom($kolom1, $kolom2, $kolom3)
            {
                // Mengatur lebar setiap kolom (dalam satuan karakter)
                $lebar_kolom_1 = 12;
                $lebar_kolom_2 = 8;
                $lebar_kolom_3 = 8;

                // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
                $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
                $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
                $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);

                // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
                $kolom1Array = explode("\n", $kolom1);
                $kolom2Array = explode("\n", $kolom2);
                $kolom3Array = explode("\n", $kolom3);

                // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
                $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));

                // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
                $hasilBaris = array();

                // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
                for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                    // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                    $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                    $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

                    // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                    $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);

                    // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                    $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
                }

                // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
                return implode($hasilBaris) . "\n";
            }

            try {
                $model = new SettingModel();
                $printer = $model->getPrinter()['0']['nama'];
                $data = $this->request->getPost('data');
                $total = $this->request->getPost('total');
                // Enter the device file for your USB printer here
                $connector = new WindowsPrintConnector($printer);

                /* Print a "Hello world" receipt" */
                $printer = new Printer($connector);
                $printer->feed(2);
                $printer->initialize();
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("Toko Mbak ITA \n");
                $printer->text("\n");
                $printer->text("TRANSKSI\n\n\n");
                $printer->initialize();
                $printer->text("--------------------------------\n");
                $printer->text(buatKolom("Nama", ": " . $session->get('nama'), "",));
                $printer->text(buatKolom("No Telp", ": " .  $session->get('Password'), "",));
                $printer->text("--------------------------------\n");
                $printer->text(buatKolom("Barang", "Jumlah", "Harga",));
                $printer->text("--------------------------------\n");
                for ($i = 0; $i < count($data); $i++) {
                    $printer->text(buatKolom($data[$i][1], $data[$i][2], $data[$i][3]));
                }
                $printer->text("--------------------------------\n");
                $printer->text(buatKolom("Total", "", $total,));
                $printer->text("\n\n\n");

                $printer->initialize();
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("Terima kasih telah berbelanja\n");
                $printer->text("di TOKO ITA\n");
                $printer->feed(4);
                $printer->cut();

                /* Close printer */
                $printer->close();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    //--------------------------------------------------------------------

}
