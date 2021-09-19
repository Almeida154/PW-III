<?php

namespace App\Models;
use CoffeeCode\DataLayer\DataLayer;

class Post extends DataLayer {

    function __construct() {
        parent::__construct("posts", ["title", "content"], "id", false);
    }

    function comments() {
        return (new Comment())->find("post_id = :uid", "uid={$this->id}")->fetch(true);
    }
}