<?php
    
namespace app\controllers;
use \App\utils\View;

class MainController {
    public static function home() {
        return View::render('home');
    }
}