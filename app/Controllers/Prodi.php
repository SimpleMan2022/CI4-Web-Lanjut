<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;
use App\Models\ModelProdi;

class Prodi extends BaseController
{
    public function index()
    {
        $currentPage = $this->request->getVar("page_prodi") ? $this->request->getVar("page_prodi") : 1;

        $jurusanModel = new ModelJurusan();
        $prodiModel = new ModelProdi();

        $data["title"] = "TRPL-4C | Data Prodi";
        $data["jurusan"] = $jurusanModel->findAll();
        $data["prodi"] = $prodiModel->paginate(10, "prodi");
        $data["pager"] = $prodiModel->pager;
        $data["currentPage"] = $currentPage;
        return view("prodi/v_prodi", $data);
    }

    public function store()
    {
        $id_jurusan = $this->request->getVar("id_jurusan");
        $kode_prodi = $this->request->getVar("kode_prodi");
        $nama_program_studi = $this->request->getVar("nama_program_studi");
        $data = [
            "id_jurusan" => $id_jurusan,
            "kode_program_studi" => $kode_prodi,
            "nama_program_studi" => $nama_program_studi
        ];

        $prodiModel = new ModelProdi();
        $prodiModel->insert($data);
        return redirect()->to("/prodi")->with("success", "Data prodi berhasil ditambahkan");
    }
}
