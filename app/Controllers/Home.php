<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view("template/v_template");
    }

    public function fungsi1()
    {
        echo "fungsi";
    }

    public function tampilNama($seg1)
    {
        echo $seg1;
    }

}
