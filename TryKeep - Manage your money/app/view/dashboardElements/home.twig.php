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
                <li><a href="dashboard/logout">Log out</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <section class="content">

        <!-- Sticky Sidebar | Navigation -->
        <div class="sticky-sidebar">
            <div class="wrapper-container-navigation">
                <div class="container-navigation active" section="home">
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
                <h4 id="logout-sidebar">Log Out</h4>
            </div>
        </div>

        <div class="content-container">
            <!-- Welcome Banner -->
            <div class="welcome">
                <div class="wrapper-welcome">
                    <div class="welcome-text">
                        <h4>Hello, {{obj['name']}}</h4>
                        <p>Be welcome. Keep track of your expenses, and don't forget:</p>
                        <p><i>"More important than how much you earn is how you spend"</i> - Conrado Navarro</p>
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
                                <div class="cell">Date</div>
                                <div class="cell">Type</div>
                            </div>
                            {% for moneyMovement in list %}
                                <div class="row">
                                    <div class="cell title" data-title="Title">{{moneyMovement.title}}</div>
                                    <div class="cell" data-title="Tag">{{moneyMovement.tag}}</div>
                                    <div class="cell" data-title="Amount">R${{moneyMovement.amount}}</div>
                                    <div class="cell" data-title="Date">{{moneyMovement.date}}</div>
                                    <div class="cell" id="category" data-title="Type"
                                        {% if moneyMovement.category == 'Expense' %} category="Expense"
                                        {% else %} category="Income"
                                        {% endif %}>
                                        {{moneyMovement.category}}
                                    </div>
                                </div>
                            {% endfor %}
                        </div>
                    </div>
                </div>
                <div class="filter">
                    <h3>Filter your money</h3>
                    <h5 class="title-filter-type">Search:</h5>
                    <input id="inptSearch" type="text" placeholder="Type here...">
                    <h5 class="title-filter-type">Type:</h5>
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" checked="checked" id="cb-income">
                            Income
                        </label>
                        <label>
                            <input type="checkbox" checked="checked" id="cb-expense">
                            Expense
                        </label>
                    </div>
                    <h5 class="title-filter-type">Filter:</h5>
                    <form id="filter-form" method="POST">
                        <select class="dropdown" name="slc">
                            <option value="0" class="label">Tag</option>
                            <option value="-1" class="label">All</option>
                            {% for tag in tags %}
                                <option value="{{tag.id}}">{{tag.tag}}</option>
                            {% endfor %}
                        </select>
                        <select class="dropdown" name="order">
                            <option value="date" class="label">Order</option>
                            <option value="date">Date</option>
                            <option value="amount">More Expensive</option>
                        </select>
                        <input id="cb" name="cb" type="text">
                        <button type="submit">Filter</button>
                    </form>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>   
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../public/js/functions/jquery.maskMoney.js"></script>
            <script src="../public/js/functions/jquery.easydropdown.js"></script>
            <script src="../public/js/dashboard.js"></script>
        </div>
    </section>
</body>