<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::index');

$routes->get('administracao' , 'Usuario::administracao');
$routes->get('tableadmins' , 'Usuario::tableadmins');
$routes->get('tableclientes' , 'Usuario::tableclientes');

$routes->get('addcatalogo', 'produtos::addcatalogo');
$routes->get('addproduto', 'produtos::addproduto');
