@extends('layouts.admin')

@section('title')
Media &mdash; Blog
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('modules/chocolat/dist/css/chocolat.css')}}">
@endsection

@section('mediaActive')
active
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Media Library</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{action('ActivityController@index')}}">Media</a>
                </div>
                <div class="breadcrumb-item">All</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Media Library</h2>
            <p class="section-lead">
                On this page you can see all media that have been posted in your blog.
            </p>

            <div class="gallery gallery-md">
                @foreach ($images as $image)
                <div class="gallery-item" data-image="{{url('uploads/'.$image->featuredImage)}}"
                    data-title="{{$image->title}}" href="{{url('uploads/'.$image->featuredImage)}}"
                    title="{{$image->title}}">
                </div>
                @endforeach
            </div>

        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="{{asset('modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
@endsection
