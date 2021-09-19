<?php

namespace App\Controllers;
use App\Utils\TemplateEngine;
use App\Models\Post;
use App\Models\Comment;

class WebController {
    function home() {
        $post = new Post();
        $posts = $post->find()->fetch(true);
        TemplateEngine::render('home', [
            "posts" => $posts
        ]);
    }
    function post() {
        TemplateEngine::render('post');
    }
    function error() {
        TemplateEngine::render('error');
    }
}