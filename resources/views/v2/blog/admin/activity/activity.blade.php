@extends('layouts.main')

@section('title')
Activity &mdash; Blog
@endsection

@section('activityActive')
active
@endsection

@section('content')
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
                                <p>{{App\User::where('id', $post->uploadedBy)->first()->name}} Have created a post named
                                    "<a href="{{route('admin.show', $post->id)}}">{{$post->title}}</a>".</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
