<?php

function dd($params = [], $die = true) {
    echo '<pre>';
        print_r($params);
    echo '</pre>';
    if($die) die();
}

function sentinel() {
    if(!isset($_SESSION['id'])) return header('Location: //localhost/' . BASE . '/public/signIn');
}