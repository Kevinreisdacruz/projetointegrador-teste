<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuario extends BaseController
{
    public function administracao()
    {
        $titulos['title']='ADMINISTRACAO';
        return view('templates/navbar', $titulos) .
        view('administracao') .
        view('templates/footer');
    }

    public function tableclientes(){
        $titulos['title']='TABELA DE CLIENTES';
        return view('templates/navbar', $titulos).
        view('tableclientes').
        view('templates/footer');
    }
    public function tableadmins()
    {
        $titulos['title']='TABELA DE ADMINS';
        return view('templates/navbar', $titulos) .
        view('tableadmins') .
        view('templates/footer');
    }


    public function carrinho(){
        $titulos['title']='CARRINHO';
        return view('templates/navbar', $titulos).
        view('carrinho').
        view('templates/footer');
    }

    public function cep(){
        $titulos['title']='ENDEREÇO';
        return view('templates/navbar', $titulos).
        view('cadcep').
        view('templates/footer');
    }
    

    public function pagamento()
    {
        $titulos['title']='FORMA DE PAGAMENTO';
        return view('templates/navbar', $titulos).
        view('pagamento').
        view('templates/footer');
    }

    public function pagamentocartao()
    {
        $titulos['title']='PAGAMENTO CARTÃO';
        return view('templates/navbar', $titulos).
        view('pagamentocartao').
        view('templates/footer');
    }

    public function agradecimento()
    {
        $titulos['title']='AGRADECIMENTO';
        return view('templates/navbar', $titulos).
        view('agradecimento').
        view('templates/footer');
    }

}
