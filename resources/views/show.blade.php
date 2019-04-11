<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('css/share.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>{{$post->title}}</title>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="{{route('blog.home')}}">Andika Blog</a><button
                class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
                    </form>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Artikel</a></li>
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
    <div class="container article-clean mt-5 mb-2">
        <div class="row">
            {{-- Content --}}
            <div class="col-md-8">
                <h1 class="mb-3">{{$post->title}}</h1>
                <p><span class="by">by</span> <a href="#">{{$post->uploadedBy}}</a> | <span class="date">on
                        {{\Carbon\Carbon::parse($post->created_at)->format('l, d F Y H:i')}} </span></p>
                <p>Posted under <a href="{{url('blog/filter', $post->categoriesId)}}">{{\App\Categorie::select('categorie')->where('id',
                                $post->categoriesId)->first()->categorie}}</a></p>
                                
                <!-- Sharingbutton Facebook -->
                <a class="resp-sharing-button__link"
                    href="https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsharingbuttons.io" target="_blank"
                    rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                        <div aria-hidden="true"
                            class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm3.6 11.5h-2.1v7h-3v-7h-2v-2h2V8.34c0-1.1.35-2.82 2.65-2.82h2.35v2.3h-1.4c-.25 0-.6.13-.6.66V9.5h2.34l-.24 2z" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Sharingbutton Twitter -->
                <a class="resp-sharing-button__link"
                    href="https://twitter.com/intent/tweet/?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io"
                    target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small">
                        <div aria-hidden="true"
                            class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm5.26 9.38v.34c0 3.48-2.64 7.5-7.48 7.5-1.48 0-2.87-.44-4.03-1.2 1.37.17 2.77-.2 3.9-1.08-1.16-.02-2.13-.78-2.46-1.83.38.1.8.07 1.17-.03-1.2-.24-2.1-1.3-2.1-2.58v-.05c.35.2.75.32 1.18.33-.7-.47-1.17-1.28-1.17-2.2 0-.47.13-.92.36-1.3C7.94 8.85 9.88 9.9 12.06 10c-.04-.2-.06-.4-.06-.6 0-1.46 1.18-2.63 2.63-2.63.76 0 1.44.3 1.92.82.6-.12 1.95-.27 1.95-.27-.35.53-.72 1.66-1.24 2.04z" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Sharingbutton E-Mail -->
                <a class="resp-sharing-button__link"
                    href="mailto:?subject=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;body=http%3A%2F%2Fsharingbuttons.io"
                    target="_self" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small">
                        <div aria-hidden="true"
                            class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm8 16c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2V8c0-1.1.9-2 2-2h12c1.1 0 2 .9 2 2v8z" />
                                <path
                                    d="M17.9 8.18c-.2-.2-.5-.24-.72-.07L12 12.38 6.82 8.1c-.22-.16-.53-.13-.7.08s-.15.53.06.7l3.62 2.97-3.57 2.23c-.23.14-.3.45-.15.7.1.14.25.22.42.22.1 0 .18-.02.27-.08l3.85-2.4 1.06.87c.1.04.2.1.32.1s.23-.06.32-.1l1.06-.9 3.86 2.4c.08.06.17.1.26.1.17 0 .33-.1.42-.25.15-.24.08-.55-.15-.7l-3.57-2.22 3.62-2.96c.2-.2.24-.5.07-.72z" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Sharingbutton Reddit -->
                <a class="resp-sharing-button__link"
                    href="https://reddit.com/submit/?url=http%3A%2F%2Fsharingbuttons.io&amp;resubmit=true&amp;title=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking."
                    target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--reddit resp-sharing-button--small">
                        <div aria-hidden="true"
                            class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <circle cx="9.391" cy="13.392" r=".978" />
                                <path
                                    d="M14.057 15.814c-1.14.66-2.987.655-4.122-.004-.238-.138-.545-.058-.684.182-.13.24-.05.545.19.685.72.417 1.63.646 2.568.646.93 0 1.84-.228 2.558-.642.24-.13.32-.44.185-.68-.14-.24-.445-.32-.683-.18zM5 12.086c0 .41.23.78.568.978.27-.662.735-1.264 1.353-1.774-.2-.207-.48-.334-.79-.334-.62 0-1.13.507-1.13 1.13z" />
                                <path
                                    d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0zm6.673 14.055c.01.104.022.208.022.314 0 2.61-3.004 4.73-6.695 4.73s-6.695-2.126-6.695-4.74c0-.105.013-.21.022-.313C4.537 13.73 4 12.97 4 12.08c0-1.173.956-2.13 2.13-2.13.63 0 1.218.29 1.618.757 1.04-.607 2.345-.99 3.77-1.063.057-.803.308-2.33 1.388-2.95.633-.366 1.417-.323 2.322.085.302-.81 1.076-1.397 1.99-1.397 1.174 0 2.13.96 2.13 2.13 0 1.177-.956 2.133-2.13 2.133-1.065 0-1.942-.79-2.098-1.81-.734-.4-1.315-.506-1.716-.276-.6.346-.818 1.395-.88 2.087 1.407.08 2.697.46 3.728 1.065.4-.468.987-.756 1.617-.756 1.17 0 2.13.953 2.13 2.13 0 .89-.54 1.65-1.33 1.97z" />
                                <circle cx="14.609" cy="13.391" r=".978" />
                                <path
                                    d="M17.87 10.956c-.302 0-.583.128-.79.334.616.51 1.082 1.112 1.352 1.774.34-.197.568-.566.568-.978 0-.623-.507-1.13-1.13-1.13z" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Sharingbutton WhatsApp -->
                <a class="resp-sharing-button__link"
                    href="whatsapp://send?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.%20http%3A%2F%2Fsharingbuttons.io"
                    target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small">
                        <div aria-hidden="true"
                            class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24">
                                <path
                                    d="m12 0c-6.6 0-12 5.4-12 12s5.4 12 12 12 12-5.4 12-12-5.4-12-12-12zm0 3.8c2.2 0 4.2 0.9 5.7 2.4 1.6 1.5 2.4 3.6 2.5 5.7 0 4.5-3.6 8.1-8.1 8.1-1.4 0-2.7-0.4-3.9-1l-4.4 1.1 1.2-4.2c-0.8-1.2-1.1-2.6-1.1-4 0-4.5 3.6-8.1 8.1-8.1zm0.1 1.5c-3.7 0-6.7 3-6.7 6.7 0 1.3 0.3 2.5 1 3.6l0.1 0.3-0.7 2.4 2.5-0.7 0.3 0.099c1 0.7 2.2 1 3.4 1 3.7 0 6.8-3 6.9-6.6 0-1.8-0.7-3.5-2-4.8s-3-2-4.8-2zm-3 2.9h0.4c0.2 0 0.4-0.099 0.5 0.3s0.5 1.5 0.6 1.7 0.1 0.2 0 0.3-0.1 0.2-0.2 0.3l-0.3 0.3c-0.1 0.1-0.2 0.2-0.1 0.4 0.2 0.2 0.6 0.9 1.2 1.4 0.7 0.7 1.4 0.9 1.6 1 0.2 0 0.3 0.001 0.4-0.099s0.5-0.6 0.6-0.8c0.2-0.2 0.3-0.2 0.5-0.1l1.4 0.7c0.2 0.1 0.3 0.2 0.5 0.3 0 0.1 0.1 0.5-0.099 1s-1 0.9-1.4 1c-0.3 0-0.8 0.001-1.3-0.099-0.3-0.1-0.7-0.2-1.2-0.4-2.1-0.9-3.4-3-3.5-3.1s-0.8-1.1-0.8-2.1c0-1 0.5-1.5 0.7-1.7s0.4-0.3 0.5-0.3z" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Sharingbutton Telegram -->
                <a class="resp-sharing-button__link"
                    href="https://telegram.me/share/url?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io"
                    target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--small">
                        <div aria-hidden="true"
                            class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 23.5c6.35 0 11.5-5.15 11.5-11.5S18.35.5 12 .5.5 5.65.5 12 5.65 23.5 12 23.5zM2.505 11.053c-.31.118-.505.738-.505.738s.203.62.513.737l3.636 1.355 1.417 4.557a.787.787 0 0 0 1.25.375l2.115-1.72a.29.29 0 0 1 .353-.01L15.1 19.85a.786.786 0 0 0 .746.095.786.786 0 0 0 .487-.573l2.793-13.426a.787.787 0 0 0-1.054-.893l-15.568 6z"
                                    fill-rule="evenodd" /></svg>
                        </div>
                    </div>
                </a>

                <hr class="mb-5">


                @if ($post->featuredImage != null)
                <img class="mb-5" src="{{url('uploads/'.$post->featuredImage)}}" alt="" style="width: 100%">
                @endif

                <p>{{$post->headline}}</p>
                {!! $post->content !!}

                <p>Tags: {{$post->tags}}</p>


                @if (Auth::check())
                <div class="mt-5">
                    <form action="{{route('comment.store')}}" method="POST">
                        @csrf
                        <h1>Comment</h1>
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Uh Oh, Something wrong...</h4>
                            <p>Aww, there's error present while adding your comment. Check Again the error message.</p>
                            <hr>

                            <ol>
                                @foreach ($errors->all() as $error)
                                <li>
                                    <p class="mb-0">{{ $error }}</p>
                                </li>
                                @endforeach
                            </ol>

                        </div>

                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <img class="mx-auto d-block img-fluid img-thumbnail"
                                            src="{{asset('image/profile.jpg')}}" width="100dp">
                                        <p class="text-center">{{Auth::user()->name}}</p>
                                    </th>
                                    <th scope="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Write your comment.</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                name="comment" rows="5"></textarea>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <input type="hidden" name="onPost" value="{{$post->id}}">
                                        <input type="hidden" name="fromUser" value="{{Auth::user()->id}}">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                </div>

                <div class="mb-5">
                    @foreach ($comments->sortByDesc('created_at') as $comment)
                    <div class="mt-5">
                        <div class="row">
                            <div class="card w-100">
                                <div class="card-header">
                                    <span>
                                        <img class="img-fluid img-thumbnail" src="{{asset('image/profile.jpg')}}"
                                            width="50dp">
                                    </span>
                                    <span class="ml-3 h-1">
                                        {{\App\User::select('name')->where('id',
                                            $comment->fromUser)->first()->name}}
                                    </span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$comment->comment}}</h5>
                                    <p class="card-text">
                                        {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @else
                <div class="mt-5">
                    <h2>Log in untuk memberikan komentar.</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <img class="mx-auto d-block img-fluid img-thumbnail"
                                        src="{{asset('image/profile.jpg')}}" width="100dp">
                                    <p class="text-center">NamaMu</p>
                                </th>
                                <th scope="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Write your comment.</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                                            rows="5" disabled></textarea>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <input type="hidden" name="onPost" value="{{$post->id}}" disabled>
                                    <input type="hidden" name="fromUser" value="NULL" disabled>
                                    <button type="submit" class="btn btn-primary float-right" disabled>Submit</button>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="mb-5">
                    @foreach ($comments->sortByDesc('created_at') as $comment)
                    <div class="mt-5">
                        <div class="row">
                            <div class="card w-100">
                                <div class="card-header">
                                    <span>
                                        <img class="img-fluid img-thumbnail" src="{{asset('image/profile.jpg')}}"
                                            width="50dp">
                                    </span>
                                    <span class="ml-3 h-1">
                                        {{\App\User::select('name')->where('id',
                                        $comment->fromUser)->first()->name}}
                                    </span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$comment->comment}}</h5>
                                    <p class="card-text">
                                        {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-3" style="width: 100%">
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
        </div>
    </div>

    <div class="footer-clean">
        <footer>
            <div class="text-center">
                <p>Powered by <b>Ketiq</b></p>
                <div class="row justify-content-center">
                    <p class="copyright">Andika © 2019</p>
                </div>
            </div>
        </footer>
    </div>

</body>
@foreach ($comments as $comment)
<script>
    $('#myModal{{$comment->id}}').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var comment = button.data('comment')
        var modal = $(this)
        modal.find('.modal-body textarea').val(comment)
    })

</script>
@endforeach

</html>
