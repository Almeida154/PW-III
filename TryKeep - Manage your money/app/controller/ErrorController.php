<?php

namespace app\controller;
use app\core\Controller;

class ErrorController extends Controller {

    function notFound(string $title, string $message, $code = 404) {
        http_response_code($code);
        $this->render('template/notFound', [
            'title' => $title,
            'message' => $message
        ]);
    }

}