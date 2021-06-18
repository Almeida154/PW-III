{% extends 'dashboard/dashboard.twig.php' %}

{% block css %}
    <link rel="stylesheet" href="//localhost/{{BASE}}/public/css/dashboard/new.css">
{% endblock %}

{% block content %}
    <!-- New -->
    <div class="new">
        <h4>New</h4>
        <hr>
        <div class="container-new-form">
            <form id="addForm">
                <h5 class="explain-add">Did you spend or earn any money? Register here! :)</h5>
                <div id="form-new">
                    <input maxlength="40" name="title" type="text" placeholder="Title"><br>
                    <input maxlength="16" id="amount" name="amount" type="text" placeholder="R$0,00"><br>
                    <select class="dropdown" name="tag">
                        <option value="0" class="label">Tag</option>
                        {% for tag in tags %}
                            <option value="{{tag.tag}}">{{tag.tag}}</option>
                        {% endfor %}
                    </select>
                    <textarea maxlength="60" name="description" placeholder="Description"></textarea>
                    <input id="hiddenAmount" name="hiddenAmount" type="text">
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
{% endblock %}

{% block js %}
    <script src="//localhost/{{BASE}}/public/js/functions/jquery.easydropdown.js"></script>
    <script src="//localhost/{{BASE}}/public/js/functions/jquery.maskMoney.js"></script>
    <script type="module" src="//localhost/{{BASE}}/public/js/dashboard/new.js"></script>
{% endblock %}