<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="icons/css/all.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/util.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Mensagem</title>
    </head>
    <body>

        <?php
            require_once 'models/Message.php';
            $id = $_GET['id'];
            $message = new Message(null, null, null, null);
            $messageUnique = $message->getSingle($id);
        ?>

        <div class="container">
            <a href="controllers/DeleteMessage.php?id=<?php echo $messageUnique[0] ?>"><i class="far fa-trash-alt model"></i></a>
            <h3><?php echo $messageUnique[1] ?><span class="key m-l-10 fs-12">(id: <?php echo $messageUnique[0] ?>)</span></h3>
            <p class="paragraph"><span class="data-legend">Email: </span><?php echo $messageUnique[2] ?></p>
            <p class="paragraph"><span class="data-legend">Assunto: </span><?php echo $messageUnique[3] ?></p>
            <p class="paragraph"><span class="data-legend">Mensagem:</span></p>

            <p class="message p-t-30 p-b-30"><?php echo $messageUnique[4] ?></p>

            <a class="fs-15 flex-c linkao back" href="contacts.php">Voltar</a>
        </div>
    </body>
</html>