<?php

namespace App\Models;
use CoffeeCode\DataLayer\DataLayer;

class Comment extends DataLayer {

    function __construct() {
        parent::__construct("comments", ["name", "message", "post_id"], "id", false);
    }

    function add(Post $post, string $name, string $message): Comment {
        $this->post_id = $post->id;
        $this->name = $name;
        $this->message = $message;
        return $this;
    }

}