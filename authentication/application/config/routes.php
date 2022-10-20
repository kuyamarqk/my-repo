<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'user';
$route['404_override'] = 'user/index';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'user/create';
$route['user/profile'] = 'user/profile';

