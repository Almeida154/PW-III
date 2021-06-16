{% extends 'template/main.twig.php' %}

{% block head %}
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../public/css/util/flickity.css">
    <link rel="stylesheet" href="../public/css/home.css">
    <title>TryKeep | Home</title>
{% endblock %}

{% block body %}

    <!-- Wallpaper -->

    <section id="wallpaper">
        <div id="welcome">
            <div id="content" class="anime-left">
                <h2>Looking for <span>organization</span>? Here your <span>money</span> matter</h2>
                <p>Organize your money with us. Here you can have control 
                of all your expenses. Furthermore, we are the best option
                on the market.</p>
                <button id="btn">Sign In</button>
                <a>Sign Up</a>
            </div>
            <div id="icon" class="anime-left">
                <img src="../public/svg/icon.svg" alt="Svg Icon">
            </div>
        </div>
    </section>
    
    <div class="wave01"></div>

    <!-- Main -->

    <section id="main">

        <!-- row -->

        <div class="row-main">
            <div class="content-container anime-top">
                <h3>About us</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod quas unde dolorum reiciendis voluptatem consequatur ullam, laborum illum autem cum rerum placeat aliquam odio repudiandae suscipit numquam, veritatis, aliquid inventore?</p>
            </div>
            <div class="icon-container anime-top">
                <img src="../public/svg/iconRow01.svg" alt="Svg Icon">
            </div>
        </div>

        <div class="wave02"></div>

        <!-- row -->

        <div class="row-main scnd">
            <div class="icon-container anime-top">
                <img src="../public/svg/iconRow02.svg" alt="Svg Icon">
            </div>
            <div class="content-container right anime-top">
                <h3>The TryKeep Project</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod quas unde dolorum reiciendis voluptatem consequatur ullam, laborum illum autem cum rerum placeat aliquam odio repudiandae suscipit numquam, veritatis, aliquid inventore?</p>
            </div>
        </div>

        <div class="wave03"></div>

        <div class="row-end">
            <h3 class="anime-left">Our goal</h3>
            <p class="anime-left">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod quas unde dolorum reiciendis voluptatem consequatur ullam, laborum illum autem cum rerum placeat aliquam odio repudiandae suscipit numquam, veritatis, aliquid inventore?</p>
        </div>

    </section>

    <!-- Slide -->

    <section id="slide" data-flickity='{ "autoPlay": true }'>
        <div class="slide-cell" style="background-image: url('../public/svg/prayingmantisicon.svg');"></div>
    </section>

    <!-- Map -->

    <section id="map">
        <div id="container-map">
            <div id="iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.434084277819!2d-46.40032459367123!3d-23.552848381776816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce65086cafaf55%3A0xf7da96815e7611da!2sETEC%20de%20Guaianazes!5e0!3m2!1spt-BR!2sbr!4v1623101737553!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div id="desc">
                <h4>The headquarter</h4>
                <p><i class="fas fa-user-tie"></i>David Almeida, CEO</p>
                <p><i class="fas fa-map-marked-alt"></i>St. Felíciano de Mendonça, 290</p>
                <p><i class="fas fa-globe-americas"></i></i>Brazil</p>
                <p><i class="fas fa-flag"></i>São Paulo - SP</p>
                <a href="/contact.html"><button id="btn">Contact Us</button></a>
            </div>
        </div>
    </section>

    {% include 'template/footer.twig.php' %}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="../public/js/functions/flickity.pkgd.js"></script>
    <script src="../public/js/main.js"></script>
    <script src="../public/js/home.js"></script>

{% endblock %}