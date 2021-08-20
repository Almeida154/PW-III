<?php
    
namespace app\controllers;
use \App\utils\View;

class MainController {

    public static function getHome() {
        return View::render('home');
    }

}