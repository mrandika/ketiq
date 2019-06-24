@extends('layouts.homepage')

@section('title')
{{ $post->title }} &mdash; Andika Blog
@endsection

@section('css')

@endsection

@php
$prev = \App\Post::where('id', $post->id - 1)->first();
$next = \App\Post::where('id', $post->id + 1)->first();
@endphp

@section('categoryCurrent')
current
@endsection

@section('content')
<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">
        <div class="entry__media col-full">
            <div class="entry__post-thumb">
                @if ($post->hasFeatured == 1)
                <img width="100%" src="{{ url('uploads/posts/'.$post->featuredImage) }}"
                    sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                @endif

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

            <div class="entry__author">
                <img src="{{ url('uploads/users/'.\App\User::select('photo')->where('id', $post->uploadedBy)->first()->photo) }}"
                    alt="">

                <div class="entry__author-about">
                    <h5 class="entry__author-name">
                        <span>Posted by</span>
                        <a href="#0">{{ \App\User::select('name')->where('id', $post->uploadedBy)->first()->name }}</a>
                    </h5>

                    <div class="entry__author-desc">
                        <p>
                            {{ \App\User::select('about')->where('id', $post->uploadedBy)->first()->about }}
                        </p>
                    </div>
                </div>
            </div>
        </div> <!-- s-entry__main -->


    </article> <!-- end entry/article -->


    <div class="s-content__entry-nav">
        <div class="row s-content__nav">
            <div class="col-six s-content__prev">
                <a href="{{ url('blog/posts', $post->id - 1) }}" rel="prev">
                    <span>Previous Post</span>
                    @if ($prev != null)
                    {{ \App\Post::where('id', $post->id - 1)->first()->title }}
                    @endif
                </a>
            </div>
            <div class="col-six s-content__next">
                <a href="{{ url('blog/posts', $post->id + 1) }}" rel="next">
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
                <h3 id="commentCount" data-count="{{ $comments->count() }}" class="h2">{{ $comments->count() }} Comments
                </h3>
                @endif

                @if (Auth::user() != null)
                <!-- START commentlist -->
                @foreach ($comments as $comment)
                <ol class="commentlist">
                    <li class="depth-1 comment" id="commentId_{{ $comment->id }}">
                        <div class="comment__avatar">
                            <img class="avatar"
                                src="{{ url('uploads/users/'.\App\User::select('photo')->where('id', $comment->fromUser)->first()->photo) }}"
                                alt="" width="50" height="50">
                        </div>
                        <div class="comment__content">
                            <div class="comment__info">
                                <div class="comment__author">
                                    {{ \App\User::select('name')->where('id', $comment->fromUser)->first()->name }}</div>
                                <div class="comment__meta">
                                    <div class="comment__time">
                                        {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</div>
                                    @if ($comment->fromUser == Auth::user()->id)
                                    <div><small><a href="javascript:void(0)" id="removeComment_{{ $comment->id }}"
                                                data-id="{{ $comment->id }}" class="fas fa-trash"
                                                style="color:red"></a></small></div>
                                    @endif
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
                @endif

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

                @if (Auth::user() != null)
                <form action="{{route('comment.store')}}" method="POST">
                    @csrf
                    <fieldset>

                        <div class="form-field">
                            <input name="cName" id="cName" class="full-width" placeholder="Your Name*" type="text"
                                value="{{ Auth::user()->name }}" disabled>
                        </div>

                        <div class="message form-field">
                            <textarea name="comment" class="full-width" placeholder="Your Message*"
                                required="required"></textarea>
                        </div>

                        <input type="hidden" name="onPost" value="{{$post->id}}">
                        <input type="hidden" name="fromUser" value="{{ Auth::user()->id }}">

                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                            value="Add Comment" type="submit">

                    </fieldset>
                </form> <!-- end form -->
                @endif

            </div>
            <!-- END respond-->

        </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->

</section>
@endsection

@section('scripts')
@if (Auth::user() != null)
@foreach ($comments as $comment)
@if ($comment->fromUser == Auth::user()->id)
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#removeComment_{{ $comment->id }}').on('click', function () {
            var commentId = $(this).data("id");
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this comment",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((confirm) => {
                    if (confirm) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('blog/admin/panel/comment')}}" + '/' + commentId,
                            success: function (data) {
                                $("#commentId_" + commentId).remove();
                                var count = $('#commentCount').data("count");
                                var now = Number(count) - 1;
                                if (now == 0) {
                                    $('#commentCount').html("No Comments")
                                } else {
                                    $('#commentCount').html(now + " Comments")
                                }
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
@endif
@endforeach
@endif
@endsection
