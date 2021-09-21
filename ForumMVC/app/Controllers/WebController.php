<?php

namespace App\Controllers;
use App\Utils\TemplateEngine;
use App\Models\Post;
use App\Models\Comment;

class WebController {

    function home(): void {
        $post = new Post();
        $posts = $post->find()->fetch(true);
        TemplateEngine::render('home', [
            "posts" => $posts
        ]);
    }

    function post(array $params): void {
        $post = (new Post())->findById($params['post_id']);
        $comments = $post->comments();
        TemplateEngine::render('post', [
            "post" => $post,
            "comments" => $comments
        ]);
    }

    function error(): void {
        TemplateEngine::render('error');
    }
}