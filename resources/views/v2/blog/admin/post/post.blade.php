@extends('layouts.admin')

@section('title')
Posts &mdash; Blog
@endsection

@section('postActive')
active
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        @if (Auth::user()->email_verified_at == null)
        <div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Warning</div>
                Your account is not validated. You can't add a new post or editing post until your account
                is verified. <br><b><a href="{{ action('MembershipController@form') }}">Verify Now</a></b>
            </div>
        </div>
        @endif
        <div class="section-header">
            @if (Auth::user()->email_verified_at != null)
            <h1>Posts</h1>
            <div class="section-header-button">
                <a href="{{action('PostController@create')}}" class="btn btn-primary">Add New</a>
            </div>
            @endif
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item active">All Posts</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
                You can manage all posts, such as editing, deleting and more.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">All <span
                                            class="badge badge-white">{{\App\Post::where('uploadedBy', Auth::user()->id)->count()}}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">

                        @if (\Session::has('success'))
                        <div class="alert alert-success alert-has-icon">
                            <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Success</div>
                                {{ \Session::get('success') }}
                            </div>
                        </div>
                        @endif

                        <div class="card-header">
                            <h4>All Posts</h4>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($posts as $post)
                                <tr id="postId_{{$post->id}}">
                                    <td>{{$post->title}}
                                        <div class="table-links">

                                            <a href="{{action('PostController@show', $post->id)}}">View</a>
                                            <div class="bullet"></div>
                                            @if (Auth::user()->email_verified_at != null)
                                            <a href="{{action('PostController@edit', $post->id)}}">Edit</a>
                                            <div class="bullet"></div>
                                            <a id="deletePost" data-id="{{$post->id}}" href='javascript:void(0)'
                                                class="text-danger">Remove</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">{{\App\Category::where('id',
                                                    $post->categoriesId)->first()->title}}</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img alt="image" src="{{asset('image/profile.jpg')}}" class="rounded-circle"
                                                width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">
                                                {{ \App\User::select('name')->where('id', $post->uploadedBy)->first()->name }}
                                            </div>
                                        </a>
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($post->created_at)->format('d M Y')}}</td>
                                    <td>
                                        <div class="badge badge-primary">Published</div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#deletePost').on('click', function () {
            var postId = $(this).data("id");
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this blog post",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((confirm) => {
                    if (confirm) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('blog/admin')}}" + '/' + postId,
                            success: function (data) {
                                $("#postId_" + postId).remove();
                            },
                            error: function (data) {
                                alert("Error! Check log.")
                                console.log(data);
                            }
                        });
                    }
                });
        });
    });

</script>
@endsection
