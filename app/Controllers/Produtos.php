<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatalogoModel;
use App\Models\ProdutoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Produtos extends BaseController
{

    private $catalogomodel;
    private $produtomodel;

    public function __construct()
    {
        $this->catalogomodel = new CatalogoModel();
        $this->produtomodel = new ProdutoModel();
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

        $img = $this->request->getFile('imagem_addproduto');

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

            $dados =[
                'nome' => $this->request->getPost('nome_catalogo'),
                'descricao' => $this->request->getPost('descricao_catalogo'),
                'imagem' => $this->request->getPost('imagem_catalogo'),
            ];

            $dados['imagem'] = $nomeRand;


            if ($this->catalogomodel->save($dados)){
                session()->setFlashdata('cadastroOK', "Cadastro Realizado com sucesso");
                return redirect()->route('administracao');
            }
        }
        

        // $catalogo = new CatalogoModel();
        // $inserindo = $catalogo->insert($dados);

        // if(!$inserindo)
        // {
        //     return redirect()->to('/');
        // }else{
        //     return redirect()->to('addcatalogo');
        // }

        if(! $validacao)
        {
            return redirect()->route('addcatalogo')->withInput()->with('error', $this ->validator->getErrors());
        }


    }

    public function listarcatalogo(){
        $catalogos = $this->catalogomodel->findAll();
        return $catalogos;
    }

    public function listarproduto()
    {
        $produtos = $this->produtomodel->findAll();
        return $produtos;
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
        $catalogos = new CatalogoModel();

        $titulos['title']='ADICIONAR PRODUTO';
        return view('templates/navbar', $titulos).
        view('addproduto',['catalogos' => $catalogos->findAll()]).
        view('templates/footer');
    }


    public function validacaoProdutos()
    {

        $img = $this->request->getFile('imagem_addproduto');


        $regras =[
            'nome_addproduto' => 'required',
            // 'descricao' => 'required|min_length[100]|max_length[130]',
            'imagem_addproduto' => 'required|uploaded[imagem_descricao]|is_image[imagem_catalogo]|ext_in[imagem_descricao,jpg,jpeg,png]',
        ];

        $validacao = $this-> validate($regras,[

            'nome_addproduto' =>[ 
                'required' => 'O nome do produto é obrigatorio',
            ],
            'descricao_addproduto' => [
                'required' => 'A descrição do produto é obrigatorio',
                'min_length' => 'O minimo de caracteres deve ser 100',
                'max_length' => 'O maximo de caracteres deve ser 130',
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

            $dados =[
                'nome' => $this->request->getPost('nome_addproduto'),
                'descricao' => $this->request->getPost('descricao_addproduto'),
                'imagem' => $this->request->getPost('imagem_addproduto'),
            ];

            $dados['imagem'] = $nomeRand;


            if ($this->produtomodel->save($dados)){
                session()->setFlashdata('cadastroOK', "Cadastro Realizado com sucesso");
                return redirect()->route('administracao');
            }
        }
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
