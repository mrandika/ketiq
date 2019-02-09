<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <title>Blog</title>
</head>
@if (Auth::check())

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{asset('image/profile.jpg')}}" class="rounded-circle mx-auto d-block" alt="Cinque Terre"
                    width="50%">
                <h3 class="text-center">{{ Auth::user()->name }}</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Navigation</p>
                <li class="active">
                    <a>
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-columns"></i>
                        <span>Posts</span>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{url('posts/create')}}">
                                <i class="fas fa-plus"></i>
                                <span>Create New Post</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-database"></i>
                                <span>All Post</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-tasks"></i>
                                <span>Manage Post</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-cogs"></i>
                        <span>Configuration</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            </ul>
        </nav>

        <div id="content">
            <div id="content" class="p-5">

                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>

                        <a href="{{url('posts/create')}}" class="btn btn-primary">Add New <i class="fas fa-plus"></i></a>
                    </div>
                </nav>
                @if (\Session::has('success'))
                <div class="alert alert-success mt-2 mb-2">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                @endif

                <div class="container mt-4">
                    <div class="card-deck text-center">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Your Posts</div>
                            <div class="card-body text-secondary">
                                <h1 class="card-title">{{\App\Post::count()}}</h1>
                                <p class="card-text">Published.</p>
                            </div>
                        </div>
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Your Contributors</div>
                            <div class="card-body text-secondary">
                                <h1 class="card-title">{{\App\User::count()}}</h1>
                                <p class="card-text">User.</p>
                            </div>
                        </div>
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">All Comments</div>
                            <div class="card-body text-secondary">
                                <h1 class="card-title">0</h1>
                                <p class="card-text">Commented.</p>
                            </div>
                        </div>
                    </div>

                    <h1>Your Posts.</h1>
                    <p>Click on the Title to Preview the Posts.</p>
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created By</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($posts->sortByDesc('created_at') as $post)
                            <tr>
                                <td>{{$post['id']}}</td>
                                <td>
                                    <a href="{{action('PostController@show', $post['id'])}}">{{$post['title']}}</a>
                                </td>
                                <td>{{$post['uploadedBy']}}, at {{ $post['created_at'] }}</td>

                                <td><a href="{{action('PostController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{action('PostController@destroy', $post['id'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                    crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
                    crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

                <script>
                    $(document).ready(function () {

                        $('#sidebarCollapse').on('click', function () {
                            $('#sidebar').toggleClass('active');
                            $('.collapse.in').toggleClass('in');
                            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                        });

                    });
                </script>
</body>
@endif

</html>