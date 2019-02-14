<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Andika's Home</title>

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">
</head>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Andika</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="{{ url('profile') }}">Profile</a>
                    <a class="nav-link" href="{{url('portofolio')}}">Portofolio</a>
                    <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Muhammad Rizki Andika</h1>
            <p class="lead">Android and Web Enthusiast</p>
        </main>

        <footer class="mastfoot mt-auto">
        </footer>
    </div>
</body>

</html>
