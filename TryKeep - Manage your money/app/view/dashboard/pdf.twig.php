<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MoneyMovements</title>
    <style>
        @page {
            margin: 0;
        }
        * {
            margin: 0;
            padding: 0;
        }
        body {
            background: #15273A;
            font-family: 'Open Sans', sans-serif;
        }
        .header {
            width: 100%;
            background: #8C2F39;
            text-align: center;
            padding: 40px;
            color: #C55A63;
        }
        .footer {
            position: fixed;
            bottom: 55px;
            left: 0px;
            width: 100%;
            background: #101F2E;
            text-align: center;
            padding: 20px;
            color: #D6D6D6;
            font-style: bold;
        }
        .footer .page:after {
            content: counter(page);
        }
        table {
            width: 100%;
            border: 1px solid #101F2E;
            margin: 0;
            padding: 0;
        }
        table, th, td {
            border: 1px solid #101F2E;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            padding: 10px;
        }
        th {
            background: #101F2E;
            color: #2B5078;
            font-style: bold;
        }
        td {
            background: #15293C;
            color: #D6D6D6;
        }
        tr:nth-child(2n+0) td {
            background: #172D42 !important;
        }
        p {
            color: #8888;
            margin: 0px;
            text-align: center;
        }
        .content {
            padding: 60px
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>MoneyMovement | TryKeep</h2>
    </div>

    <div class="footer">Generate at {{ date }}, <span class="page">Page </span></div>

    <div class="content">
        <table>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Type</th>
            </tr>
            {% for mm in list %}
                <tr>
                    <td>{{mm.title}}</td>
                    <td>{{mm.category}}</td>
                    <td>R$ {{mm.amount}}</td>
                    <td>{{mm.date}}</td>
                </tr>
            {% endfor %}
        </table>
    </div>
</body>
</html>