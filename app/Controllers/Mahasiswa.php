<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $mhsModel = new ModelMahasiswa();
        $prodiModel = new ModelProdi();
        $data = [
            "title" => "TRPL-4C | Data Mahasiswa",
            "mahasiswa" => $mhsModel->findAll(),
            "prodi" => $prodiModel->getJurusanProdi()
        ];
        dd($data);
        // return view("mahasiswa/v_mahasiswa", $data);
    }
}
