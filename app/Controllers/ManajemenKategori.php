<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class ManajemenKategori extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
         // Akses Login
         if (!session('user')) {
            return redirect()->to('Login');
         }

        $data =[
            'judul' => 'Data Kategori',
            'subjudul' => 'Kategori',
            'menu' => 'kategori',
            'submenu'  => '',
            'page' => 'v_kategori',
            'kategori' => $this->ModelKategori->alldata()
        ];

        return view('tampilan/v_header',$data).
        view('tampilan/v_template', $data).
        view('tampilan/v_footer');
    }

    public function tambahdata()
    {
        $data = [
            'kategori_id' => $this->request->getpost('kategori_id'),
            'kategori' => $this->request->getpost('kategori')
        ];

        $this->ModelKategori->tambahdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('ManajemenKategori');
    }

    public function updatedata($kategori_id)
    {
        $data = [
            'kategori_id' => $kategori_id,
            'kategori' => $this->request->getpost('kategori')
        ];

        $this->ModelKategori->updatedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to('ManajemenKategori');
    }

    public function hapusdata($kategori_id)
    {
        $data = [
            'kategori_id' => $kategori_id,
        ];
        $this->ModelKategori->hapusdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!');
        return redirect()->to('ManajemenKategori');
    }
}
