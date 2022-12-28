<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    public function alldata()
    {
        return $this->db->table('berita')
        ->join('kategori', 'kategori.kategori_id=berita.kategori_id')
        ->get()
        ->getResultArray();
    }

    public function tambahdata($data)
    {
        $this->db->table('berita')->insert($data);
    }

    public function updatedata($data)
    {
        $this->db->table('berita')
        ->where('berita_id', $data['berita_id'])
        ->update($data);
    }

    public function hapusdata($data)
    {
        $this->db->table('berita')
        ->where('berita_id', $data['berita_id'])
        ->delete($data);
    }

    public function totalberita()
    {
      return $this->db->table('berita')
      ->countAllResults();
  }
}
