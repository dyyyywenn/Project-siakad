<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFalkutas extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_falkutas')
            ->orderBy('id_falkutas', 'DESC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_falkutas')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_falkutas')
            ->where('id_falkutas', $data['id_falkutas'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_falkutas')
        ->where('id_falkutas', $data['id_falkutas'])
        ->delete($data);
    }
}
