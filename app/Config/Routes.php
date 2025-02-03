<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::index',['as' => 'home']);

$routes->get('administracao' , 'Usuario::administracao');
$routes->get('tableclientes' , 'Usuario::tableclientes');

$routes->get('carrinho', 'usuario::carrinho');
$routes->get('pagamento', 'usuario::pagamento');
$routes->get('pagamentocartao', 'usuario::pagamentocartao');
$routes->get('agradecimento', 'usuario::agradecimento');
$routes->get('cadcep', 'usuario::cep');



//CADASTRO USUARIO
$routes->get('cadastro', 'usuario::cadastro');
$routes->get('/Usuario/cadastro', 'usuario::cadastro', ['as' => 'usuario.cadastro']);
$routes->post('/Usuario/validacao', 'usuario::validacao', ['as' => 'usuario.validacao']);
//CADASTRO USUARIO


//TABLE USUARIO

$routes->get('usuario/editarUsuario/(:num)', 'Usuario::editarUsuario/$1');
$routes->post('usuario/alterarCliente', 'Usuario::alterarCliente');
$routes->get('usuario/excluirUsuario/(:num)', 'Usuario::excluirUsuario/$1');
$routes->get('usuario', 'Usuario::buscarCliente');
//TABLE USUARIO



$routes->post('/addproduto/validacao', 'Produtos::validacaoProdutos', ['as' => 'addproduto.validacao']);


//LOGIN
$routes->get('/login', 'Usuario::login', ['as' => 'login']);
$routes->post('/login', 'Usuario::entrar', ['as' => 'usuario.entrar']);
$routes->get('/login/sair', 'Usuario::sair', ['as' => 'usuario.sair']);
//LOGIN


//CATALOGO
$routes->get('tablecatalogos', 'Produtos::tablecatalogos');
$routes->post('/addcatalogo/validacao', 'Produtos::validacaoCatalogo', ['as' => 'addcatalogo.validacao']);

$routes->get('catalogos', 'Produtos::buscarCatalogo');

$routes->get('addcatalogo', 'produtos::addcatalogo');
$routes->get('catalogos/atualizarcatalogo/(:num)', 'produtos::editarcatalogo/$1');
$routes->post('catalogos/alterarcatalogo', 'produtos::alterarcatalogo');
$routes->get('catalogos/excluircatalogo/(:num)', 'Produtos::excluircatalogo/$1');
//CATALOGO

//PRODUTOS
$routes->get('addproduto', 'produtos::addproduto');
$routes->get('produtos/editarproduto/(:num)', 'produtos::editarproduto/$1');
$routes->post('produtos/alterarproduto', 'Produtos::alterarproduto');
$routes->get('produtos/excluirProduto/(:num)', 'Produtos::excluirProduto/$1');

$routes->get('produto/buscarProduto', 'Produto::buscarProduto');
$routes->get('pesquisa', 'Produtos::buscarProduto');

$routes->get('tableprodutos', 'Produtos::tableprodutos');

$routes->get('cardapiomassa', 'produtos::cardapiomassa');
$routes->get('cardapiomilkshake', 'produtos::cardapiomilkshake');
$routes->get('cardapiopicoles', 'produtos::cardapiopicole');
//PRODUTOS
