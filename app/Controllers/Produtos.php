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

    public function tableprodutos()
    {
        $titulos['title'] = 'TABELA DE PRODUTOS';
        return view('templates/navbar', $titulos) .
            view('tablerpodutos', [
                'tableprodutos' => $this->produtomodel->findAll()
            ]) .
            view('templates/footer');
    }

    public function addcatalogo()
    {
        $titulos['title'] = 'ADICIONAR CATÁLOGO';
        return view('templates/navbar', $titulos) .
            view('addcatalogo') .
            view('templates/footer');
    }

    public function validacaoCatalogo()
    {

        $img = $this->request->getFile('imagem_catalogo');

        $regras = [
            'nome_catalogo' => 'required',
            'descricao_catalogo' => 'required|min_length[200]|max_length[265]',
            'imagem_catalogo' => 'required|uploaded[imagem_descricao]|is_image[imagem_catalogo]|ext_in[imagem_descricao,jpg,jpeg,png]',
        ];

        $validacao = $this->validate($regras, [

            'nome_catalogo' => [
                'required' => 'O nome do catálogo é obrigatorio',
            ],
            'descricao_catalogo' => [
                'required' => 'A descrição do catálogo é obrigatorio',
                'min_length' => 'O minimo de caracteres deve ser 200',
                'max_length' => 'O maximo de caracteres deve ser 265',
            ],
            'imagem_catalogo' => [
                'required' => 'Selecione um arquivo de imagem',
                'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                'max_dims' => 'A altura e largura maxima do arquivo deve ser 400 x 200',
            ]



        ]);

        if (! $validacao) {
            return redirect()->route('addcatalogo')->withInput()->with('error', $this->validator->getErrors());
        }

        if (! $img->hasMoved()) {

            $nomeRand = $img->getRandomName();

            $img->store('../../public/assets/uploads/', $nomeRand);
            session()->setFlashdata('sucesso', "Upload realizado com sucesso!");

            $dados = [
                'Nome' => $this->request->getPost('nome_catalogo'),
                'Descricao' => $this->request->getPost('descricao_catalogo'),
                'Imagem' => $this->request->getPost('imagem_catalogo'),
            ];

            $dados['Imagem'] = $nomeRand;


            if ($this->catalogomodel->save($dados)) {
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

    }

    public function listarcatalogo()
    {
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
        $titulos['title'] = 'ATUALIZAR CATÁLOGO';
        return view('templates/navbar', $titulos) .
            view('atualizarcatalogo') .
            view('templates/footer');
    }

    public function addproduto()
    {
        $catalogos = new CatalogoModel();

        $titulos['title'] = 'ADICIONAR PRODUTO';
        return view('templates/navbar', $titulos) .
            view('addproduto', ['catalogos' => $catalogos->findAll()]) .
            view('templates/footer');
    }


    public function validacaoProdutos()
    {

        $img = $this->request->getFile('imagem_addproduto');


        $regras = [
            'nome_addproduto' => 'required',
            'descricao' => 'required|min_length[100]|max_length[130]',
            'imagem_addproduto' => 'required|uploaded[imagem_descricao]|is_image[imagem_catalogo]|ext_in[imagem_descricao,jpg,jpeg,png]',
        ];

        $validacao = $this->validate($regras, [

            'nome_addproduto' => [
                'required' => 'O nome do produto é obrigatorio',
            ],
            'descricao_addproduto' => [
                'required' => 'A descrição do produto é obrigatorio',
                'min_length' => 'O minimo de caracteres deve ser 100',
                'max_length' => 'O maximo de caracteres deve ser 130',
            ],
            'imagem_catalogo' => [
                'required' => 'A imagem é obrigatoria',
                'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                'max_dims' => 'A altura e largura maxima do arquivo deve ser 400 x 200',
            ],

        ]);

        if (! $img->hasMoved()) {

            $nomeRand = $img->getRandomName();

            $img->store('../../public/assets/uploads/', $nomeRand);
            session()->setFlashdata('sucesso', "Upload realizado com sucesso!");

            $dados = [
                'Nome' => $this->request->getPost('nome_addproduto'),
                'Descricao' => $this->request->getPost('descricao_addproduto'),
                'Imagem' => $this->request->getPost('imagem_addproduto'),
                'Preco' => $this->request->getPost('preco_addproduto'),
                'menu_id' => $this->request->getPost('opcao')
            ];

            $dados['Imagem'] = $nomeRand;

            if ($this->produtomodel->save($dados)) {
                session()->setFlashdata('cadastroOK', "Cadastro Realizado com sucesso");
                return redirect()->route('administracao');
            }
        }
        if (! $validacao) {
            return redirect()->route('addproduto')->withInput()->with('error', $this->validator->getErrors());
        }
    }

    public function editarproduto($IdProdutos)
    {
        $titulos['title'] = 'ATUALIZAR PRODUTO';
        return view('templates/navbar', $titulos) .
            view('atualizarproduto', ['produto' => $this->produtomodel->find($IdProdutos)]) .
            view('templates/footer');
    }

    public function alterarproduto()
    {
        $img = $this->request->getFile('alterar_imagem');

        if ($img != '') {

            if (! $this->validate([
                'userfile' => 'uploaded[userfile]|is_image[userfile]|ext_in[userfile,jpg,jpeg,png]',
                'produto' => 'required',
                'descricao' => 'required',
                'preco' => 'required'
            ], [
                'userfile' => [
                    'uploaded' => 'Escolha uma imagem',
                    'is_image' => 'Escolha uma imagem',
                    'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                    'max_dims' => 'Aceito somente imagens de até 1920x1080'
                ],
                'produto' => [
                    'required' => 'este campo é obrigatorio'
                ],
                'descricao' => [
                    'required' => 'este campo é obrigatorio'
                ],
                'preco' => [
                    'required' => 'este campo é obrigatorio'
                ]
            ])) {
                session()->setFlashdata('erros', $this->validator->getErrors());
                //return redirect()->route('produto/cadProduto');
                return redirect()->route('administracao');
            }

            if (! $img->hasMoved()) {



                $nomeRand = $img->getRandomName();

                $img->store('../../public/assets/uploads/', $nomeRand);
                session()->setFlashdata('sucesso', "Upload realizado com sucesso!");

                $dados = $this->request->getPost();

                $dados = [
                    'IdProdutos' => $this->request->getPost('IdProdutos'),
                    'Imagem' => $this->request->getFile('alterar_imagem'),
                    'Nome' => $this->request->getPost('alterar_nomeproduto'),
                    'Descricao' => $this->request->getPost('alterar_descricaoproduto'),
                    'Preco' => $this->request->getPost('alterar_precoproduto'),
                ];

                $dados['Imagem'] = $nomeRand;
              

                if ($this->produtomodel->update($dados['IdProdutos'], $dados)) {

                    session()->setFlashdata('cadastroOK', "atualizacao Realizada com sucesso");
                    return redirect()->route('administracao');
                }
            }
        } else {



            $dados = [
                'IdProdutos' => $this->request->getPost('IdProdutos'),
                'Imagem' => $this->request->getFile('alterar_imagem'),
                'Nome' => $this->request->getPost('alterar_nomeproduto'),
                'Descricao' => $this->request->getPost('alterar_descricaoproduto'),
                'Preco' => $this->request->getPost('alterar_precoproduto'),
            ];

            

            $this->produtomodel->update($dados['IdProdutos'], $dados);
            session()->setFlashdata('cadastroOK', "produto atualizado com sucesso");
            return redirect()->route('administracao');
        }
    }


    public function cardapiomassa()
    {
        $produtos = new ProdutoModel();


        $titulos['title'] = 'CARDÁPIO MASSAS';
        return view('templates/navbar', $titulos) .
            view('cardapiomassa', ['produtos' => $produtos->where('menu_id', '2')->findAll()]) .
            view('templates/footer');
    }

    public function cardapiomilkshake()
    {
        $produtos = new ProdutoModel();

        $titulos['title'] = 'CARDÁPIO MILKSHAKES';
        return view('templates/navbar', $titulos) .
            view('cardapiomilkshake', ['produtos' => $produtos->where('menu_id', '3')->findAll()]) .
            view('templates/footer');
    }

    public function cardapiopicole()
    {

        $produtos = new ProdutoModel();

        $titulos['title'] = 'CARDÁPIO PICOLES';
        return view('templates/navbar', $titulos) .
            view('cardapiopicoles', ['produtos' => $produtos->where('menu_id', '4')->findAll()]) .
            view('templates/footer');
    }
}
