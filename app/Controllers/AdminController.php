<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PegawaiModel;
use App\Models\TransaksiModel;

class AdminController extends BaseController
{
    public function index()
    {

        $model = new PegawaiModel();
        $barang = new BarangModel();
        $transaksi = new TransaksiModel();
        $pegawai = new PegawaiModel();
        if ($model->isAdmin()) {
            $data['req'] = $this->request->uri->getSegment(2);
            $data['jumlahBarang'] = $barang->getJumlahBarang();
            $data['jumlahTransaksi'] = $transaksi->getJumlahTransaksi();
            $data['jumlahPegawai'] = $pegawai->getJumlahPegawai();
            $data['bulan'] = $transaksi->getNamaBulan();
            $data['jumlahBulanan'] = $transaksi->getTransaksiBulanan();
            // var_dump($transaksi->getTransaksiBulanan());
            return view('admin/admin', $data);
        } else {
            return redirect()->to(base_url());
        }
    }

    //--------------------------------------------------------------------

}
