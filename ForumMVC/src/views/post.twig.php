<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ROOT}}/src/css/main.css">
    <title>TNT Sports | POST</title>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="content">
                <img src="{{ROOT}}/src/img/svg/logo.svg" alt="Logo">
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
    
    <section class="content post">
        <div class="post">
            <h2>{{ post.title }}</h2>
            <p>{{ post.content }}</p>
        </div>

        <div class="comments">
            <h3>Comentários</h3>
            {% for comment in comments %}
                <div class="comment">
                    <h5>{{ comment.name }}</h5>
                    <p>{{ comment.message }}</p>
                </div>
            {% endfor %}
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <img src="{{ROOT}}/src/img/svg/logo-white.svg" alt="Logo">     
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="{{ROOT}}/src/js/main.js"></script>
</body>
</html>