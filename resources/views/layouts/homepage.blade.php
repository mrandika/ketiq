<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Andika Blog is One-Stop Information">
    <meta name="author" content="Andika">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('css/homepage/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/homepage/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/homepage/main.css')}}">

    @yield('css')

    <!-- script
    ================================================== -->
    <script src="{{asset('js/homepage/modernizr.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header header">

        <div class="header__logo">
            <a class="logo" href="index.html">
                <div>Andika Blog</div>
                <div class="bg-black"><small>Beta</small></div>
            </a>
        </div> <!-- end header__logo -->

        {{-- TODO: I dont wanna be you, anymore... --}}
        <a class="header__search-trigger" href="#0"></a>
        <div class="header__search">

            <form role="search" method="post" class="header__search-form"
                action="{{ action('PostController@search') }}">
                @csrf
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="keyword"
                        title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div> <!-- end header__search -->

        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <li class="@yield('homeCurrent')"><a href="{{ url('blog') }}" title="">Home</a></li>
                <li class="has-children @yield('categoryCurrent')">
                    <a href="#0" title="">Categories</a>
                    <ul class="sub-menu">
                        @foreach ($categories as $category)
                        <li><a href="{{ url('blog/filter/categories', $category->id) }}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                <li><a href="{{ url('blog/admin') }}" title="">{{ Auth::user()->name }}</a></li>
            </ul> <!-- end header__nav -->

            @endguest

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

    </header> <!-- s-header -->

    <!-- featured 
    ================================================== -->
    @yield('featured')

    <!-- s-content
    ================================================== -->
    @php
    $mainPosts = \App\Post::get();
    @endphp
    @yield('content')


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    @foreach ($mainPosts->where('hasFeatured', 1)->slice(0, 6)->sortByDesc('likes') as $post)
                    <article class="col-block popular__post">
                        <a href="{{ action('PostController@show', $post->id) }}" class="popular__thumb">
                            <img src="{{ url('uploads/posts/'.$post->featuredImage) }}" alt="">
                        </a>
                        <h5>{{ $post->title }}</h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a
                                    href="#{{ url('blog/filter/users', $post->uploadedBy) }}">{{ \App\User::select('name')->where('id', $post->uploadedBy)->first()->name }}</a></span>
                            <span class="popular__date"><span>on</span> <time
                                    datetime="{{ \Carbon\Carbon::parse($post->created_at)->format('Y-F-d') }}">{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</time></span>
                        </section>
                    </article>
                    @endforeach
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>

                        <ul class="linklist">

                            @foreach ($categories->slice(0, 5) as $category)
                            <li><a href="{{url('blog/filter/categories', $category->id)}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div> <!-- end categories -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">

                <div class="col-six tab-full s-footer__about">

                    <h4>About Andika Blog</h4>

                    <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut
                        occaecati placeat at.
                        Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia
                        consequatur.
                        Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga
                        et enim exercitationem ipsam. Culpa error
                        temporibus magnam est voluptatem.</p>

                </div> <!-- end s-footer__about -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">

                <div class="col-six">
                    <ul class="footer-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-six">
                    <div class="s-footer__copyright">
                        <span>
                            </script> All rights reserved | Proudly Powered with <i class="fa fa-heart"
                                aria-hidden="true"></i> by <a href="https://github.com/mrandika.ketiq"
                                target="_blank">Ketiq</a>
                            {{-- <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> --}}
                        </span>
                    </div>
                </div>

            </div>
        </div> <!-- end s-footer__bottom -->

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/homepage/plugins.js')}}"></script>
    <script src="{{asset('js/homepage/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{asset('js/dashboard/page/modules-sweetalert.js')}}"></script>

    @yield('scripts')

</body>

</html>
