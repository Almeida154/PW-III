<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/easydropdown.flat.css">
    <link rel="stylesheet" href="/css/website.css">
    <title>ServeX: For programmers</title>
</head>
<body>

    {{-- Splash --}}

    <section class="container-splash">
        <div class="wrapper-splash anime-top">
            <p>ServeX</p>
            <div class="loader"></div>
        </div>
    </section>

    {{-- Dash --}}

    <section class="container-dash">

        {{-- Nav --}}

        <header>
            <nav>
                <label class="logo">ServeX</label>
                <div id="search-form">
                    <input id="inptSearch" type="text" placeholder="Search...">
                    <i class="fas fa-search"></i>
                </div>
            </nav>
        </header>

        {{-- Content --}}
        
        <section class="container-master">
            <div class="content">
                <?php if(count($technicalities) == 0){?>
                    <div class="not-found">
                        <h4>Nothing Found :(</h4>
                    </div>
                <?php } ?>
                <div class="cards">
                    @foreach($technicalities as $technicality)
                        <a href="{{route('detail', $technicality->id)}}">
                            <div class="card">
                                <h3>{{$technicality->technicality}}</h3>
                                <p>{{$technicality->description}}</p>
                                <p><i class="fas fa-hand-point-right"></i>
                                    @if(!$isFiltered)
                                        <?php $i = 0; ?>
                                        @foreach($technicality->categories as $category)
                                            <span>
                                                {{$category->category}}
                                                <?php
                                                    if(++$i < count($technicality->categories)){
                                                        echo ',';
                                                    }
                                                ?>
                                            </span>
                                        @endforeach
                                    @else
                                        <span>{{$category->category}}</span>
                                    @endif
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="sticky-filter">
                <div class="header-filter">
                    <h3>Filter for best results</h3>
                </div>
                <div class="body-filter">
                    <h3>Filter by category</h3>
                    <form id="select-form" method="get">
                        @csrf
                        <select class="dropdown" name="categ">
                            <option class="label">Category</option>
                            <option value="null">Nothing</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Go">
                    </form>
                </div>
            </div>
        </section>

        {{-- Ads --}}

        <section class="container-ads">
            <img id="ads-image" src="/images/smartphone.png">
            <div class="info">
                <div class="helper-info">
                    <h3>INSTALL OUR APP NOW!</h3>
                    <p>have all this content in your pocket</p>
                    <img src="/images/ggplay.png">
                </div>
            </div>
        </section>

        {{-- Footer --}}

        <footer>
            <div class="container-foo">
                <div class="helper">
                    <h3 id="logo-anchor">ServeX</h3>
                    <div class="icons">
                        <div class="icon-wrapper">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
    
                        <div class="icon-wrapper">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
    
                        <div class="icon-wrapper">
                            <a href="#"><i class="fab fa-google-play"></i></a>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="credits">
                <p>Developed by <span style="font-family: Poppins-Bold">Mtec Blinders</span></p>
            </div>
        </footer>

    </section>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="/js/website.js"></script>
    <script src="/js/jquery.easydropdown.js"></script>
</body>
</html>