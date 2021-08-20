<?php
    
namespace App\Utils;
class View {

    private static function getContentView($view){
        $file = __DIR__.'/../../resources/views/'.$view.'.php';
        return file_exists($file) ? file_get_contents ($file) : '';
    }

    // método responsável por retornar o conteúdo renderizado de uma view
    public static function render($view){
        // conteúdo da view
        $contentView = self::getContentView($view);
        // retorna o conteúdo renderizado
        return $contentView;
    }
}