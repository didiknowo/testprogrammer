<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBerita;
use App\Models\ModelKategori;

class ManajemenBerita extends BaseController
{
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita();
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
         // Akses Login
         if (!session('user')) {
            return redirect()->to('Login');
         }

        $data =[
            'judul' => 'Data Berita',
            'subjudul' => 'Berita',
            'menu' => 'berita',
            'submenu'  => '',
            'page' => 'v_berita',
            'berita' => $this->ModelBerita->alldata(),
            'kategori' => $this->ModelKategori->alldata()
        ];
        return view('tampilan/v_header', $data).
        view('tampilan/v_template', $data).
        view('tampilan/v_footer');
    }

    public function tambahdata()
    {
        $data = [
            'berita_id'    => $this->request->getpost('berita_id'),
            'judul_berita' => $this->request->getpost('judul_berita'),
            'isi_berita'   => $this->request->getpost('isi_berita'),
            'kategori_id'  => $this->request->getpost('kategori_id')
        ];

        $this->ModelBerita->tambahdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('ManajemenBerita');
    }

    public function updatedata($berita_id)
    {
        $data = [
            'berita_id'    => $berita_id,
            'judul_berita' => $this->request->getpost('judul_berita'),
            'isi_berita'   => $this->request->getpost('isi_berita'),
            'kategori_id'  => $this->request->getpost('kategori_id')
        ];

        $this->ModelBerita->updatedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to('ManajemenBerita');
    }

    public function hapusdata($berita_id)
    {
        $data = [
            'berita_id' => $berita_id,
        ];
        $this->ModelBerita->hapusdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!');
        return redirect()->to('ManajemenBerita');
    }
}
