<?php

$this->get('/', function() {
    echo 'home';
});

$this->get('/home', function() {
    echo 'home';
});

$this->get('/about/fodase', function() {
    echo 'to na fodase';
});