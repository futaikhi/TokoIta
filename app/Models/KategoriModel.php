<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';

    public function getKategori()
    {
        return $this->findAll();
    }

    public function saveKategori($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteKategori($id)
    {
        $query = $this->db->table($this->table)->delete(array('idKategori' => $id));
        return $query;
    }

    public function updateKategori($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idKategori' => $id));
        return $query;
    }
}
