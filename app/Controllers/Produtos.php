<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatalogoModel;
use App\Models\ProdutoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Produtos extends BaseController
{

    private $catalogomodel;

    public function __construct()
    {
        $this->catalogomodel = new CatalogoModel();
    }

    public function addcatalogo()
    {
        $titulos['title']='ADICIONAR CATÁLOGO';
        return view('templates/navbar', $titulos).
        view('addcatalogo').
        view('templates/footer');
    }

    public function validacaoCatalogo()
    {

        $img = $this->request->getFile('imagem_catalogo');

        $regras =[
            'nome_catalogo' => 'required',
            'descricao_catalogo' => 'required|min_length[200]|max_length[265]',
            'imagem_catalogo' => 'required|uploaded[imagem_descricao]|is_image[imagem_catalogo]|ext_in[imagem_descricao,jpg,jpeg,png]',
        ];


        $validacao = $this-> validate($regras,[

            'nome_catalogo' =>[ 
                'required' => 'O nome do catálogo é obrigatorio',
            ],
            'descricao_catalogo' => [
                'required' => 'A descrição do catálogo é obrigatorio',
                'min_length' => 'O minimo de caracteres deve ser 200',
                'max_length' => 'O maximo de caracteres deve ser 265',
            ],
            'imagem_catalogo' =>[
                'required' => 'Selecione um arquivo de imagem',
                'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                'max_dims' => 'A altura e largura maxima do arquivo deve ser 400 x 200',
            ],

        ]);

        if (! $img->hasMoved()) {

            $nomeRand = $img->getRandomName();

            $img->store('../../public/assets/uploads/', $nomeRand);
            session()->setFlashdata('sucesso', "Upload realizado com sucesso!");

            $dados = $this->request->getPost();

            $dados['imagem'] = $nomeRand;

            // if ($this->catalogomodel->save($dados)){
            //     session()->setFlashdata('cadastroOK', "Cadastro Realizado com sucesso");
            //     return redirect()->route('administracao');
            // }
        }

        if(! $validacao)
        {
            return redirect()->route('addcatalogo')->withInput()->with('error', $this ->validator->getErrors());
        }

        $dados =[
            'nome' => $this->request->getPost('nome_catalogo'),
            'descricao' => $this->request->getPost('descricao_catalogo'),
            'imagem' => $this->request->getPost('imagem_catalogo'),
        ];

        $catalogo = new CatalogoModel();
        $inserindo = $catalogo->insert($dados);

        if(!$inserindo)
        {
            return redirect()->to('/');
        }else{
            return redirect()->to('addcatalogo');
        }

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
