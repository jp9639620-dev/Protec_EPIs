<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rota para o página de autenticação
$routes->get('equipamentopis', 'Home::equipamentopis');

//Rota para a página de autenticação
$routes->get('home/autenticar', 'Home::autenticar');
$routes->post('home/autenticar', 'Home::autenticar');

//Rota para a páina principal do sitema após a autenticação
$routes->get('home/principal', 'Home::principal');
$routes->post('home/principal', 'Home::principal');

//Rota para a página de colaboradores
$routes->get('colaboradores', 'Home::colaboradores');
//$roust->post('colaboradores', 'Home::colaboradores');


//$routes para a página epis 
$routes->get('epis', 'Home::epis');
//$routes->post('epis', 'Home::epis');

//$routes->post e get('Entrgas', 'HOME::Entrgas');
//$routes->post('entregas', 'Home::entregas');
$routes->get('entregas', 'Home::entregas');


$routes->get('home/erro', 'Home::erro_auth');


$routes->get('epi', 'Home::listarepi');

$routes->get('home/editar/(:num)', 'Home::editar/$1');

$routes->post('home/atualizar', 'Home::atualizar');

$routes->get('/logout', 'Home::logout');

?>
