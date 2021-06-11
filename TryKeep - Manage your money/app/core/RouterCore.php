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
                    break;
                }
            }
        }
    }

    private function normalizeURI($arr) {
        return array_values(array_filter($arr));
    }

}