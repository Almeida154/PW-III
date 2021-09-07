<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resources/scss/main.css">
</head>
<body>
    <div class="main">
        <div class="main__container">
            <div class="info">
                <div class="info__main">
                    <h1>Viacep</h1>
                    <p>Procurando um webservice gratuito e de alto desempenho para consultar CEP no Brasil?</p>
                </div>
            </div>
            <div class="form">
                <div class="form__content">
                    <form action="">
                        <h2>Seu endereço:</h2>
                        <div class="field">
                            <i class="fas fa-directions"></i>
                            <input type="text" name="cep" placeholder="Cep">
                        </div>
                        <div class="field">
                            <i class="far fa-map"></i>
                            <input type="text" name="street" placeholder="Rua">
                        </div>
                        <div class="field">
                            <i class="far fa-flag"></i>
                            <input type="text" name="district"
                            placeholder="Bairro">
                        </div>
                        <div class="field">
                            <i class="far fa-building"></i>
                            <input type="text" name="locality" placeholder="Localização">
                        </div>
                        <button type="submit">
                            <p>Enviar</p>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </button>
                    </form>
                </div>
                <div class="form__glass"></div>
            </div>
        </div>

        <div class="noise"></div>
        <img class="plant" src="resources/img/leaf.png" alt="">
        <img class="plant" src="resources/img/leaf2.png" alt="">
    </div>
    <div class="divisor"></div>
    <script src="https://kit.fontawesome.com/f81df082bf.js" crossorigin="anonymous"></script>
</body>
</html>