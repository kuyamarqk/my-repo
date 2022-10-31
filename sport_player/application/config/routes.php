<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Sports_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['add'] = 'Sports_controller/add_player';
$route['create_player'] = 'sports_controller/create_player';
$route['sport'] = 'sports_controller/sport_list';
$route['addSport'] = 'sports_controller/add_sport';
$route['filter'] = 'sports_controller/filter';


