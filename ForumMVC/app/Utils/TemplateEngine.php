<?php

namespace App\Utils;

class TemplateEngine {
    public static function render($view = "home", $data = []) {
        $template = new \League\Plates\Engine(__DIR__ . "/../../src/views", "php");
        echo $template->render($view, $data);
    }
}