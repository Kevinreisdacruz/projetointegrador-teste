<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class Usuario extends BaseController
{

    private  $UsuarioModel;

    public function  __construct()
    {
        $this->UsuarioModel = new UsuarioModel();
    }

    public function administracao()
    {
        $titulos['title'] = 'ADMINISTRACAO';
        return view('templates/navbar', $titulos) .
            view('administracao') .
            view('templates/footer');
    }

    public function tableclientes()
    {
        $titulos['title'] = 'TABELA DE CLIENTES';
        return view('templates/navbar', $titulos) .
            view('tableclientes') .
            view('templates/footer');
    }
    public function tableadmins()
    {
        $titulos['title'] = "TABELA DE ADMINS";
        return view('templates/navbar', $titulos) .
            view('tableadmins', [
                'tableadmins' => $this->UsuarioModel->findAll()
            ]) .
            view('templates/footer');
    }

    public function login()
    {
        $titulos['title'] = 'LOGIN';
        return view('templates/navbar', $titulos) .
        view('login') .
        view('templates/footer');
    }

    public function entrar()
    {
        $regras = [
            'email' => 'required|valid_email|',
            'senha' => 'required|min_length[8]|max_length[20]',
        ];

        $validacao = $this->validate($regras,[
            'email' =>[
                'required' => 'Preencha o seu email',
                'valid_email' => 'este email não é valido',
            ],
            'senha' =>[
                'required' => 'Preencha a sua senha',
                'min_length' => 'Senha incorreta',
                'max_length' => 'Senha incorreta'
            ]
        ]);

        if(!$validacao){
            return redirect()->route('login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $usuario = new UsuarioModel();
        $usuario_encontrado = $usuario->select('IdUsuario, nome, email, senha, telefone')->where('email', $this->request->getPost('email'))->first();

        
        
        if(!$usuario_encontrado)
        {
            return redirect()->route('login')->with('erro_geral', 'Email ou Senha incorreto');
        }

        if(!password_verify($this->request->getPost('senha'), $usuario_encontrado->senha)){
            return redirect()->route('login')->with('erro_geral', 'Email ou Senha incorreto');
        }

        unset($usuario_encontrado->senha);
        session()->set('usuario', $usuario_encontrado);
        
        return redirect()->route('home');
        
    }

    public function sair()
    {
        session()->destroy();

        return redirect()->route('home');
    }
    

    public function cadastro()
    {
        
        $titulos['title'] = 'CADASTRO';
        return view('templates/navbar', $titulos) .
        view('cadastro') .
        view('templates/footer');

    }


    public function validacao()
    {

        $regras = [
            'nome_cadastrar' => 'required',
            'email_cadastrar' => 'required|valid_email|is_unique[clienteusuario.email]',
            'senha_cadastrar' => 'required|min_length[8]|max_length[20]',
            'telefone_cadastrar' => 'required',
        ];

        $validacao = $this->validate($regras,[
            'nome_cadastrar' =>[
                'required' =>  'O nome é obrigatório',
            ],
            'email_cadastrar' =>[
                'required' => 'O email é obrigatório',
                'valid_email' => 'Este email não é valido',
                'is_unique' => 'Já existe uma conta cadastrada com este email',
            ],
            'senha_cadastrar' =>[
                'required' => 'A senha é obrigatória',
                'min_length' => 'A senha deve conter no mínimo 8 caracteres',
                'max_length' => 'A senha deve conter no máximo 20 caracteres'
            ],
            'telefone_cadastrar' =>[
                'required' => 'O telefone é obrigatório',
            ],
        ]);

        if(!$validacao){
            return redirect()->route('cadastro')->withInput()->with('errors', $this->validator->getErrors()); //se este IF der falso, ele me redirecionara para minha pagina de cadastro, o WITH passara dados de uma requisicao para a proxima requisicao, ela esta passando a variavel "ERRORS" que esta guardando todos os erros de vallidacao, logo em seguida temos um metodo que retorna uma array de erros, se algum campo nao passar nas validacoes, ele exibira as mensagens de erro, O array que contem os erros é o getErrors
        }
        
       $dados =[
        'nome' =>$this->request->getPost('nome_cadastrar'),
        'email' => $this->request->getPost('email_cadastrar'),
        'senha' =>password_hash($this->request->getPost('senha_cadastrar'), PASSWORD_DEFAULT),
        'telefone'=> $this->request->getPost('telefone_cadastrar')
       ];



       $user = new UsuarioModel;
       $inserindo = $user->insert($dados);

       if($inserindo){
        return redirect()->to('/');
       }else{
        return redirect()->to('cadastro');
       }
       
       
    }


    public function carrinho()
    {
        $titulos['title'] = 'CARRINHO';
        return view('templates/navbar', $titulos) .
            view('carrinho') .
            view('templates/footer');
    }

    public function cep()
    {
        $titulos['title'] = 'ENDEREÇO';
        return view('templates/navbar', $titulos) .
            view('cadcep') .
            view('templates/footer');
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

    public function agradecimento()
    {
        $titulos['title'] = 'AGRADECIMENTO';
        return view('templates/navbar', $titulos) .
            view('agradecimento') .
            view('templates/footer');
    }
}
