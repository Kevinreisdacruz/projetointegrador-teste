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

    public function cardapiomassa()
    {
        return view('templates/navbar').
        view('cardapiomassa').
        view('templates/footer');
    }

    public function cardapiomilkshake()
    {
        return view('templates/navbar').
        view('cardapiomilkshake').
        view('templates/footer');
    }

    public function cardapiopicole()
    {
        return view('templates/navbar').
        view('cardapiopicoles').
        view('templates/footer');
    }
}
