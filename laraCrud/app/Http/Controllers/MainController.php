<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {
    function home() {
        return view('home');
    }
    function contacts() {
        return view('contacts');
    }
    function newContact() {
        return view('newContact');
    }
}
