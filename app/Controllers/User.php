<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
         // Akses Login
         if (!session('user')) {
            return redirect()->to('Login');
         }
         
        $data =[
            'judul' => 'Data User',
            'subjudul' => 'User',
            'menu' => 'user',
            'submenu'  => '',
            'page' => 'v_user',
            'user' => $this->ModelUser->alldata()
        ];

        return view('tampilan/v_header', $data).
        view('tampilan/v_template', $data).
        view('tampilan/v_footer');
    }

    public function tambahdata()
    {
        $data = [
            'user_id' => $this->request->getpost('user_id'),
            'username' => $this->request->getpost('username'),
            'password' => sha1($this->request->getpost('password'))
        ];

        $this->ModelUser->tambahdata($data);
        session()->setFlashdata('pesan', 'User Baru Berhasil Ditambahkan !!');
        return redirect()->to('User');
    }

    public function updatedata($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'username' => $this->request->getpost('username'),
            'password' => sha1($this->request->getpost('password'))
        ];

        $this->ModelUser->updatedata($data);
        session()->setFlashdata('pesan', 'Data User Berhasil Diupdate !!');
        return redirect()->to('User');
    }

    public function hapusdata($user_id)
    {
        $data = [
            'user_id' => $user_id,
        ];
        $this->ModelUser->hapusdata($data);
        session()->setFlashdata('pesan', 'Data User Berhasil Dihapus !!');
        return redirect()->to('User');
    }
}
