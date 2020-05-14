<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';

    public function getPegawai()
    {
        $this->select('idPegawai,pegawai.nama as namaPegawai,peran.nama as namaPeran,pegawai.idPeran as idPeran,noTelp');
        $this->join('peran', 'pegawai.idPeran = peran.idPeran');
        return $this->get()->getResultArray();
    }

    public function getPeran()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('peran');
        return $builder->get()->getResultArray();
    }

    public function savePegawai($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deletePegawai($id)
    {
        $query = $this->db->table($this->table)->delete(array('idPegawai' => $id));
        return $query;
    }

    public function updatePegawai($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPegawai' => $id));
        return $query;
    }

    public function doLogin($name, $telp)
    {
        $this->where('nama', $name);
        $this->where('noTelp', $telp);
        $this->where('idPeran', '1');
        $login = $this->get()->getResultArray();
        if ($login == NULL) {
            return "false";
        } else {
            return $login;
        }
    }

    public function isLogin()
    {
        $session = \Config\Services::session();
        if ($session->get('logged_in')) {
            return true;
        } else {
            return false;
        }
    }
}
