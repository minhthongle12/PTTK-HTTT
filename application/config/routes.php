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
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cms'] = 'cms/cms/index';
$route['cms/login'] = 'cms/cms/login';
$route['cms/logout'] = 'cms/cms/logout';

$route['cms/tuasach/tracuu/'] = 'cms/cms/tuasach/tracuu/';
$route['cms/tuasach/chitiet_tuasach/'] = 'cms/cms/tuasach/chitiet_tuasach/';
$route['cms/tuasach/chitiet_tuasach/:num/'] = 'cms/cms/tuasach/chitiet_tuasach/$1/';

$route['cms/user/search/'] = 'cms/cms/user/search/';
$route['cms/user/form/'] = 'cms/cms/user/form/';
$route['cms/user/form/:num/'] = 'cms/cms/user/form/$1/';

$route['cms/borrows/search/'] = 'cms/cms/borrows/search/';
$route['cms/borrows/form/'] = 'cms/cms/borrows/form/';
$route['cms/borrows/form/:num/'] = 'cms/cms/borrows/form/$1/';

$route['cms/statistic/'] = 'cms/cms/statistic/index';

$route['cms/sach/tracuu_tuasach/'] = 'cms/cms/sach/tracuu_tuasach/';
$route['cms/sach/tracuu_dausach/:num/'] = 'cms/cms/sach/tracuu_dausach/$1/';
$route['cms/sach/tracuu_cuonsach/:num/'] = 'cms/cms/sach/tracuu_cuonsach/$1/';