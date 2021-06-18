{% extends 'dashboard/dashboard.twig.php' %}

{% block css %}
    <link rel="stylesheet" href="//localhost/{{BASE}}/public/css/util/table.css">
    <link rel="stylesheet" href="//localhost/{{BASE}}/public/css/dashboard/stats.css">
{% endblock %}

{% block content %}
    <!-- Stats -->
    <div class="stats-more-less">
        <h4>More Expensive Movement</h4>
        <div class="container-table">
            <div class="table">
                <div class="row header">
                    <div class="cell">Title</div>
                    <div class="cell">Tag</div>
                    <div class="cell">Amount</div>
                    <div class="cell">Date</div>
                </div>
                <div class="row">
                    <div class="cell title" data-title="Title">{{max.title}}</div>
                    <div class="cell" data-title="Tag">{{max.tag}}</div>
                    <div class="cell" data-title="Amount">R${{max.amount}}</div>
                    <div class="cell" data-title="Date">{{max.date}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="stats-more-less">
        <h4>Less Expensive Movement</h4>
        <div class="container-table">
            <div class="table">
                <div class="row header">
                    <div class="cell">Title</div>
                    <div class="cell">Tag</div>
                    <div class="cell">Amount</div>
                    <div class="cell">Date</div>
                </div>
                <div class="row">
                    <div class="cell title" data-title="Title">{{min.title}}</div>
                    <div class="cell" data-title="Tag">{{min.tag}}</div>
                    <div class="cell" data-title="Amount">R${{min.amount}}</div>
                    <div class="cell" data-title="Date">{{min.date}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-container">
        <h3>Chartt</h3>
        <form id="chartForm">
            <select class="dropdown" name="tag">
                <option value="0" class="label">Tag</option>
                {% for tag in tags %}
                    <option value="{{tag.tag}}">{{tag.tag}}</option>
                {% endfor %}
            </select>
            <button type="submit">Apply</button>
        </form>
        <div class="chart-data">
            <p id="tagAmount">{{tagAmount}}</p>
            <p id="categoryAmount">{{categoryAmount}}</p>
        </div>
        <div class="chart">
            <canvas id="myChart" width="300" height="300"></canvas>
        </div>
    </div>
    
{% endblock %}

{% block js %}
    <script src="//localhost/{{BASE}}/public/js/functions/jquery.easydropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module" src="//localhost/{{BASE}}/public/js/dashboard/stats.js"></script>
{% endblock %}