<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produtos extends BaseController
{
    public function addcatalogo()
    {
        $titulos['title']='ADICIONAR CATÁLOGO';
        return view('templates/navbar', $titulos).
        view('addcatalogo').
        view('templates/footer');
    }

    public function atualizarcatalogo()
    {
        $titulos['title']='ATUALIZAR CATÁLOGO';
        return view('templates/navbar', $titulos).
        view('atualizarcatalogo').
        view('templates/footer');
    }

    public function addproduto()
    {
        $titulos['title']='ADICIONAR PRODUTO';
        return view('templates/navbar', $titulos).
        view('addproduto').
        view('templates/footer');
    }

    public function atualizarproduto()
    {
        $titulos['title']='ATUALIZAR PRODUTO';
        return view('templates/navbar', $titulos).
        view('atualizarproduto').
        view('templates/footer');
    }

    public function cardapiomassa()
    {
        $titulos['title']='CARDÁPIO MASSAS';
        return view('templates/navbar', $titulos).
        view('cardapiomassa').
        view('templates/footer');
    }

    public function cardapiomilkshake()
    {
        $titulos['title']='CARDÁPIO MILKSHAKES';
        return view('templates/navbar', $titulos).
        view('cardapiomilkshake').
        view('templates/footer');
    }

    public function cardapiopicole()
    {
        $titulos['title']='CARDÁPIO PICOLES';
        return view('templates/navbar', $titulos).
        view('cardapiopicoles').
        view('templates/footer');
    }
}
