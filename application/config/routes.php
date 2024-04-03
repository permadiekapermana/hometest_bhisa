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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Dashboard Route
$route['dashboard'] = 'DashboardController/index';

// Users Route
$route['users'] = 'UserController/index';
$route['user/add'] = 'UserController/add_user';
$route['user/edit/(:any)'] = 'UserController/edit_user/$1';
$route['user/update'] = 'UserController/update_user';
$route['user/delete/(:any)'] = 'UserController/delete_user/$1';

// Produts Route
$route['products'] = 'ProductController/index';
$route['product/add'] = 'ProductController/add_product';
$route['product/edit/(:any)'] = 'ProductController/edit_product/$1';
$route['product/update'] = 'ProductController/update_product';
$route['product/delete/(:any)'] = 'ProductController/delete_product/$1';

// Supplier Route
$route['suppliers'] = 'SupplierController/index';
$route['supplier/add'] = 'SupplierController/add_supplier';
$route['supplier/edit/(:any)'] = 'SupplierController/edit_supplier/$1';
$route['supplier/update'] = 'SupplierController/update_supplier';
$route['supplier/delete/(:any)'] = 'SupplierController/delete_supplier/$1';

// Purchase Order Route
$route['purchase-orders/add'] = 'PurchaseOrderController/po_add';
$route['purchase-orders/save'] = 'PurchaseOrderController/po_save';