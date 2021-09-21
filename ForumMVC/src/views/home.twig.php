<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ROOT}}/src/css/main.css">
    <title>TNT Sports</title>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="content">
                <img src="src/img/svg/logo.svg" alt="Logo">
                <nav>
                    <ul>
                        <li><a href="http://">Home</a></li>
                        <li><a href="http://">Sobre</a></li>
                        <li><a href="http://">Contato</a></li>
                    </ul>
                </nav>
                <div class="actions">
                    <ion-icon name="search-outline"></ion-icon>
                    <button>Assinar e Assistir</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero">
        <h2>Athletico 2x1 Juventude: veja os melhores momentos do jogo pela 21ª rodada</h2>
    </section>

    <section class="content">
        <!-- Info -->
        <section class="info">
            <div class="info__card">
                <img src="src/img/png/info1.jpg" alt="" srcset="">
                <h4>DANIEL ALVES RECEBE SEIS PROPOSTAS APÓS RESCISÃO COM O SÃO PAULO</h4>
            </div>
            <div class="info__card">
                <img src="src/img/png/info2.jpg" alt="" srcset="">
                <h4>ARANA É ELOGIADO POR TORCEDORES DO ATLÉTICO-MG: 'É UM ABSURDO SER RESERVA NA SELEÇÃO'</h4>
            </div>
            <div class="info__card">
                <img src="src/img/png/info3.jpg" alt="" srcset="">
                <h4>ATHLETICO 2X1 JUVENTUDE: VEJA OS MELHORES MOMENTOS DO JOGO PELA 21ª RODADA</h4>
            </div>
            <div class="info__card">
                <img src="src/img/png/info4.jpg" alt="" srcset="">
                <h4>REAL MADRID DEFINE NOVA ESTRATÉGIA SOBRE MBAPPÉ, DIZ TV</h4>
            </div>
        </section>

        <!-- News -->
        <section class="news">
            <div class="new">
                <h4>DEPOIS DE CINCO MESES E 73% DE APROVEITAMENTO, MANO MENEZES É DEMITIDO PELO AL-NASSR</h4>
                <p>Por Redação TNT Sportss</p>
            </div>
            <div class="new">
                <h4>DEPOIS DE CINCO MESES E 73% DE APROVEITAMENTO, MANO MENEZES É DEMITIDO PELO AL-NASSR</h4>
                <p>Por Redação TNT Sportss</p>
            </div>
        </section>

        <!-- Videos -->
        <section class="videos">
            <h3><span>Últimos</span><br>vídeos</h3>
            <iframe width="850" height="480" src="https://www.youtube.com/embed/eorSzWFUq_E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>

        <!-- Posts -->
        <section class="posts">
            {% for post in posts %}
                <div class="posts__card" key="{{post.id}}">
                    <span>Tag</span>
                    <h3>{{post.title}}</h3>
                    <p>Por Redação TNT Sports</p>
                </div>
            {% endfor %}
        </section>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <img src="src/img/svg/logo-white.svg" alt="Logo">     
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="src/js/main.js"></script>
</body>
</html>