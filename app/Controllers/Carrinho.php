<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdutoModel;

class Carrinho extends BaseController
{

    public function __construct()
    {
        $this->produtomodel = new ProdutoModel();
    }

    public function carrinho()
    {
        $produtos = [];
        $carrinho = session()->get('carrinho');
   
        if(session()->get('carrinho'))
        {

            $titulos['title'] = 'CARRINHO';
             return view('templates/navbar', $titulos).
             view('carrinho', ['produtos' => $carrinho]).
             view('templates/footer');

             
        }
           

        $titulos['title'] = 'CARRINHO';
        return view('templates/navbar', $titulos).
        view('carrinho', ['produtos' => $carrinho]).
        view('templates/footer');
        
    }


    public function adicionaProduto($id,$qtd)
    {
        $produto = $this->produtomodel->find($id);
     

        if(session()->get('carrinho'))
        {
            $carrinho = session()->get('carrinho');
          

            $produto = $this->produtomodel->find($id);
            
            $carrinho['item'][$id] = [
                'qtd' => $qtd,
                'preco' =>$produto['Preco'],
                'total' => $qtd * $produto['Preco'],
                'id' => $id,
            ] + $produto;

            // print_r($carrinho;
            // die();
                
            session()->set('carrinho', $carrinho);
            // session()->destroy();
           
            return redirect()->to('carrinho');
        
        }else
        {
            session()->set('carrinho',[
                'item' => [],
            ]);
        }
    }

    public function removeProduto($id)
    {
        $carrinho = session()->get('carrinho');
        unset($carrinho["item"][$id]);
        session()->set('carrinho', $carrinho);
        return redirect()->to('carrinho');
    }
}
