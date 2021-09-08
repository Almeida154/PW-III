<?php

require __DIR__ . '/vendor/autoload.php';
use CoffeeCode\Router\Router;

$router = new Router(ROOT);

// Controllers
$router->namespace("App\Controllers");

// Routes
$router->group(null);
$router->get("/", "WebController:home");
$router->get("/home", "WebController:home");

$router->get("/home/{cep}", "CepController:getAddress");

$router->group("/ooops");
$router->get("/{err_code}", "WebController:error");

// Init Routing
$router->dispatch();

// Error
if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}