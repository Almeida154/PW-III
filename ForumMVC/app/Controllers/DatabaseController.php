<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Exception;

class DatabaseController {

    function read() {
        $post = new Post();
        $list = $post->find()->fetch(true);
    
        foreach ($list as $post) {
            var_dump($post->title);
            if ($post->comments() != null) 
                foreach ($post->comments() as $comment) {
                    var_dump($comment->data());
                }
            else echo "Sem comentarios";
        }
    }

    function create() {
        $post = new Post();
        $post->title = "Título";
        $post->content = "Conteúdo muuuiiiitooo pica, slk muito massa!";
        $post->save();

        $comment = new Comment();
        $comment->add($post, "Giovanna", "Muito massa esse conteúdo, ein");
        $comment->save();

        var_dump($post);
    }

    function update() {
        $id = 1;
        $post = (new Post())->findById($id);
        $post->title = "blabla";
        $post->content = "blabla";
        $post->save();
    }

    function delete() {
        $id = 1;
        $post = (new Post())->findById($id);
        
        if ($post) {
            $post->destroy();
        } else {
            throw new Exception("n deu pra apagar");
        }
    }

}