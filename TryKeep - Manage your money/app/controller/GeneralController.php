<?php

namespace app\controller;
use app\core\Controller;

class GeneralController extends Controller {

    function home() {
        $this->render('home');
    }
    
    function contact() {
        $this->render('contact');
    }
    
    function signIn() {
        $this->render('signIn');
    }

    function signUp() {
        $this->render('signUp');
    }

    function income() {
        $this->render('accountSteps/income');
    }

    function expense() {
        $this->render('accountSteps/expense');
    }

    function info() {
        $this->render('accountSteps/info');
    }

    function forgot() {
        $this->render('accountSteps/forgotPassword');
    }
}