<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;
use CodeIgniter\HTTP\ResponseInterface;

class Jurusan extends BaseController
{
    public function index()
    {
        $jurusanModel = new ModelJurusan();
        $data["title"] = "TRPL-4C | Data Prodi";
        $data["jurusan"] = $jurusanModel->findAll();
        return view("jurusan/v_jurusan", $data);
    }

    public function store()
    {
        $nama_jurusan = $this->request->getVar("nama_jurusan");
        $data = [
            "nama_jurusan" => $nama_jurusan
        ];
        $jurusanModel = new ModelJurusan();
        $jurusanModel->insert($data);
        return redirect()->to("/jurusan")->with("success", "Data jurusan berhasil ditambahkan");
    }
}
