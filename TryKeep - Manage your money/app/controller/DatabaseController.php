<?php

namespace app\controller;
use app\core\Controller;
use app\classes\Input;

class DatabaseController extends Controller {

    function insertUser() {
        $data = Input::post('userJSON');
        $json = json_decode(html_entity_decode($data))->user;
        dd($json);
    }

}