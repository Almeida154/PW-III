<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/website.css">
    <title>ServeX: For programmers</title>
</head>
<body>
    <section class="body-detail">
        <div class="container-main">
            <h2>{{$technicality->technicality}}</h2>
            <div class="container-desc">
                <p>{{$technicality->description}}</p>
            </div>
            <div class="container-categories">
                <h5>Tags:</h5>
                @foreach($technicality->categories as $category)
                    <p><i class="fas fa-hand-point-right"></i>{{$category->category}}</p>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>