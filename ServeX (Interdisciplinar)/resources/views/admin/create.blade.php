<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/easydropdown.flat.css">
    <title>Admin - Create | ServeX</title>
</head>
<body>

    <section class="container">
        <h3>Create a new thing</h3>
        <form>
            @csrf
            <input id="inptTechnicality" type="text" name="technicality" placeholder="Technicality">
            <textarea id="inptDescription" name="description" placeholder="Description"></textarea>
            <input id="inptTag" type="text" placeholder="Write some tags"/>
            <div class="tag-container">
                {{-- <div class="tag">
                    <span>Teu Pai</span>
                    <i class="close"></i>
                </div> --}}
                <h4>Nothing yet :)</h4>
            </div>
            <button type="submit">
                Add technicality
            </button>
        </form>
    </section>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/jquery.easydropdown.js"></script>
    <script src="/js/admin.js"></script>
</body>
</html>