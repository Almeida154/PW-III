<?php

namespace app\core;

class RouterCore {

    private $uri;
    private $method;
    private $getArr = [];

    public function __construct() {
        require_once('../app/config/Router.php');
        $this->initialize();
        $this->execute();
    }

    private function initialize() {
        $ex = explode('/', $_SERVER['REQUEST_URI']);
        $uri = $_SERVER['REQUEST_URI'];
        
        if(strpos($uri, '?')) $uri = mb_substr($uri, 0, strpos($uri, '?'));
        $uri = $this->normalizeURI($ex);

        for($i = 0; $i < UNSET_URI_COUNT; $i++) unset($uri[$i]);

        $this->uri = implode('/', $this->normalizeURI($uri));
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private function get($route, $callback) {
        $this->getArr[] = [
            'route' => $route,
            'callback' => $callback
        ];
    }

    private function post($route, $callback) {
        $this->getArr[] = [
            'route' => $route,
            'callback' => $callback
        ];
    }

    private function execute() {
        switch($this->method) {
            case 'GET': $this->executeGET(); break;
            case 'POST': $this->executePOST(); break;
        }
    }
    
    private function executeGET() {
        foreach($this->getArr as $get) {
            $r = substr($get['route'], 1);
            if(substr($r, -1) == '/') $r = substr($r, 0, -1);
            if($this->uri == $r) {
                if(is_callable($get['callback'])) {
                    $get['callback']();
                    return;
                }
                $this->controller($get['callback']);
            }
        }
    }

    private function executePOST() {
        foreach($this->getArr as $get) {
            $r = substr($get['route'], 1);
            if(substr($r, -1) == '/') $r = substr($r, 0, -1);
            if($this->uri == $r) {
                if(is_callable($get['callback'])) {
                    $get['callback']();
                    return;
                }
                $this->controller($get['callback']);
            }
        }
    }

    private function controller($callback) {
        $ex = explode('@', $callback);
        if(!isset($ex[0]) || !isset($ex[1])) {
            (new \app\controller\ErrorController)->notFound('Controller or method not found', 'Sorry, I cant find ' . $callback, 404);
            return;
        }

        $controller = 'app\\controller\\' . $ex[0];
        if(!class_exists($controller)) {
            (new \app\controller\ErrorController)->notFound('Controller not found', 'Sorry, I cant find ' . $callback, 404);
            return;
        }

        if(!method_exists($controller, $ex[1])) {
            (new \app\controller\ErrorController)->notFound('Method not found', 'Sorry, I cant find ' . $callback, 404);
            return;
        }

        call_user_func_array([new $controller, $ex[1]], []);
    }

    private function normalizeURI($arr) {
        return array_values(array_filter($arr));
    }

}