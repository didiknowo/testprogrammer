<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBerita;
use App\Models\ModelKategori;
use App\Models\ModelUser;

class Dasboard extends BaseController
{
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita();
        $this->ModelKategori = new ModelKategori();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        // Akses Login
        if (!session('user')) {
            return redirect()->to('Login');
        }

        $data =[
            'judul' => 'Dasboard',
            'subjudul' => '',
            'menu' =>'dasboard',
            'submenu' =>'',
            'page' => 'v_dasboard',
            'totalberita' => $this->ModelBerita->totalberita(),
            'totalkategori' => $this->ModelKategori->totalkategori(),
            'totaluser' => $this->ModelUser->totaluser()
        ];
        return view('tampilan/v_header', $data).
        view('tampilan/v_template', $data).
        view('tampilan/v_footer');
    }
}
