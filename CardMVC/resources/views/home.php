<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CardMVC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/main.css">
</head>
<body>
    <div class="card-container">
        <div class="card">
            <div class="header">
                <h2 id="name"></h2>
            </div>
            <div class="content">
                <h4 id="price"></h4>
                <div class="content-data-row">
                    <ion-icon name="football-outline"></ion-icon>
                    <h4>League:
                        <span id="league"></span>
                    </h4>
                </div>
                <div class="content-data-row">
                    <ion-icon name="reader-outline"></ion-icon>
                    <h4>Description:
                        <span id="description"></span>
                    </h4>
                </div>
            </div>
            <div class="footer">
                <h4>Colors:</h4>
                <ul id="colors"></ul>
            </div>
            <div class="card-image"></div>
        </div>
        <div class="fab">
        <ion-icon name="arrow-forward-outline"></ion-icon>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="resources/js/main.js"></script>
</body>
</html>