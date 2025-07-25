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
|	https://codeigniter.com/userguide3/general/routing.html
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
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'kos'; // Halaman awal
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// --- Auth routes ---
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// --- Admin routes ---
$route['admin'] = 'admin/login'; // alias login admin
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/kos/form'] = 'admin/form_kos';
$route['admin/kos/form/(:num)'] = 'admin/form_kos/$1';

// --- Kos routes ---
$route['kos'] = 'kos/index';
$route['kos/detail/(:num)'] = 'kos/detail/$1';
$route['kos/search'] = 'kos/search';

// --- User routes ---
$route['user'] = 'user/index';
$route['user/edit_profil'] = 'user/edit_profil';
$route['kos/pesan/(:num)'] = 'user/pesan/$1';
$route['riwayat'] = 'user/riwayat';
$route['user/upload_bukti/(:num)'] = 'user/upload_bukti/$1';

