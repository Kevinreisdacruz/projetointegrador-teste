<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuario extends BaseController
{
    public function administracao()
    {
        return view('templates/navbar') .
        view('administracao') .
        view('templates/footer');
    }

    public function tableadmins()
    {
        return view('templates/navbar') .
        view('tableadmins') .
        view('templates/footer');
    }

    public function tableclientes(){
        return view('templates/navbar').
        view('tableclientes').
        view('templates/footer');
    }

    public function carrinho(){
        return view('templates/navbar').
        view('carrinho').
        view('templates/footer');
    }

    public function pagamento()
    {
        return view('templates/navbar').
        view('pagamento').
        view('templates/footer');
    }

}
