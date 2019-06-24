@extends('layouts.homepage')

@section('title')
@if ($posts->isNotEmpty())
Search Results &mdash; Andika
Blog
@else
Search Results &mdash; Andika Blog
@endif
@endsection

@php
$mainPosts = \App\Post::get();
@endphp

@section('featured')
<section class="s-featured">
    <div class="row">
        <div class="col-full">
            <div class="featured-slider featured" data-aos="zoom-in">
                @foreach ($mainPosts->slice(0, 3)->sortByDesc('created_at') as $post)

                <div class="featured__slide">
                    <div class="entry">
                        <div class="entry__background"
                            style="background-image:url('{{ url('uploads/posts/'.$post->featuredImage) }}');"></div>
                        <div class="entry__content">
                            <span class="entry__category"><a
                                    href="{{ url('blog/filter', $post->categoriesId) }}">{{ \App\Category::where('id', $post->categoriesId)->first()->title }}</a></span>
                            <h1><a href="{{ action('PostController@show', $post->id) }}" title="">{{ $post->title }}</a>
                            </h1>
                            <div class="entry__info">
                                <a href="{{ url('blog/filter/users', $post->uploadedBy) }}" class="entry__profile-pic">
                                    <img class="avatar"
                                        src="{{ url('uploads/users/'.\App\User::select('photo')->where('id', $post->uploadedBy)->first()->photo) }}"
                                        alt="">
                                </a>
                                <ul class="entry__meta">
                                    <li><a
                                            href="{{ url('blog/filter/users', $post->uploadedBy) }}">{{ \App\User::select('name')->where('id', $post->uploadedBy)->first()->name }}</a>
                                    </li>
                                    <li>{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->
                    </div> <!-- end entry -->
                </div> <!-- end featured__slide -->
                @endforeach

            </div> <!-- end featured -->
        </div> <!-- end col-full -->
    </div>
</section> <!-- end s-featured -->
@endsection

@section('content')
<section class="s-content">

    <div class="row entries-wrap wide">
        {{-- <h1>Showing results for categories `{{ \App\Category::select('title')->where('id', $posts[0]->categoriesId)->first()->title }}`
        </h1> --}}
        <div class="entries">

            @if ($posts->isNotEmpty())
            @foreach ($posts as $post)
            <article class="col-block">
                <div class="item-entry aos-init aos-animate" data-aos="zoom-in">
                    <div class="item-entry__thumb">
                        <a href="{{ action('PostController@show', $post->id) }}" class="item-entry__thumb-link">
                            @if ($post->hasFeatured == 1)
                            <img src="{{ url('uploads/posts/'.$post->featuredImage) }}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="item-entry__text">
                        <div class="item-entry__cat">
                            <a
                                href="{{ url('blog/filter', $post->categoriesId) }}">{{ \App\Category::where('id', $post->categoriesId)->first()->title }}</a>
                        </div>
                        <h1 class="item-entry__title"><a
                                href="{{ action('PostController@show', $post->id) }}">{{ $post->title }}</a></h1>
                        <div class="item-entry__date">
                            <a
                                href="single-standard.html">{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</a>
                        </div>
                    </div>
                </div> <!-- item-entry -->
            </article> <!-- end article -->
            @endforeach
            @else
            <article class="col-block">
                <h1>No results found for your query.</h1>
            </article> <!-- end article -->
            @endif

        </div> <!-- end entries -->
    </div> <!-- end entries-wrap -->

</section>
@endsection
