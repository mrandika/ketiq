<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Activity &mdash; Blog</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('modules/summernote/summernote-bs4.css')}}">
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
                        </a>
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
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
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
                        <li class=""><a class="nav-link" href="{{action('CategorieController@index')}}"><i
                                    class="fas fa-bars"></i>
                                <span>Categories</span></a></li>
                        <li class=""><a class="nav-link" href="{{action('MediaController@index')}}"><i
                                    class="far fa-file-image"></i>
                                <span>Media Library</span></a></li>
                        @if (Auth::user()->email === "admin@blog.com")
                        <li class=""><a class="nav-link" href="{{action('MembershipController@index')}}"><i
                                    class="fas fa-users-cog"></i>
                                <span>User Configuration</span></a></li>
                        <li class="active"><a class="nav-link" href="{{action('ActivityController@index')}}"><i
                                    class="fas fa-history"></i>
                                <span>History</span></a></li>
                        @endif
                    </ul>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">

                        <h1>Blog Activity</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="{{action('ActivityController@index')}}">Activity</a>
                            </div>
                            <div class="breadcrumb-item">View Activity</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Blog Activity</h2>
                        <p class="section-lead">
                            On this page you can see recent comment and post in your blog.
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="section-title">Comment Activity</h2>
                                <p class="section-lead">
                                    Showing 10 recent comment.
                                </p>

                                <div class="activities">
                                    @foreach ($recentComment as $comment)
                                    <div class="activity">
                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                            <i class="fas fa-comment-alt"></i>
                                        </div>
                                        <div class="activity-detail">
                                            <div class="mb-2">
                                                <span
                                                    class="text-job text-primary">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                            </div>
                                            <p>{{$comment->fromUser}} Have commented on the post of "<a
                                                    href="#">{{$comment->onPost}}</a>".</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2 class="section-title">Post Activity</h2>
                                <p class="section-lead">
                                    Showing 10 recent post.
                                </p>

                                <div class="activities">
                                    @foreach ($recentPost as $post)
                                    <div class="activity">
                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                            <i class="fas fa-pen"></i>
                                        </div>
                                        <div class="activity-detail">
                                            <div class="mb-2">
                                                <span
                                                    class="text-job text-primary">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                                            </div>
                                            <p>{{$post->uploadedBy}} Have created a post named "<a
                                                    href="{{route('admin.show', $post->id)}}">{{$post->title}}</a>".</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
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
    <script src="{{asset('modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('js/dashboard/page/features-post-create.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('js/dashboard/scripts.js')}}"></script>
    <script src="{{asset('js/dashboard/custom.js')}}"></script>
</body>

</html>
