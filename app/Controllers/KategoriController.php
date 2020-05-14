<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\PegawaiModel;

class KategoriController extends BaseController
{
    public function index()
    {
        $model = new PegawaiModel();
        if ($model->isAdmin()) {
            $model = new KategoriModel();
            $data['kategori'] = $model->getKategori();
            $data['req'] = $this->request->uri->getSegment(2);
            return view('admin/kategori', $data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function insert()
    {
        $model = new KategoriModel();
        $data = array(
            'nama'  => $this->request->getPost('kategori'),
        );
        $model->saveKategori($data);
        return redirect()->to(base_url("admin/kategori"));
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $model = new KategoriModel();
        $model->deleteKategori($id);
        return redirect()->to(base_url("admin/kategori"));
    }

    public function update()
    {
        $model = new KategoriModel();
        $id = $this->request->getPost('id');
        $data = array('nama' => $this->request->getPost('nama'),);
        $model->updateKategori($data, $id);
        return redirect()->to(base_url("admin/kategori"));
    }
}
