@extends('layouts.homepage')

@section('title')
{{ $post->title }} &mdash; Andika Blog
@endsection

@php
$prev = \App\Post::where('id', $post->id - 1)->first();
$next = \App\Post::where('id', $post->id + 1)->first();
@endphp

@section('content')
<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">
        <div class="entry__media col-full">
            <div class="entry__post-thumb">
                <img src="{{ url('uploads/'.$post->featuredImage) }}" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
            </div>
        </div>
        <div class="entry__header col-full">
            <h1 class="entry__header-title display-1">
                {{ $post->title }}
            </h1>
            <ul class="entry__header-meta">
                <li class="date">{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</li>
                <li class="byline">
                    By
                    <a href="#0">{{ \App\User::select('name')->where('id', $post->uploadedBy)->first()->name }}</a>
                </li>
            </ul>
        </div>

        <div class="col-full entry__main">
            <p class="lead drop-cap">{!! $post->headline !!}</p>
            {!! $post->content !!}
        </div> <!-- s-entry__main -->

    </article> <!-- end entry/article -->


    <div class="s-content__entry-nav">
        <div class="row s-content__nav">
            <div class="col-six s-content__prev">
                <a href="{{ action('PostController@show', $post->id - 1) }}" rel="prev">
                    <span>Previous Post</span>
                    @if ($prev != null)
                    {{ \App\Post::where('id', $post->id - 1)->first()->title }}
                    @endif
                </a>
            </div>
            <div class="col-six s-content__next">
                <a href="{{ action('PostController@show', $post->id + 1) }}" rel="next">
                    <span>Next Post</span>
                    @if ($next != null)
                    {{ \App\Post::where('id', $post->id + 1)->first()->title }}
                    @endif
                </a>
            </div>
        </div>
    </div> <!-- end s-content__pagenav -->

    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">

                @if ($comments->count() === 0)
                <h3 class="h2">No Comments</h3>
                @else
                <h3 class="h2">{{ $comments->count() }} Comments</h3>
                @endif

                <!-- START commentlist -->
                @foreach ($comments as $comment)
                <ol class="commentlist">
                    <li class="depth-1 comment">
                        <div class="comment__avatar">
                            <img class="avatar" src="{{ asset('image/profile.jpg') }}" alt="" width="50" height="50">
                        </div>
                        <div class="comment__content">
                            <div class="comment__info">
                                <div class="comment__author">{{ \App\User::select('name')->where('id',
                                        $comment->fromUser)->first()->name }}</div>
                                <div class="comment__meta">
                                    <div class="comment__time">
                                        {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                            <div class="comment__text">
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    </li> <!-- end comment level 1 -->
                </ol>
                @endforeach
                <!-- END commentlist -->

            </div> <!-- end col-full -->
        </div> <!-- end comments -->

        <div class="row comment-respond">

            <!-- START respond -->
            <div id="respond" class="col-full">

                <h3 class="h2">Add Comment
                    @if (Auth::user() === null)
                    <span>Please Sign-in first.</span>
                    @endif
                </h3>

                <form action="{{route('comment.store')}}" method="POST">
                    @csrf
                    <fieldset>

                        <div class="form-field">
                            <input name="cName" id="cName" class="full-width" placeholder="Your Name*"
                                type="text" value="{{ Auth::user()->name }}" disabled>
                        </div>

                        <div class="message form-field">
                            <textarea name="comment" class="full-width" placeholder="Your Message*" required="required"></textarea>
                        </div>

                        <input type="hidden" name="onPost" value="{{$post->id}}">
                        <input type="hidden" name="fromUser" value="{{ Auth::user()->id }}">

                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                            value="Add Comment" type="submit">

                    </fieldset>
                </form> <!-- end form -->

            </div>
            <!-- END respond-->

        </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->

</section>
@endsection
