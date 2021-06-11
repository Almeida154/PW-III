{% extends 'template/main.twig.php' %}

{% block head %}
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="../public/css/signIn.css">
    <title>TryKeep | Sign In</title>
{% endblock %}

{% block body %}

        <!-- Container -->

        <section id="container">
        <div id="platform">
            <div id="icon">
                <img src="../public/svg/iconSignIn.svg" alt="Contact Icon">
            </div>
            <div id="form">
                <div id="helper">
                    <h3>Hi :)</h3>
                    <form>
                        <div id="form-container">
                            <input type="text" placeholder="Email">
                            <input type="password" placeholder="Password">
                            <button type="submit">Sign In</button>
                        </div>
                    </form>
                    <p>New here?
                        <span>
                            <a href="signUp.html">Sign up</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="../public/js/main.js"></script>
    <script src="../public/js/signIn.js"></script>

{% endblock %}