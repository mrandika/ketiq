<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/blog/blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/navigation.css')}}">
    <title>Blog Home</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="#">Andika Blog</a><button class="navbar-toggler"
                    data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
                        </form>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('blog/admin') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div data-bs-parallax-bg="true" style="height:500px;background-image:url(&quot;http://mrandika.ga/img/poster.jpg&quot;);background-position:center;background-size:cover;"></div>
    <div class="mb-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-3">
                    @if (\App\Post::count() == 0)
                    <div class="jumbotron">
                        <h1 class="display-5">Hello, world!</h1>
                        <p class="lead">Whoops... There's no posts yet. Come back later ?</p>
                        <p>Believe in something great.</p>
                    </div>
                    @else
                    @foreach ($posts->sortByDesc('created_at') as $post)

                    <div class="card mb-3">
                        <div class="card-body">
                                <img class="card-img-right flex-auto d-none d-lg-block mb-4"
                                src="{{url('uploads/'.$post->featuredImage)}}" style="width: 100%">
                            <h4 class="card-title"><a
                                    href="{{ action('PostController@show', $post->id)}} ">{{$post->title}}</a></h4>
                            <h6 class="text-muted card-subtitle mb-2 mt-2">Oleh {{ $post->uploadedBy }}, pada
                                {{\Carbon\Carbon::parse($post->created_at)->format('l, d F Y H:i')}}.</h6>
                                
                            <p>{{$post->headline}}</p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="card-title">Recent Post</h4>
                            <h6 class="text-muted card-subtitle mb-2">Don't Miss These Post!</h6>
                        </div>
                        <ul>
                            @foreach ($posts->sortByDesc('created_at') as $post)
                            <li><a href="{{ action('PostController@show', $post->id)}}">{{$post->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="card-title">Categories</h4>
                            <h6 class="text-muted card-subtitle mb-2">Who Like Messed Up Post ?</h6>
                            <ul>
                                @foreach ($categories as $categorie)
                                <li><a href="{{url('blog/filter', $categorie->id)}}">{{$categorie->categorie}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-clean">
        <footer>
            <div class="container text-center">
                <p>Powered by <b>Ketiq</b></p>
                <div class="row justify-content-center">
                    <p class="copyright">Andika © 2019</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
