<!DOCTYPE html>
<html>
<body>
    <div class="table">
        <div class="row header">
            <div class="cell">Title</div>
            <div class="cell">Tag</div>
            <div class="cell">Amount</div>
            <div class="cell">Date</div>
            <div class="cell">Type</div>
        </div>
        {% if list|length > 0 %}
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
        {% else %}
            <div id="not-found">
                <img src="../public/svg/iconNotFound.svg" alt="">
                <p>Not Found :/</p>
            </div>
        {% endif %}
    </div>
</body>
</html>

<script type="module" src="../public/js/dashboard.js"></script>