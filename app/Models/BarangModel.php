<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';

    public function getBarang($id = null)
    {
        if (!empty($id)) {
            return $this->getWhere(['kodeBarang' => $id])->getResultArray();
        } else {
            $this->select('idBarang,kodeBarang,barang.nama as nama,stok,harga,kategori.nama as namaKategori,barang.idKategori as idKategori');
            $this->join('kategori', 'kategori.idKategori = barang.idKategori');
            return $this->get()->getResultArray();
        }
    }

    public function saveBarang($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteBarang($id)
    {
        $query = $this->db->table($this->table)->delete(array('idBarang' => $id));
        return $query;
    }

    public function updateBarang($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idBarang' => $id));
        return $query;
    }
}
