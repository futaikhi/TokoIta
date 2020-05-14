<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
    }

    public function index()
    {
        $model = new PegawaiModel();
        if ($model->isAdmin()) {
            $data['pegawai'] = $model->getPegawai();
            $data['peran'] = $model->getPeran();
            $data['req'] = $this->request->uri->getSegment(2);
            return view('admin/pegawai', $data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function insert()
    {
        $model = new PegawaiModel();
        $data = array(
            'noTelp'  => $this->request->getPost('noTelp'),
            'nama'  => $this->request->getPost('nama'),
            'idPeran'  => $this->request->getPost('peran'),
        );
        $model->savePegawai($data);
        return redirect()->to(base_url("admin/pegawai"));
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $model = new PegawaiModel();
        $model->deletePegawai($id);
        return redirect()->to(base_url("admin/pegawai"));
    }

    public function update()
    {
        $model = new PegawaiModel();
        $id = $this->request->getPost('id');
        $data = array(
            'noTelp'  => $this->request->getPost('noTelp'),
            'nama'  => $this->request->getPost('nama'),
            'idPeran'  => $this->request->getPost('prn'),
        );
        $model->updatePegawai($data, $id);
        return redirect()->to(base_url("admin/pegawai"));
    }
}
