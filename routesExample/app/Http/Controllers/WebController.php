<?php

namespace App\Http\Controllers;

class WebController extends Controller {
    function home() {
        return view('home');
    }
    function contact() {
        return view('contact');
    }
}
