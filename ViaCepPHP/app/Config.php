<?php

define("ROOT", "http://localhost/PW-III/ViaCepPHP");

function url(string $uri = null): string {
    if ($uri) return ROOT . "/{$uri}";
    return ROOT;
}

function response($json) {
    header("Content-type: application/json; charset=utf-8");
    echo $json;
}