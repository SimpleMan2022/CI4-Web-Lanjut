<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;


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
        // dd($data);
        return view("mahasiswa/v_mahasiswa", $data);
    }

    public function store()
    {
        $nim = $this->request->getVar("nim");
        $nama = $this->request->getVar("nama");
        $alamat = $this->request->getVar("alamat");
        $jk = $this->request->getVar("jk");
        $kd_prodi = explode("-", $this->request->getVar("kode_prodi"));

        $data = [
            "nim" => $nim,
            "nama" => $nama,
            "alamat" => $alamat,
            "jenkel" => $jk,
            "id_jurusan" => $kd_prodi[0],
            "kode_prodi" => $kd_prodi[1]
        ];

        $mhsModel = new ModelMahasiswa();

        $isNimDuplicate = $mhsModel->where("nim", $nim)->first();
        if ($isNimDuplicate) {
            return redirect()->to("/mahasiswa")->with("error", "Gagal, NIM sudah terdaftar");
        } else {
            $mhsModel->insert($data);
            return redirect()->to("/mahasiswa")->with("success", "Data mahasiswa berhasil ditambahkan");
        }
    }

    public function update()
    {
        $nim = $this->request->getVar("nim");
        $nama = $this->request->getVar("nama");
        $alamat = $this->request->getVar("alamat");
        $jk = $this->request->getVar("jk");
        $kd_prodi = explode("-", $this->request->getVar("kode_prodi"));

        $data = [
            "nim" => $nim,
            "nama" => $nama,
            "alamat" => $alamat,
            "jenkel" => $jk,
            "id_jurusan" => $kd_prodi[0],
            "kode_prodi" => $kd_prodi[1]
        ];
        $mhsModel = new ModelMahasiswa();
        $mhsModel->update($nim, $data);

        return redirect()->to("/mahasiswa")->with("success", "Data mahasiswa berhasil diubah");
    }

    public function delete()
    {
        $nim = $this->request->getVar("nim");

        $mhsModel = new ModelMahasiswa();
        $mhsModel->delete($nim);

        return redirect()->to("/mahasiswa")->with("success", "Data mahasiswa berhasil dihapus");
    }
}
