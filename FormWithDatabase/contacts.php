<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/util.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Contatos</title>
    </head>
    <body>
        <div class="container-table-master">
            <div class="container-hyper">
                <div class="table">

                    <?php
                        require_once 'models/Message.php';
                        $message = new Message(null, null, null, null);
                        $allMessages = $message->getAll();
                    ?>
                
                    <div class="row header">
                        <div class="cell">Id</div>
                        <div class="cell">Nome</div>
                        <div class="cell">Email</div>
                        <div class="cell">Assunto</div>
                        <div class="cell">Ação</div>
                    </div>

                    <?php
                        foreach($allMessages as $message) {
                    ?>

                        <div class="row row-data" key=<?php echo $message['idMessage'] ?>>
                            <div class="cell" data-title="Id"><?php echo $message['idMessage'] ?></div>
                            <div class="cell" data-title="Nome"><?php echo $message['nameFromMessage'] ?></div>
                            <div class="cell" data-title="Email"><?php echo $message['emailFromMessage'] ?></div>
                            <div class="cell" data-title="Assunto"><?php echo $message['subjectMessage'] ?></div>
                            <div class="cell" data-title="Ação">
                                <a href="controllers/DeleteMessage.php?id=<?php echo $message['idMessage'] ?>">
                                    <i class="far fa-trash-alt contact"></i>
                                </a>
                            </div>
                        </div>

                    <?php
                        }
                    ?>

                </div>
            </div>
            <a class="fs-15 flex-c m-t-40 linkao back" href="index.php">Voltar</a>
        </div>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script>

            $('.row-data').click(function(){
                var key = $(this).attr('key')
                window.open('modelMessage.php?id=' + key, '_self')
            })

        </script>
    </body>
</html>