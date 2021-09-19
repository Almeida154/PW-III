<?php

namespace App\Controllers;

class CepController {

    public function getAddress($data) {
        $url = "http://viacep.com.br/ws/{$data['cep']}/json/";
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
        response(json_encode($json_data));
    }
    
}