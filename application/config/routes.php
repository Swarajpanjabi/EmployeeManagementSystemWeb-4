<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Module A: Login and Register
$route['login']['GET'] = 'Auth/RegisterController/index';
$route['login']['POST'] = 'Auth/RegisterController/login';
$route['register']['GET'] = 'Auth/RegisterController/register';
$route['logout']['GET'] = 'Auth/RegisterController/logout';


// Dashboard
$route['home']['GET'] = 'Home/HomeController/index';
// $route['apply_leave']['GET'] = 'Leave/LeaveController/index';

//leave
$route['apply_leave']['GET'] = 'leave/leaveController/apply_leave';





//Admin
$route['leave_types']['GET'] = 'admin/AdminController/leave_types';
$route['leave_type/delete/(:any)']['GET'] = 'admin/adminController/delete_type/$1'; //Deleting with ID
$route['post_leave']['POST'] = 'admin/adminController/post_leave_types';

//Employees
$route['apply_leave']['GET'] = 'employee/employeeController/apply_leave';
$route['post_apply_leave']['POST'] = 'employee/employeeController/post_apply_leave';
$route['leave_history']['GET'] = 'employee/employeeController/leave_history';
$route['leave_application/delete/(:any)']['GET'] = 'employee/employeeController/delete_application/$1'; //Deleting with ID

//HOD
$route['hod_apply_leave']['GET'] = 'hod/HodController/apply_leave';
$route['hod_post_apply_leave']['POST'] = 'hod/HodController/post_apply_leave';
$route['hod_all_leave']['GET'] = 'hod/HodController/all_Leave';
$route['all_leave/approve_leave/(:any)']['GET'] = 'hod/HodController/approve_leave/$1'; //Approve Leave
$route['all_leave/reject_leave/(:any)']['GET'] = 'hod/HodController/reject_leave/$1'; //Reject Leave

//Principal
$route['principal_all_leave']['GET'] = 'Principle/PrincipleController/all_Leave';
$route['principal_all_leave/approve_leave/(:any)']['GET'] = 'principle/PrincipleController/approve_leave/$1'; //Approve Leave
$route['principal_all_leave/reject_leave/(:any)']['GET'] = 'principle/PrincipleController/reject_leave/$1'; //Reject Leave



$route['insert']['GET'] = 'leave/leaveController/insert';


// $route['post_apply_leave']['POST'] = 'leave/leaveController/post_apply_leave';
$route['status']['GET'] = 'leave/leaveController/status';
$route['update_status']['POST'] = 'leave/leaveController/update_status';


