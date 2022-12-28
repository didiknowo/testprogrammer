<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    public function alldata()
    {
        return $this->db->table('kategori')
        ->get()
        ->getResultArray();
    }

    public function tambahdata($data)
    {
     $this->db->table('kategori')->insert($data);
    }

    public function updatedata($data)
    {
        $this->db->table('kategori')
        ->where('kategori_id', $data['kategori_id'])
        ->update($data);
    }

    public function hapusdata($data)
    {
        $this->db->table('kategori')
        ->where('kategori_id', $data['kategori_id'])
        ->delete($data);
    }

    public function totalkategori()
	{
		return $this->db->table('kategori')
		->countAllResults();
	}
}
