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