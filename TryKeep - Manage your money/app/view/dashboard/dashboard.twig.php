<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//localhost/{{BASE}}/public/fontawesome/css/all.css">
    <link rel="stylesheet" href="//localhost/{{BASE}}/public/css/util/easydropdown.flat.css">
    <link rel="stylesheet" href="//localhost/{{BASE}}/public/css/dashboard/dashboard.css">
    {% block css %}{% endblock%}
    <title>Dashboard | Trykeep</title>
</head>
<body>

    <!-- Navbar -->
    <header id="header">
        <div id="logo">
            <img src="//localhost/{{BASE}}/public/svg/prayingmantisicon.svg" alt="An praying mantis as a icon">
            <h3>Dashboard</h3>
        </div>
        <nav id="nav">
            <button id="btn-mobile" aria-label="Open Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li><a href="//localhost/{{BASE}}/public/dashboard/logout">Log out</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <section class="content">
        <!-- Sticky Sidebar | Navigation -->
        <div class="sticky-sidebar">
            <div class="wrapper-container-navigation">
                <div class="container-navigation" section="home">
                    <i class="fas fa-home"></i>
                    <h3>Home</h3>
                </div>
                <div class="container-navigation" section="stats">
                    <i class="fas fa-chart-pie"></i>
                    <h3>Stats</h3>
                </div>
                <div class="container-navigation" section="new">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h3>New</h3>
                </div>
                <div class="container-navigation" section="config">
                    <i class="fas fa-cog"></i>
                    <h3>Config</h3>
                </div>
                <a href="//localhost/{{BASE}}/public/dashboard/logout">
                    <h4 id="logout-sidebar">Log Out</h4>
                </a>
            </div>
        </div>
        <div class="content-container">
            {% block content %}{% endblock %}
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//localhost/{{BASE}}/public/js/dashboard/dashboard.js"></script>
    {% block js %}{% endblock %}
</body>
</html>