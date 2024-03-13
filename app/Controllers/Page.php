<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Page extends BaseController
{
    public function tampilParameter($nama, $alamat)
    {
        echo "nama saya $nama\n";
        echo "alamat saya di $alamat";
    }

    public function tampilUmur($umur)
    {
        echo "umur saya $umur";
    }

    public function mahasiswa()
    {
        $data["title"] = "TRPL-4C | Data Mahasiswa";
        $data["nama"] = "Rosyad Aditya Nugroho";
        $data["alamat"] = "Binjai";
        return view("mahasiswa/v_mahasiswa", $data);
    }

    public function dosen()
    {
        $data["title"] = "TRPL-4C | Data Dosen";
        $data["nama"] = "Prof Mahfud Md";
        $data["nidn"] = 123456;
        return view("dosen/v_dosen", $data);
    }

    public function matakuliah()
    {
        $data["title"] = "TRPL-4C | Data Mata kuliah";
        $data["nama"] = "Pemrograman Web Lanjut";
        $data["sks"] = 3;
        return view("matkul/v_matkul", $data);
    }
}
