<?php

namespace App\Utils;

class View {
    public static function render($view = "home", $data = []) {
        $template = new \League\Plates\Engine(__DIR__ . "/../../resources/views", "php");
        echo $template->render($view, $data);
    }
}