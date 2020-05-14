<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    public function getTransaksi($id = null)
    {
        if (!empty($id)) {
            return $this->getWhere(['idTransaksi' => $id])->getResultArray();
        } else {
            return $this->findAll();
        }
    }

    public function getMax()
    {
        $this->selectMax('idTransaksi');
        return $this->get()->getResult();
    }

    public function saveTransaksi($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteTransaksi($id)
    {
        $query = $this->db->table($this->table)->delete(array('idTransaksi' => $id));
        return $query;
    }

    public function updateTransaksi($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idTransaksi' => $id));
        return $query;
    }
}
