<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Client_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['filter'] = 'Client_controller/filter';
$route['catalog'] = 'catalog/index';
$route['add_to_cart'] = 'catalog/add_to_cart';
$route['cart'] = 'cart/index';
$route['add_product'] = 'cart/add_product';
$route['remove/(:id)']  = 'cart/remove/$1';
$route['remove_all'] = "cart/remove_all";
$route['admin'] = 'admin/index';
$route['admin/add'] = 'admin/add';
$route['make-stripe-payment'] = "StripePaymentController";
$route['handleStripePayment']['post'] = "StripePaymentController/handlePayment";

