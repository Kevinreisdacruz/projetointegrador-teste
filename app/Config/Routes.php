<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::index');

$routes->get('administracao' , 'Usuario::administracao');
$routes->get('tableadmins' , 'Usuario::tableadmins');
$routes->get('tableclientes' , 'Usuario::tableclientes');
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

//LOGIN


//LOGIN

$routes->get('addcatalogo', 'produtos::addcatalogo');
$routes->get('atualizarcatalogo', 'produtos::atualizarcatalogo');
$routes->get('addproduto', 'produtos::addproduto');
$routes->get('atualizarproduto', 'produtos::atualizarproduto');
$routes->get('cardapiomassa', 'produtos::cardapiomassa');
$routes->get('cardapiomilkshake', 'produtos::cardapiomilkshake');
$routes->get('cardapiopicoles', 'produtos::cardapiopicole');