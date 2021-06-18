{% extends 'dashboard/dashboard.twig.php' %}

{% block css %}
    <link rel="stylesheet" href="//localhost/{{BASE}}/public/css/dashboard/config.css">
{% endblock %}

{% block content %}
    <!-- Config -->
    <div class="config">
        <h4>Account</h4>
        <hr>
        <div class="container-account-form">
            <form id="updateForm">
                <div id="form-account">
                    <h5>Name:</h5>
                    <input maxlength="40" name="name" type="text" placeholder="Name" value="{{user.name}}"><br>
                    <h5>Email:</h5>
                    <input maxlength="40" name="email" type="text" placeholder="Email" value="{{user.email}}"><br>
                    <h5>Password:</h5>
                    <input maxlength="40" name="password" type="text" placeholder="Password" value="{{user.password}}"><br>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="delete-account">
        <h4>Delete Account:</h4>
        <hr>
        <h5 class="warning-delete">This can't be undone. Are you sure?</h5>
        <button id="btnDelete">Yes, I want to delete</button>
    </div>
{% endblock %}

{% block js %}
    <script type="module" src="//localhost/{{BASE}}/public/js/dashboard/config.js"></script>
{% endblock %}