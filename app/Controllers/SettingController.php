<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\SettingModel;
use CodeIgniter\Controller;

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class SettingController extends BaseController
{

    public function index()
    {
        $model = new PegawaiModel();
        if ($model->isAdmin()) {
            $data['req'] = $this->request->uri->getSegment(2);
            $model = new SettingModel();
            $data['printer'] = $model->getPrinter()['0']['nama'];
            $data['namaToko'] = $model->getPrinter()['0']['namaToko'];
            return view('admin/setting', $data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function setPrinter()
    {
        $model = new SettingModel();
        $id = '1';
        $data = array(
            'nama'  => $this->request->getPost('printer')
        );
        $model->updatePrinter($data, $id);
        return redirect()->to(base_url("admin/setting"));
    }

    public function setToko()
    {
        $model = new SettingModel();
        $id = '1';
        $data = array(
            'namaToko'  => $this->request->getPost('toko')
        );
        $model->updatePrinter($data, $id);
        return redirect()->to(base_url("admin/setting"));
    }
}
