<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarrinhoModel;
use App\Models\CatalogoModel;
use App\Models\ProdutoModel;
use App\Models\UsuarioModel;
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

    //CATALOGO

    public function listarcatalogo()
    {
        $catalogos = $this->catalogomodel->findAll();
        return $catalogos;
    }

    public function tablecatalogos()
    {
        $titulos['title'] = 'TABELA DE CATÁLOGOS';
        return view('templates/navbar', $titulos) .
            view('tablecatalogos', ['catalogos' => $this->catalogomodel->findAll()]) .
            view('templates/footer');
    }

    public function addcatalogo()
    {
        $titulos['title'] = 'ADICIONAR CATÁLOGO';
        return view('templates/navbar', $titulos) .
            view('addcatalogo') .
            view('templates/footer');
    }

    public function buscarCatalogo()
    {
        $pesquisa = $this->request->getGet('buscar');

        if ($this->request->getGet('opcao') == 1) {
            $dados = $this->catalogomodel->like('IdCatalogos', $pesquisa)->findAll();
        } else {
            $dados = $this->catalogomodel->like('Nome', $pesquisa)->findAll();
        }

        $titulos['title'] = 'TABELA DE CATÁLOGOS';
        return view('templates/navbar', $titulos) .
            view('tablecatalogos', ['catalogos' => $dados]) .
            view('templates/footer');
    }

    public function excluircatalogo($IdCatalogos)
    {
        if ($this->catalogomodel->delete($IdCatalogos)) {
            return redirect()->route('tablecatalogos');
        }
    }

    public function editarcatalogo($IdCatalogos)
    {
        $titulos['title'] = 'ATUALIZAR CATÁLOGO';
        return view('templates/navbar', $titulos) .
            view('atualizarcatalogo', ['catalogo' => $this->catalogomodel->find($IdCatalogos)]) .
            view('templates/footer');
    }

    public function alterarcatalogo()
    {
        $img = $this->request->getFile('atualizar_imagemcatalogo');

        if ($img != '') {

            if (! $this->validate([
                'atualizar_imagemcatalogo' => 'uploaded[atualizar_imagemcatalogo]|is_image[atualizar_imagemcatalogo]|ext_in[atualizar_imagemcatalogo,jpg,jpeg,png]',
                'atualizar_nomecatalogo' => 'required',
                'atualizar_descricaocatalogo' => 'required|min_length[200]|max_length[265]',
            ], [
                'atualizar_imagemcatalogo' => [
                    'uploaded' => 'Escolha uma imagem',
                    'is_image' => 'Escolha uma imagem',
                    'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                    'max_dims' => 'Aceito somente imagens de até 1920x1080'
                ],
                'atualizar_nomecatalogo' => [
                    'required' => 'este campo é obrigatorio'
                ],
                'atualizar_descricaocatalogo' => [
                    'required' => 'este campo é obrigatorio',
                    'min_length' => 'O minimo de caracteres deve ser 200',
                    'max_length' => 'O maximo de caracteres deve ser 265',
                ],
            ])) {

                return redirect()->route('atualizarcatalogo')->withInput()->with('error', $this->validator->getErrors());
                // session()->getFlashdata('error',  $this->validator->getErrors());
                // return redirect()->route('atualizarcatalogos');
            }

            if (! $img->hasMoved()) {

                $nomeRand = $img->getRandomName();

                $img->store('../../public/assets/uploads/', $nomeRand);

                $dados = $this->request->getPost();


                $dados = [
                    'IdCatalogos' => $this->request->getPost('IdCatalogos'),
                    'Nome' => $this->request->getPost('atualizar_nomecatalogo'),
                    'Descricao' => $this->request->getPost('atualizar_descricaocatalogo'),
                    'Imagem' => $this->request->getPost('atualizar_imagemcatalogo'),
                ];

                $dados['Imagem'] = $nomeRand;


                if ($this->catalogomodel->update($dados['IdCatalogos'], $dados)) {
                    return redirect()->route('tablecatalogos');
                }
            }
        } else {

            $dados = $this->request->getPost();

            $dados = [
                'IdCatalogos' => $this->request->getPost('IdCatalogos'),
                'Nome' => $this->request->getPost('atualizar_nomecatalogo'),
                'Descricao' => $this->request->getPost('atualizar_descricaocatalogo'),
                'Imagem' => $this->request->getPost('atualizar_imagemcatalogo'),
            ];

            $this->catalogomodel->update($dados['IdCatalogos'], $dados);
            session()->setFlashdata('cadastroOK', "produto atualizado com sucesso");
            return redirect()->route('tablecatalogos');
        }
    }

    public function validacaoCatalogo()
    {

        $img = $this->request->getFile('imagem_catalogo');



        if (! $this->validate([
            'nome_catalogo' => 'required',
            'descricao_catalogo' => 'required|min_length[200]|max_length[265]',
            'imagem_catalogo' => 'uploaded[imagem_catalogo]|is_image[imagem_catalogo]|ext_in[imagem_catalogo,jpg,jpeg,png]|',
        ], [

            'nome_catalogo' => [
                'required' => 'O nome do catálogo é obrigatorio',
            ],
            'descricao_catalogo' => [
                'required' => 'A descrição do catálogo é obrigatorio',
                'min_length' => 'O minimo de caracteres deve ser 200',
                'max_length' => 'O maximo de caracteres deve ser 265',
            ],
            'imagem_catalogo' => [
                'uploaded' => 'A imagem é obrigatoria',
                'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                'max_dims' => 'A altura e largura maxima do arquivo deve ser 800x500',
            ],


        ])) {

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
    }

    //CATALOGO

    //PRODUTOS

    public function listarproduto()
    {
        $produtos = $this->produtomodel->findAll();
        return $produtos;
    }

    public function tableprodutos()
    {
        $titulos['title'] = 'TABELA DE PRODUTOS';
        return view('templates/navbar', $titulos) .
            view('tableprodutos', [
                'tableprodutos' => $this->produtomodel->findAll()
            ]) .
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

    public function buscarProduto()
    {
        $pesquisa = $this->request->getGet('buscar');

        if ($this->request->getGet('opcao') == 1) {
            $dados = $this->produtomodel->like('IdProdutos', $pesquisa)->findAll();
        } else {
            $dados = $this->produtomodel->like('Nome', $pesquisa)->findAll();
        }

        $titulos['title'] = 'TABELA DE PRODUTOS';
        return view('templates/navbar', $titulos) .
            view('tableprodutos', ['tableprodutos' => $dados]) .
            view('templates/footer');
    }

    

    public function excluirProduto($IdProdutos)
    {
        if ($this->produtomodel->delete($IdProdutos)) {
            return redirect()->route('tableprodutos');
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
                'alterar_imagem' => 'uploaded[alterar_imagem]|is_image[alterar_imagem]|ext_in[alterar_imagem,jpg,jpeg,png]',
                'alterar_nomeproduto' => 'required',
                'alterar_descricaoproduto' => 'required',
                'alterar_precoproduto' => 'required'
            ], [
                'alterar_imagem' => [
                    'uploaded' => 'Escolha uma imagem',
                    'is_image' => 'Escolha uma imagem',
                    'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                    'max_dims' => 'Aceito somente imagens de até 1920x1080'
                ],
                'alterar_nomeproduto' => [
                    'required' => 'este campo é obrigatorio'
                ],
                'alterar_descricaoproduto' => [
                    'required' => 'este campo é obrigatorio'
                ],
                'alterar_precoproduto' => [
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
                    return redirect()->route('tableprodutos');
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

    public function validacaoProdutos()
    {

        $img = $this->request->getFile('imagem_addproduto');

        if (! $this->validate([
            'nome_addproduto' => 'required',
            'descricao_addproduto' => 'required|min_length[100]|max_length[130]',
            'preco_addproduto' => 'required',
            'imagem_addproduto' => 'uploaded[imagem_addproduto]|is_image[imagem_addproduto]|ext_in[imagem_addproduto,jpg,jpeg,png]'
        ], [
            'nome_addproduto' => [
                'required' => 'O nome do produto é obrigatorio',
            ],
            'descricao_addproduto' => [
                'required' => 'A descrição do produto é obrigatorio',
                'min_length' => 'O minimo de caracteres deve ser 100',
                'max_length' => 'O maximo de caracteres deve ser 130',
            ],
            'preco_addproduto' => [
                'required' => 'O preço é obrigatorio'
            ],
            'imagem_addproduto' => [
                'uploaded' => 'A imagem é obrigatoria',
                'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                'max_dims' => 'A altura e largura maxima do arquivo deve ser 700 x 210',
            ],

        ])) {
            return redirect()->route('addproduto')->withInput()->with('error', $this->validator->getErrors());
        }

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
    }

    //PRODUTOS

    //CARDAPIO
    public function cardapiomassa()
    {

        
       
        $titulos['title'] = 'CARDÁPIO MASSAS';
        return view('templates/navbar', $titulos) .
            view('cardapiomassa', ['produtos' => $this->produtomodel->where('menu_id', '2')->findAll()]) .
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

    //CARDAPIO

    public function atualizarCarrinho($id)
    {

        if(session()->get('carrinho'))
        {
            $carrinho = session()->get('carrinho');
        
            if(key_exists($id,$carrinho['item']))
            {
                $dados = $carrinho['item'][$id];
            }else{
                $dados = $this->produtomodel->find($id);
            }
            
            $titulos['title'] = 'QUANTIDADE';
            return view('templates/navbar', $titulos) .
                view('atualizarcarrinho',['produtos' => $dados]) .
                view('templates/footer');
        
        }

    }

}
