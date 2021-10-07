<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/scss/main.css">
    <title>Contacts</title>
</head>
<body>
    <header>
        <div class="logo">
            <h3>Lara<span>CRUD</span></h3>
        </div>
        <nav>
            <ul>
                <li><a href="home">Home</a></li>
                <li><a class="active" href="contacts">Contacts</a></li>
                <li><a href="new/contact">New Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>New Contact</h1>
        <form>
            <input type="text" name="name">
            <input type="text" name="number">
            <input type="submit">
        </form>
    </main>

    <footer>
        <div class="content">
            <div class="logo">
                <h3>Lara<span>CRUD</span></h3>
            </div>
        </div>
        <div class="credits">
            <h4>By David Almeida</h4>
        </div>
    </footer>
</body>
</html>