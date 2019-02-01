<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/styles.css') }}">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="#">Andika Blog</a><button class="navbar-toggler"
                    data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                    @foreach ($posts as $key => $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{url('view')}}">{{$post->title}}</a></h4>
                            @if (Auth::check())
                            <a href="#">REMOVE </a> | <a href=""> EDIT</a>
                            @endif
                            <h6 class="text-muted card-subtitle mb-2 mt-2">Oleh Muhammad Rizki Andika, pada
                                {{$post->created_at}}.</h6>
                            <p class="card-text">{{$post->content}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="card-title">Recent Post</h4>
                            <h6 class="text-muted card-subtitle mb-2">Don't Miss These Post!</h6>
                        </div>
                        <ul>
                            @foreach ($posts as $key => $post)
                            <li><a href="#">{{$post->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="card-title">Categories</h4>
                            <h6 class="text-muted card-subtitle mb-2">Who Like Messed Up Post ?</h6>
                            <ul>
                                @foreach ($categories as $key => $categorie)
                                <li><a href="#">{{$categorie->categories}}</a></li>
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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Careers</h3>
                        <ul>
                            <li><a href="#">Job openings</a></li>
                            <li><a href="#">Employee success</a></li>
                            <li><a href="#">Benefits</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i
                                class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a
                            href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Company Name © 2017</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>