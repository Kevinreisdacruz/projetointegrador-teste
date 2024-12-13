<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {
        $titulos['title']='PAGINA INICIAL';
        return view('templates/navbar', $titulos).
        view('index').
        view('templates/footer');
    }

    
}
