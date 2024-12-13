<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produtos extends BaseController
{
    public function addcatalogo()
    {
        return view('templates/navbar').
        view('addcatalogo').
        view('templates/footer');
    }

    public function addproduto()
    {
        return view('templates/navbar').
        view('addproduto').
        view('templates/footer');
    }
}
