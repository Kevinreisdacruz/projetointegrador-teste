<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EnderecoCliente;
use App\Models\UsuarioModel;
use App\Models\ProdutoModel;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Usuario extends BaseController
{

    private  $UsuarioModel;
    private  $ProdutoModel;
    private  $EndercoCliFinal;
    private $UserModel;

    public function  __construct()
    {
        $this->UsuarioModel = new UsuarioModel();
        $this->ProdutoModel = new ProdutoModel();
        $this->EndercoCliFinal = new EnderecoCliente();
        $this->UserModel = new UserModel();
    }

    public function excluirPerfil()
    {


        $titulos['title'] = 'EXCLUSÃO DE PERFIL';
        return view('templates/navbar', $titulos) .
            view('excluirusuario') .
            view('templates/footer');
    }

    public function deletarPerfil($id)
    {
        $user = auth()->getProvider();

        $user->delete($id, true);
        return redirect()->route('tableclientes');
    }

    public function administracao()
    {
        $titulos['title'] = 'ADMINISTRACAO';
        return view('templates/navbar', $titulos) .
            view('administracao') .
            view('templates/footer');
    }

    public function cadastro()
    {

        $titulos['title'] = 'CADASTRO';
        return view('templates/navbar', $titulos) .
            view('cadastro') .
            view('templates/footer');
    }


    public function listarTodos()
    {
        $users = auth()->getProvider();
        return $users->findAll();
    }

    public function usuarios()
    {
        $data['title'] = 'TABELA DE CLIENTES';
        return view('templates/navbar', $data) .
            view('tableclientes', ['tableclientes' => $this->listarTodos()]) .
            view('templates/footer');
    }

    public function defineAdmin($id)
    {
        $users = auth()->getProvider();
        $user = $users->find($id);
        $user->addGroup('administrador');

        return redirect()->route('tableclientes');
    }

    public function removeAdmin($id)
    {
        $users = auth()->getProvider();
        $user = $users->find($id);
        $user->removeGroup('administrador');

        return redirect()->route('tableclientes');
    }

    public function buscarCliente()
    {
        
        $usuario = new UserModel();
        
        $pesquisa = $this->request->getGet('pesquisar');

        if ($this->request->getGet('opcao') == 1) {
            $dados = $this->UserModel->like('id', $pesquisa)->findAll();
        } else {
            $dados = $this->UserModel->like('username', $pesquisa)->findAll();
        }

        $titulos['title'] = 'TABELA DE CLIENTES';
        return view('templates/navbar', $titulos) .
            view('tableclientes', ['tableclientes' => $dados]) .
            view('templates/footer');
    }

    public function editarUsuario($IdUsuario)
    {
        $titulos['title'] = 'ATUALIZAR USUARIO';
        return view('templates/navbar', $titulos) .
            view('atualizarusuario', ['cliente' => $this->UsuarioModel->find($IdUsuario)]) .
            view('templates/footer');
    }

    public function alterarCliente()
    {
        $dados = [
            'IdUsuario' => $this->request->getPost('IdUsuario'),
            'Nome' => $this->request->getPost('alterar_nomeusuario'),
            'Email' => $this->request->getPost('alterar_emailusuario'),
            'Telefone' => $this->request->getPost('alterar_telefoneusuario')
        ];

        $this->UsuarioModel->update($dados['IdUsuario'], $dados);
        return redirect()->route('tableclientes');
    }

    public function excluirUsuarios($id)
    {
        $user = auth()->getProvider();

        $user->delete($id, true);
        return redirect()->route('tableclientes');
    }

    //TABELA


    public function cep()
    {
        $titulos['title'] = 'ENDEREÇO';
        return view('templates/navbar', $titulos) .
            view('cadcep') .
            view('templates/footer');
    }

    public function validacaoCep()
    {
        if (! $this->validate([
            'cidade' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numerocasa' => 'required',
        ], [
            'cidade' => [
                'required' => 'A cidade é obrigatorio',
            ],

            'cep' => [
                'required' => 'O cep é obrigatorio',
            ],
            'bairro' => [
                'required' => 'O bairro é obrigatorio',
            ],
            'rua' => [
                'required' => 'A rua é obrigatoria',
            ],
            'numerocasa' => [
                'required' => 'O numero da casa é obrigatorio',
            ],



        ])) {

            return redirect()->route('cadcep')->withInput()->with('error', $this->validator->getErrors());
        }

        $dados = [
            'Cidade' => $this->request->getPost('cidade'),
            'Cep' => $this->request->getPost('cep'),
            'Bairro' => $this->request->getPost('bairro'),
            'Rua' => $this->request->getPost('rua'),
            'Numero' => $this->request->getPost('numerocasa'),
            'Complemento' => $this->request->getPost('complemento'),
        ];

        $user = new EnderecoCliente();
        $inserindo = $user->insert($dados);

        if ($inserindo) {
            return redirect()->to('pagamento');
        } else {
            return redirect()->to('cadastro');
        }
    }


    public function pagamento()
    {
        $titulos['title'] = 'FORMA DE PAGAMENTO';
        return view('templates/navbar', $titulos) .
            view('pagamento') .
            view('templates/footer');
    }

    public function pagamentocartao()
    {
        $titulos['title'] = 'PAGAMENTO CARTÃO';
        return view('templates/navbar', $titulos) .
            view('pagamentocartao') .
            view('templates/footer');
    }


    public function validacaoCartao()
    {
        if (! $this->validate([
            'nometitular' => 'required',
            'numerocartao' => 'required',
            'validade' => 'required',
            'codseguranca' => 'required',
        ], [
            'nometitular' => [
                'required' => 'O nome do titular é obrigatorio',
            ],

            'numerocartao' => [
                'required' => 'O número do cartão é obrigatorio',
            ],
            'validade' => [
                'required' => 'A data de vencimento do cartão é obrigatorio',
            ],
            'codseguranca' => [
                'required' => 'O codigo de validaco é obrigatorio',
            ],
        ])) {

            return redirect()->route('pagamentocartao')->withInput()->with('error', $this->validator->getErrors());
        }
    }

    public function agradecimento()
    {
        $titulos['title'] = 'AGRADECIMENTO';
        return view('templates/navbar', $titulos) .
            view('agradecimento') .
            view('templates/footer');
    }
}
