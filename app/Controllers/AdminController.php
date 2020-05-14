<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class AdminController extends BaseController
{
    public function index()
    {

        $model = new PegawaiModel();
        if ($model->isAdmin()) {
            $data['req'] = $this->request->uri->getSegment(2);
            return view('admin/admin', $data);
        } else {
            return redirect()->to(base_url());
        }
    }

    //--------------------------------------------------------------------

}
