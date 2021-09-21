<?php

namespace App\Utils;

class TemplateEngine {
    public static function render(string $view = "home", array $params = []) {
        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader(__DIR__ . '../../../src/views')
        );
        $twig->addGlobal('ROOT', ROOT);
        echo $twig->render($view . '.twig.php', $params);
    }
}