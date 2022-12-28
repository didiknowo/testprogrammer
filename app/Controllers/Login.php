<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;


class Login extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        return view('v_login');
    }

    public function register()
    {
        return view('v_register');
    }

    public function proses_login()
    {
        $data = [
            'username' => $this->request->getpost('username'),
            'password' => $this->request->getpost('password'),
        ];

        $hasil = $this->ModelAuth->login($data);
        if ($hasil=='sukses') {
            session()->setFlashdata('pesan', 'Login Sukses!!');
            return redirect()->to('Dasboard');
        }else{
            session()->setFlashdata('gagal', 'Login Gagal. Silahkan Cek ulang !!');
            return redirect()->to('Login');
        }
    }

    public function proses_register()
    {
     //set rules validation 
        $rules = [
          'user_id'   => 'required|min_length[3]|max_length[20]|is_unique[user.user_id]',
          'username'  => 'required|min_length[3]|max_length[20]',
          'password'  => 'required|min_length[6]|max_length[200]',
          'password_conf'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $data = [
                'user_id' => $this->request->getpost('user_id'),
                'username' => $this->request->getpost('username'),
                'password' => sha1($this->request->getpost('password'))
            ];

            $this->ModelAuth->proses_register($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil Silahkan Login !!');
            return redirect()->to('Login');
        }else
        {
            session()->setFlashdata('gagal', 'Registrasi Gagal !!');
            return redirect()->to('Login/register');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('Login');
    }
    
}
