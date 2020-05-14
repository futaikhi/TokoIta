<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'setting';

    public function getPrinter()
    {
        return $this->findAll();
    }

    public function savePrinter($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deletePrinter($id)
    {
        $query = $this->db->table($this->table)->delete(array('idSetting' => $id));
        return $query;
    }

    public function updatePrinter($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idSetting' => $id));
        return $query;
    }
}
