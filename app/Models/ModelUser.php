<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function alldata()
    {
        return $this->db->table('user')
        ->get()
        ->getResultArray();
    }

    public function tambahdata($data)
    {
     $this->db->table('user')->insert($data);
    }

    public function updatedata($data)
    {
        $this->db->table('user')
        ->where('user_id', $data['user_id'])
        ->update($data);
    }

    public function hapusdata($data)
    {
        $this->db->table('user')
        ->where('user_id', $data['user_id'])
        ->delete($data);
    }

    public function totaluser()
	{
		return $this->db->table('user')
		->countAllResults();
	}
}
