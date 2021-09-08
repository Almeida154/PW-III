<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viacep</title>
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
                    <form id="form">
                        <h2>Seu endereço:</h2>
                        <div class="field">
                            <i class="fas fa-directions"></i>
                            <input id="cepField" type="text" name="cep" placeholder="Cep">
                        </div>
                        <div class="field">
                            <i class="far fa-map"></i>
                            <input id="streetField" type="text" name="street" placeholder="Rua">
                        </div>
                        <div class="field">
                            <i class="far fa-flag"></i>
                            <input id="districtField" type="text" name="district"
                            placeholder="Bairro">
                        </div>
                        <div class="field">
                            <i class="far fa-building"></i>
                            <input id="localityField" type="text" name="locality" placeholder="Localização">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/f81df082bf.js" crossorigin="anonymous"></script>
    <script src="resources/js/jquery.mask.js"></script>
    <script src="resources/js/cep.js"></script>
</body>
</html>