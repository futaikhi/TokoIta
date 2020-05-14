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
        if ($model->isLogin()) {
            $data['req'] = $this->request->uri->getSegment(2);
            $model = new SettingModel();
            $data['printer'] = $model->getPrinter()['0']['nama'];
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
}
