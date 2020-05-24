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

    public function getNamaBulan()
    {
        $this->select('MONTHNAME(tanggal) as bulan');
        $this->groupBy("bulan");
        $this->orderBy("tanggal");
        return $this->get()->getResult();
    }

    public function getTransaksiBulanan()
    {
        $this->select('count(MONTHNAME(tanggal)) as jumlahBulanan');
        $this->groupBy("MONTHNAME(tanggal)");
        $this->orderBy("tanggal");
        return $this->get()->getResult();
    }

    public function getJumlahTransaksi()
    {
        return $this->countAllResults();
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
