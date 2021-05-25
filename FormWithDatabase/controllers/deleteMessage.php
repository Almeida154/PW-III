<?php

    try {
        require_once '../models/Message.php';
        $message = new Message(null, null, null, null);
        $message->deleteDB(intval($_GET['id']));
        header('Location: ../contacts.php');
    } catch (\Throwable $th) {
        echo '<pre>';
            print_r($th);
        echo '</pre>';
        echo $th->getMessage();
    }

?>