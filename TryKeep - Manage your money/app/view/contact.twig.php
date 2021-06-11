{% extends 'template/main.twig.php' %}

{% block head %}
    <link rel="stylesheet" href="../public/css/easydropdown.flat.css">
    <link rel="stylesheet" href="../public/css/contact.css">
    <title>TryKeep | Contact</title>
{% endblock %}

{% block body %}

    <!-- Container -->

    <section id="container">
        <div id="platform">
            <div id="form">
                <h3>Contact Us</h3>
                <p><span>&</span> tell us what you need!</p>
                <form>
                    <div id="form-container">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Email">
                        <select class="dropdown" name="type">
                            <option class="label">Type</option>
                            <option value="Complaint">Complaint</option>
                            <option value="Suggestion">Suggestion</option>
                            <option value="Problem">Problem</option>
                        </select>
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit">Send</button>
                    </div>
                </form>
            </div>
            <div id="icon">
                <img src="../public/svg/iconContact.svg" alt="Contact Icon">
            </div>
        </div>
    </section>
    
    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="../public/js/jquery.easydropdown.js"></script>
    <script src="../public/js/main.js"></script>
    <script src="../public/js/contact.js"></script>

{% endblock %}