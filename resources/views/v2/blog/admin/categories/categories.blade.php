<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Users &mdash; Blog</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('modules/jquery-selectric/selectric.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('css/dashboard/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');

    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{asset('image/profile.jpg')}}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="features-profile.html" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{action('PostController@index')}}">Blog</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{action('PostController@index')}}">B</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class=""><a class="nav-link" href="{{action('PostController@index')}}"><i
                                    class="fas fa-pen"></i>
                                <span>Post</span></a></li>
                        <li class="active"><a class="nav-link" href="{{action('CategorieController@index')}}"><i
                                    class="fas fa-bars"></i>
                                <span>Categories</span></a></li>
                        <li class=""><a class="nav-link" href="{{action('MediaController@index')}}"><i
                                    class="far fa-file-image"></i>
                                <span>Media Library</span></a></li>
                        @if (Auth::user()->email === "admin@blog.com")
                        <li class=""><a class="nav-link" href="{{action('MembershipController@index')}}"><i
                                    class="fas fa-users-cog"></i>
                                <span>User Configuration</span></a></li>
                        <li class=""><a class="nav-link" href="{{action('ActivityController@index')}}"><i
                                    class="fas fa-history"></i>
                                <span>History</span></a></li>
                        @endif
                    </ul>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Categories</h1>
                        <div class="section-header-button">
                            <a href="{{action('CategorieController@create')}}" class="btn btn-primary">New</a>
                        </div>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="#">Categories</a></div>
                            <div class="breadcrumb-item active">All Categories</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Categories</h2>
                        <p class="section-lead">
                            You can manage all categories, deleting and more.
                        </p>

                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">All <span
                                                        class="badge badge-white">{{\App\Categorie::count()}}</span></a>
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
                                        <h4>All Categories</h4>
                                    </div>

                                    <div class="clearfix mb-3"></div>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                            </tr>
                                            @foreach ($categories as $categorie)
                                            <tr>
                                                <td>{{$categorie->id}}</td>
                                                <td>{{$categorie->categorie}}
                                                    <div class="table-links">
                                                        <form
                                                            action="{{action('CategorieController@destroy', $categorie->id)}}"
                                                            method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <a href='#' class="text-danger"
                                                                onclick='this.parentNode.submit(); return false;'>Remove</a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval
                    Azhar</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('modules/jquery.min.js')}}"></script>
    <script src="{{asset('modules/popper.js')}}"></script>
    <script src="{{asset('modules/tooltip.js')}}"></script>
    <script src="{{asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('modules/moment.min.js')}}"></script>
    <script src="{{asset('js/dashboard/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('js/dashboard/stisla.js')}}"></script>
    <script src="{{asset('js/dashboard/page/modules-sweetalert.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('js/dashboard/scripts.js')}}"></script>
    <script src="{{asset('js/dashboard/custom.js')}}"></script>
</body>

</html>
