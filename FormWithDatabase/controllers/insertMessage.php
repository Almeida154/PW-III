<?php

    try {
        require_once '../models/Message.php';
        $message = new Message(
            $_POST['name'],
            $_POST['email'],
            $_POST['subject'],
            $_POST['message']
        );
        $message->insertDB($message);
        header('Location: ../index.php');
    } catch (\Throwable $th) {
        echo '<pre>';
            print_r($th);
        echo '</pre>';
        echo $th->getMessage();
    }

?>