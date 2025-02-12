<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatalogoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {

    
        $catalogos = new CatalogoModel();

        if(! session()->get('carrinho')){
        
            session()->set('carrinho',[
                'item' => [],
            ]);
        }

    
        $titulos['title']='PAGINA INICIAL';
        return view('templates/navbar', $titulos).
        view('index', ['catalogos' => $catalogos->findAll()]).
        view('templates/footer');
    }

    
}
