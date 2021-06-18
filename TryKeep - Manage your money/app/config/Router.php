<?php

// $this->get('/', function() {
//     (new app\controller\GeneralController)->home();
// });

// [Website] //
$this->get('/', 'GeneralController@home');
$this->get('/home', 'GeneralController@home');
$this->get('/contact', 'GeneralController@contact');
$this->get('/signIn', 'GeneralController@signIn');
$this->get('/signUp', 'GeneralController@signUp');
$this->get('/accountSteps/income', 'GeneralController@income');
$this->get('/accountSteps/expense', 'GeneralController@expense');
$this->get('/accountSteps/info', 'GeneralController@info');

// [Sign Up] //
$this->post('/signUp/newUser', 'DatabaseController@insertUser');
$this->post('/signUp/validateEmail', 'DatabaseController@validateEmail');

// [Sign In and Logout] //
$this->post('/signIn/validateSignIn', 'DashboardController@signIn');
$this->post('/dashboard', 'DashboardController@dashboard');
$this->post('/dashboard/logout', 'DashboardController@logOut');

// [Navigation] //
$this->get('/dashboard/home', 'DashboardController@home');
$this->get('/dashboard/stats', 'DashboardController@stats');
$this->get('/dashboard/new', 'DashboardController@new');
$this->get('/dashboard/config', 'DashboardController@config');

// [Home] //
$this->get('/dashboard/search', 'DashboardController@search');
$this->get('/dashboard/nonSearch', 'DashboardController@nonSearch');
$this->post('/dashboard/filter', 'DashboardController@filter');

// [Stats] //
$this->post('/dashboard/stats/chart', 'DashboardController@renderChart');

// [New] //
$this->post('/dashboard/new/newMM', 'DatabaseController@insertMM');

// [Config] //
$this->post('/dashboard/config/update', 'DatabaseController@updateUser');
$this->post('/dashboard/config/delete', 'DatabaseController@deleteUser');