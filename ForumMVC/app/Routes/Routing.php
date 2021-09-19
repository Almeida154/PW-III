<?php

namespace App\Routes;
use CoffeeCode\Router\Router;

class Routing {
    function __construct() {
        $router = new Router(ROOT);

        // Controllers
        $router->namespace("App\Controllers");

        // Routes
        $router->group(null);
        $router->get("/", "WebController:home");
        $router->get("/home", "WebController:home");
        $router->get("/post/{post_id}", "WebController:home");

        $router->group("/ooops");
        $router->get("/{err_code}", "WebController:error");

        // Init Routing
        $router->dispatch();

        if ($router->error()) {
            $router->redirect("/ooops/{$router->error()}");
        }
    }
}