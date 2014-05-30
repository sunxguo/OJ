<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['users/login'] = "cusers/login";//用户登录
$route['users/register'] = "cusers/register";//用户注册
$route['users/user_login'] = "cusers/user_login";//登录方法
$route['users/user_logout'] = "cusers/user_logout";//退出方法
$route['problemList'] = "cproblemList";
$route['contestList'] = "ccontestList";
$route['problem'] = "cproblem";
$route['contest'] = "ccontest";
$route['users/user_center_myCode'] = "cusers/user_center_myCode";
$route['problem/submit_code'] = "cproblem/submit_code";
$route['problem/execute_code'] = "cproblem/execute_code";
$route['problem/get_arg'] = "cproblem/get_arg";
//后台管理系统
$route['admin'] = "cadmin";
$route['admin/login'] = "cadmin/login";
$route['admin/index'] = "cadmin/index";
$route['admin/problems'] = "cadmin/problems";
$route['admin/codes'] = "cadmin/codes";
$route['admin/users'] = "cadmin/users";
$route['admin/managers'] = "cadmin/managers";
$route['admin/contests'] = "cadmin/contests";
$route['admin/addContest'] = "cadmin/addContest";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
