<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/scss/main.css">
    <title>New Contact</title>
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
                    <li><a class="active" href="http://localhost:8000/contacts">Contacts</a></li>
                    <li><a href="http://localhost:8000/new/contact">New Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="main__inside">
            <div class="contacts">
                <h3>Contacts</h3>
                @foreach ($contacts as $contact)    
                    <div class="contact">
                        <div class="photo">
                            <h5>{{strtoupper(substr($contact->name, 0, 1))}}</h5>
                        </div>
                        <div class="content">
                            <h4>{{$contact->name}}</h4>
                            <h6>{{$contact->number}}</h6>
                        </div>
                        <div class="actions">
                            <ion-icon key={{$contact->id}} name="trash-outline" class="deleteIcon"></ion-icon>
                        </div>
                    </div>
                @endforeach
            </div>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="/js/delete.js"></script>
</body>
</html>