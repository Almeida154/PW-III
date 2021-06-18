{% extends 'template/main.twig.php' %}

{% block head %}
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="../public/css/signUp.css">
    <title>TryKeep | Sign Up</title>
{% endblock %}

{% block body %}

    <!-- Container -->

    <section id="container">
        <div id="platform">
            <div id="icon">
                <img src="../public/svg/iconSignUp.svg" alt="Contact Icon">
            </div>
            <div id="form">
                <div id="helper">
                    <h3>Hello!</h3>
                    <form id="formStart" autocomplete="off">
                        <div id="form-container">
                            <input maxlength="40" type="text" placeholder="Name" name="name">
                            <input maxlength="40" type="text" placeholder="Email" name="email">
                            <input maxlength="40" type="password" placeholder="Password" name="password">
                            <button type="submit">Sign Up</button>
                        </div>
                    </form>
                    <p>Have an account? 
                        <span>
                            <a href="signIn">Sign in</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../public/js/functions/jquery.maskMoney.js"></script>
    <script src="../public/js/main.js"></script>
    <script type="module" src="../public/js/signUp.js"></script>
    
{% endblock %}