<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table = 'detailtransaksi';

    public function getDetailTransaksi($id = null)
    {
        if (!empty($id)) {
            return $this->getWhere(['idTransaksi' => $id])->getResultArray();
        } else {
            return $this->findAll();
        }
    }

    public function saveDetailTransaksi($data)
    {
        $query = $this->insertBatch($data);
        return $query;
    }

    public function deleteDetailTransaksi($id)
    {
        $query = $this->db->table($this->table)->delete(array('idTransaksi' => $id));
        return $query;
    }

    public function updateDetailTransaksi($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idTransaksi' => $id));
        return $query;
    }
}
