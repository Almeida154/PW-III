<?php
    
namespace App\Controllers;
use App\Utils\View;

class WebController {

    public function home(array $data): void {
        View::render("home");
    }
    
    public function error(array $data): void {
        View::render("error", [
            "err_code" => $data['err_code']
        ]);
    }
    
}