<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AboutController extends BaseController
{
    public function index()
    {
        $biodata = [
            "nama" => "Rosyad Aditya Nugroho",
            "alamat" => "Jl. Melinjau Gg.Melinjau 9 Binjai Utara",
            "deskripsi" => "Seorang mahasiswa semester 4 di Politeknik Negeri Medan Program Studi Rekayasa Perangkat Lunak",
            "hobi" => "Ngoding",
            "cita_cita" => "Backend Developer",
        ];
        return view('about', $biodata);
    }
}
