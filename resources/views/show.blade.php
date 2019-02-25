<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/blog.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
                        <p>Posted under <a href="{{url('blog/filter', $post->categoriesId)}}">{{\App\Categorie::select('categorie')->where('id',
                                $post->categoriesId)->first()->categorie}}</a></p>
                    </div>
                    <div class="text">
                        <p style="text-align:justify">{{$post->content}}</p>
                    </div>
                </div>
                @if (Auth::check())
                <div class="mt-5 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <form action="{{url('blog/admin/comment')}}" method="POST">
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
                                        <img class="mx-auto d-block img-fluid img-thumbnail" src="{{asset('image/profile.jpg')}}"
                                            width="100dp">
                                        <p class="text-center">{{Auth::user()->name}}</p>
                                    </th>
                                    <th scope="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Write your comment.</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                                                rows="5"></textarea>
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
                <div class="container mb-5">
                    <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                        @foreach ($comments->sortByDesc('created_at') as $comment)
                        <div class="row mb-2">
                            <div class="card w-100">
                                <div class="card-header">
                                    <span>
                                        <img class="img-fluid img-thumbnail" src="{{asset('image/profile.jpg')}}" width="50dp">
                                    </span>
                                    <span class="ml-3 h-1">
                                        {{\App\User::select('name')->where('id', $comment->fromUser)->first()->name}}
                                    </span>
                                    @if ($comment->fromUser === Auth::user()->id)
                                    <span class="float-right mr-3">
                                        <form action="{{action('CommentController@destroy', $comment['id'])}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </span>
                                    <span class="float-right mr-3">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{$comment->id}}"
                                            data-comment="{{$comment->comment}}">
                                            Edit
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModal{{$comment->id}}">
                                            <form action="{{url('blog/admin/comment', $comment->id)}}" method="post">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Your Comment.</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                    name="editComment" rows="5"></textarea>
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>

                                                    </div>
                                            </form>
                                        </div>
                                </div>
                                </span>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$comment->comment}}</h5>
                                    <p class="card-text">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
                                        @if ($comment->hasEdited ===
                                        "YES")
                                        - Edited
                                        @endif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="container">
                    <div class="mt-5 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                        <h2>Log in untuk memberikan komentar.</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <img class="mx-auto d-block img-fluid img-thumbnail" src="{{asset('image/profile.jpg')}}"
                                            width="100dp">
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
                </div>
                <div class="container mb-5">
                    @foreach ($comments->sortByDesc('created_at') as $comment)
                    <div class="mt-5 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                        <div class="row">
                            <div class="card w-100">
                                <div class="card-header">
                                    <span>
                                        <img class="img-fluid img-thumbnail" src="{{asset('image/profile.jpg')}}" width="50dp">
                                    </span>
                                    <span class="ml-3 h-1">
                                        {{\App\User::select('name')->where('id',
                                        $comment->fromUser)->first()->name}}
                                    </span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$comment->comment}}</h5>
                                    <p class="card-text">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
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
