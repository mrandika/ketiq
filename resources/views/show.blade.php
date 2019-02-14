<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/blog.css')}}">
    <title>{{$post->title}}</title>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="{{url('blog')}}">Andika Blog</a><button class="navbar-toggler"
                data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <div class="article-clean mt-5 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro text-center">
                        @if ($post->featuredImage != null)
                        <img class="mb-5" src="{{url('uploads/'.$post->featuredImage)}}" alt="" style="width: 50%">
                        @endif
                        <h1>{{$post->title}}</h1>
                        <p><span class="by">by</span> <a href="#">{{$post->uploadedBy}}</a> | <span class="date">on
                                {{$post->created_at}} </span></p>
                        <p>Posted under <a href="{{url('blog/filter', $post->categoriesId)}}">{{$post->categoriesId}}</a></p>
                    </div>
                    <div class="text">
                        <p style="text-align:justify">{{$post->content}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
