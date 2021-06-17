<?php

// $this->get('/', function() {
//     (new app\controller\GeneralController)->home();
// });

$this->get('/', 'GeneralController@home');
$this->get('/home', 'GeneralController@home');
$this->get('/contact', 'GeneralController@contact');
$this->get('/signIn', 'GeneralController@signIn');
$this->get('/signUp', 'GeneralController@signUp');
$this->get('/accountSteps/income', 'GeneralController@income');
$this->get('/accountSteps/expense', 'GeneralController@expense');
$this->get('/accountSteps/info', 'GeneralController@info');

$this->post('/signUp/newUser', 'DatabaseController@insertUser');
$this->post('/signUp/validateEmail', 'DatabaseController@validateEmail');

$this->post('/signIn/validateSignIn', 'DashboardController@signIn');
$this->post('/dashboard', 'DashboardController@dashboard');
$this->post('/dashboard/logout', 'DashboardController@logOut');
$this->post('/dashboard/filter', 'DashboardController@filter');

$this->get('/dashboard/search', 'DashboardController@search');
$this->get('/dashboard/nonSearch', 'DashboardController@search');