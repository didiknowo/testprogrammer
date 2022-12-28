<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login($data)
    {
       $cek = $this->db->table('user')
       ->where('username', $data['username'])
       ->where('password', sha1($data['password']))
       ->get()
       ->getRowArray();
    //Cek KONDISI data di Table Admin
       if(!empty($cek)){
           session()->set('user', $cek);
           return 'sukses';
       }else{
           return 'gagal';
       }
    }

    public function proses_register($data)
    {
      $this->db->table('user')->insert($data);
    }
}