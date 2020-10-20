<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.salud
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'request';
$route['noticias/(:num)-(:any)'] = 'request/detallenoticia/$1';
$route['form/enviar'] = 'request/enviarform';

$route['categorias/lissubcategorias'] = 'frontend/categorias/lissubcategorias/';
$route['categorias/getProducto'] = 'frontend/categorias/getProducto/';
$route['categorias/list'] = 'frontend/categorias/liscategorias';

$route['categoria/(:num)'] = 'backend/productos/read/$1';
$route['categoria/save/(:num)'] = 'backend/productos/save/$1';
$route['categoria/dalate/(:num)'] = 'backend/productos/dalete/$1';
$route['categoria/get/(:num)'] = 'backend/productos/get/$1';
$route['productos/(:num)'] = 'backend/productos/getprducts/$1';
$route['productos/resultado'] = 'frontend/productos/resultado/';

$route['productos/eliminarimagen'] = 'backend/productos/eliminarimagen/';
$route['productos/search/(:any)'] = 'frontend/productos/get_search/$1';

$route['subscribe/send'] = 'frontend/productos/subscribe/';

$route['manager/login'] = 'backend/login/login';

$route['manager/paginas/(:num)/(:num)/(:num)'] = 'backend/Paginas/edit/$1/$2/$3';
$route['manager'] = 'backend/login';
$route['manager/(.*)'] = 'backend/$1';
$route['gatoslocos'] = 'html';
//$route['(:any)/(:any)']='request/detallearticulo/$2';
//$route['(.*)'] = 'welcome';

$route['salud/(:any)'] = 'frontend/productos/index/$1';
$route['salud/(:any)/(:any)'] = 'frontend/productos/show/$2';

$route['bienestar/(:any)'] = 'frontend/productos/index/$1';
$route['bienestar/(:any)/(:any)'] = 'frontend/productos/show/$2';

$route['belleza/(:any)'] = 'frontend/productos/index/$1';
$route['belleza/(:any)/(:any)'] = 'frontend/productos/show/$2';

$route['actividad/(:any)'] = 'frontend/productos/index/$1';
$route['actividad/(:any)/(:any)'] = 'frontend/productos/show/$2';

$route['linea-bebe/(:any)'] = 'frontend/productos/index/$1';
$route['linea-bebe/(:any)/(:any)'] = 'frontend/productos/show/$2';


$route['carrito'] = 'frontend/carrito/index/';
$route['registro'] = 'frontend/auth/index';
$route['updatePass/(:num)'] = 'ajax/updatePass/$1';

$route['myaccount'] = 'frontend/perfil';
$route['myaccount/update/(:num)'] = 'frontend/perfil/updateCuenta/$1';

$route['recovery'] = 'frontend/recovery/index';
$route['recovery/(:any)'] = 'frontend/recovery/restore/$1';
$route['ajax/(:any)']        = 'ajax/$1';



$route['(.*)'] = 'request';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
