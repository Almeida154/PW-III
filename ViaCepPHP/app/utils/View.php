<?php

namespace App\Utils;

class View {

    private static function getContentView($view) {
        $file = __DIR__ . '/../../resources/views/' . $view . '.php';
        return file_exists($file) ? file_get_contents($file) : '';
    }
    
    //método repsonsável por retornar o conteúdo renderizado de uma view
    public static function render($view) {
        //retorna o conteúdo renderizado
        return self::getContentView($view);
    }
}