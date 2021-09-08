<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found</title>
    <link rel="stylesheet" href="resources/scss/main.css">
</head>
<body>
    <div class="error">
        <h1>Error: <?= $this->e($err_code) ?></h1>
    </div>
</body>
</html>