<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Products */
$route['products'] = "products";
$route['products/(:any)'] = "products/index/$1";

/* cart */
$route['cart/(:any)'] = "cart/$1";

/* User */
$route['user/(:any)'] = "user/$1";

/* CMS */
$route['cms/dashboard'] = "cms/dashboard";
$route['cms/dashboard/(:any)'] = "cms/dashboard/$1";

$route['cms/content'] = "cms/content";
$route['cms/content/(:any)'] = "cms/content/$1";

$route['cms/menu'] = "cms/menu";
$route['cms/menu/(:any)'] = "cms/menu/$1";

/* Any else will route to boot controller */
$route['(:any)'] = "boot/index/$1";

$route['default_controller'] = "home";
$route['404_override'] = 'page404';
