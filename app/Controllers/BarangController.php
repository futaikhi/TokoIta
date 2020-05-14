<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\PegawaiModel;

class BarangController extends BaseController
{
    public function index()
    {
        $model = new PegawaiModel();
        if ($model->isAdmin()) {
            $model = new KategoriModel();
            $data['kategori'] = $model->getKategori();
            $model = new BarangModel();
            $data['barang'] = $model->getBarang();
            $data['req'] = $this->request->uri->getSegment(2);
            return view('admin/barang', $data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function insert()
    {
        $model = new BarangModel();
        $data = array(
            'kodeBarang'  => $this->request->getPost('kodeBarang'),
            'nama'  => $this->request->getPost('namaBarang'),
            'stok'  => $this->request->getPost('stok'),
            'harga'  => $this->request->getPost('harga'),
            'idKategori'  => $this->request->getPost('kategori'),
        );
        $model->saveBarang($data);
        return redirect()->to(base_url("admin/barang"));
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $model = new BarangModel();
        $model->deleteBarang($id);
        return redirect()->to(base_url("admin/barang"));
    }

    public function update()
    {
        $model = new BarangModel();
        $id = $this->request->getPost('id');
        $data = array(
            'kodeBarang'  => $this->request->getPost('kodeBarang'),
            'nama'  => $this->request->getPost('namaBarang'),
            'stok'  => $this->request->getPost('stok'),
            'harga'  => $this->request->getPost('harga'),
            'idKategori'  => $this->request->getPost('ktgr'),
        );
        $model->updateBarang($data, $id);
        return redirect()->to(base_url("admin/barang"));
    }
}
