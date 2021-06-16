<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../public/css/util/table.css">
    <link rel="stylesheet" href="../public/css/util/easydropdown.flat.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <title>Dashboard | TryKeep</title>
</head>
<body>

    <!-- Navbar -->
    <header id="header">
        <div id="logo">
            <img src="../public/svg/prayingmantisicon.svg" alt="An praying mantis as a icon">
            <h3>Dashboard</h3>
        </div>
        <nav id="nav">
            <button id="btn-mobile" aria-label="Open Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li><a href="home">Log out</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <section class="content">

        <!-- Sticky Sidebar -->
        <div class="sticky-sidebar">
            <div class="wrapper-container-navigation">
                <div class="container-navigation">
                    <i class="fas fa-home"></i>
                    <h3>Home</h3>
                </div>
                <div class="container-navigation">
                    <i class="fas fa-chart-pie"></i>
                    <h3>Stats</h3>
                </div>
                <div class="container-navigation">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h3>New</h3>
                </div>
                <div class="container-navigation">
                    <i class="fas fa-cog"></i>
                    <h3>Config</h3>
                </div>
                <h4 id="logout-sidebar">Log Out</h4>
            </div>
        </div>

        <div class="content-container">
            <!-- Welcome Banner -->
            <div class="welcome">
                <div class="wrapper-welcome">
                    <div class="welcome-text">
                        <h4>Hello, David</h4>
                        <p>Be welcome. Keep track of your expenses, and don't forget:</p>
                        <p>"More important than how much you earn is how you spend" - Conrado Navarro</p>
                    </div>
                    <img src="../public/svg/iconDashboard.svg" alt="Ads Icon">
                </div>
            </div>
            <!-- List -->
            <div class="list-container">
                <div class="list">
                    <h3>Your money movement</h3>
                    <div class="list-wrapper">
                        <!-- Table -->
                        <div class="table">
                            <div class="row header">
                                <div class="cell">Title</div>
                                <div class="cell">Tag</div>
                                <div class="cell">Amount</div>
                                <div class="cell">Type</div>
                            </div>
                            {% for i in 0..5 %}
                            <div class="row">
                                <div class="cell" data-title="Title">First Expense</div>
                                <div class="cell" data-title="Tag">Pet</div>
                                <div class="cell" data-title="Amount">R$324</div>
                                <div class="cell expense" data-title="Type">Expense</div>
                            </div>
                            {% endfor %}
                        </div>
                    </div>
                </div>
                <div class="filter">
                    <h3>Filter your money</h3>
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" checked="checked">
                            Income
                        </label>
                        <label>
                            <input type="checkbox" checked="checked">
                            Expense
                        </label>
                        <form>
                            <select class="dropdown" id="dash" name="type">
                                <option class="label">Tag</option>
                                <option value="Complaint">Complaint</option>
                                <option value="Suggestion">Suggestion</option>
                                <option value="Problem">Problem</option>
                            </select>
                            <button type="submit">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../public/js/functions/jquery.maskMoney.js"></script>
    <script src="../public/js/functions/jquery.easydropdown.js"></script>
    <script src="../public/js/util/select2.min.js"></script>
    <script type="module" src="../public/js/dashboard.js"></script>
</body>
</html>