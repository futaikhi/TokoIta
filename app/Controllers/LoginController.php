<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class LoginController extends BaseController
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
            return redirect()->to(base_url("admin/home"));
        } else {
            return view('admin/login');
        }
    }

    public function login()
    {
        $session = \Config\Services::session();
        try {
            $name = $this->request->getPost("name");
            $telp = $this->request->getPost("password");
            $model = new PegawaiModel();
            $lala = $model->doLogin($name, $telp);
            // $session->set($lala);
            if ($lala == "false") {
                $session->setFlashdata('errors', "Password Salah");
                return redirect()->to(base_url());
            } else {
                $newdata = [
                    'idPegawai'  => $lala[0]['idPegawai'],
                    'Password'     => $lala[0]['noTelp'],
                    'nama' => $lala[0]['nama'],
                    'peran' => $lala[0]['idPeran'],
                    'logged_in' => TRUE
                ];

                $session->set($newdata);
                return redirect()->to(base_url("admin/home"));
            }
        } catch (\Exception $e) {
            die($e->get->getMessage());
        }
    }

    public function loginPegawai()
    {
        $session = \Config\Services::session();
        try {
            $name = $this->request->getPost("name");
            $telp = $this->request->getPost("password");
            $model = new PegawaiModel();
            $lala = $model->doLoginPegawai($name, $telp);
            // $session->set($lala);
            if ($lala == "false") {
                $session->setFlashdata('errors', "Password Salah");
                return redirect()->to(base_url());
            } else {
                $newdata = [
                    'idPegawai'  => $lala[0]['idPegawai'],
                    'Password'     => $lala[0]['noTelp'],
                    'nama' => $lala[0]['nama'],
                    'peran' => $lala[0]['idPeran'],
                    'logged_in' => TRUE
                ];

                $session->set($newdata);
                return redirect()->to(base_url("transaksi"));
            }
        } catch (\Exception $e) {
            die($e->get->getMessage());
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    //--------------------------------------------------------------------

}
