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
    <header class="header">
        <div class="header__inside">
            <div class="logo">
                <h3>Lara<span>CRUD</span></h3>
            </div>
            <nav>
                <ul>
                    <li><a href="http://localhost:8000/home">Home</a></li>
                    <li><a href="http://localhost:8000/contacts">Contacts</a></li>
                    <li><a class="active" href="http://localhost:8000/new/contact">New Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="main__inside">
            <form>
                <h3>New contact</h3>
                <input type="text" placeholder="Name" name="name">
                <input type="text" placeholder="Number" name="number">
                <input type="submit">
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="footer__inside">
            <div class="content">
                <div class="logo">
                    <h3>Lara<span>CRUD</span></h3>
                </div>
            </div>
            <div class="credits">
                <h4>By David Almeida</h4>
            </div>
        </div>
    </footer>
</body>
</html>