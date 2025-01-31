<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::index',['as' => 'home']);

$routes->get('administracao' , 'Usuario::administracao');
$routes->get('tableclientes' , 'Usuario::tableclientes');
$routes->get('tableprodutos', 'Usuario::tableprodutos');
$routes->get('carrinho', 'usuario::carrinho');
$routes->get('pagamento', 'usuario::pagamento');
$routes->get('pagamentocartao', 'usuario::pagamentocartao');
$routes->get('agradecimento', 'usuario::agradecimento');
$routes->get('cadcep', 'usuario::cep');

//CADASTRO

$routes->get('cadastro', 'usuario::cadastro');
$routes->get('/Usuario/cadastro', 'usuario::cadastro', ['as' => 'usuario.cadastro']);
$routes->post('/Usuario/validacao', 'usuario::validacao', ['as' => 'usuario.validacao']);

//CADASTRO

//CADASTRO CATALOGO

$routes->post('/addcatalogo/validacao', 'Produtos::validacaoCatalogo', ['as' => 'addcatalogo.validacao']);

//CADASTRO CATALOGO

//CADASTRO PRODUTO

$routes->post('/addproduto/validacao', 'Produtos::validacaoProdutos', ['as' => 'addproduto.validacao']);

//CADASTRO PRODUTO

//LOGIN

// $routes->get('login', 'Usuario::login');
$routes->get('/login', 'Usuario::login', ['as' => 'login']);
$routes->post('/login', 'Usuario::entrar', ['as' => 'usuario.entrar']);
$routes->get('/login/sair', 'Usuario::sair', ['as' => 'usuario.sair']);

//LOGIN

$routes->get('addcatalogo', 'produtos::addcatalogo');
$routes->get('atualizarcatalogo', 'produtos::atualizarcatalogo');
$routes->get('addproduto', 'produtos::addproduto');

$routes->get('produtos/editarproduto/(:num)', 'produtos::editarproduto/$1');
$routes->post('produtos/alterarproduto', 'Produtos::alterarproduto');

$routes->get('cardapiomassa', 'produtos::cardapiomassa');
$routes->get('cardapiomilkshake', 'produtos::cardapiomilkshake');
$routes->get('cardapiopicoles', 'produtos::cardapiopicole');