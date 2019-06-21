@extends('layouts.main')

@section('title')
Edit Post &mdash; Blog
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('modules/summernote/summernote-bs4.css')}}">
@endsection

@section('postActive')
active
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{action('PostController@index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit a Post</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Edit a Post</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit a Post</h2>
            <p class="section-lead">
                On this page you can edit a post and update in all fields.
            </p>
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <div class="alert alert-danger alert-has-icon">
                    <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Error</div>
                        <ol>
                            @foreach ($errors->all() as $error)
                            <li>
                                <p class="mb-0">{{ $error }}</p>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

            </div>

            @endif
            <form method="POST" action="{{action('PostController@update', $post->id)}}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write Your Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Headline</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="headline"
                                            value="{{$post->headline}}">
                                        <p>Tell us a bit about your post.</p>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="tags" value="{{$post->tags}}">
                                        <p>Divide your tags with comma (,)</p>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="categories">
                                            @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}" @if($post->
                                                categoriesId==$categorie->id) selected
                                                @endif>{{$categorie->categorie}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple" name="content">{{$post->content}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview" @if ($post->
                                            featuredImage != null)
                                            style="background-image:
                                            url('{{asset('uploads/'.$post->featuredImage)}}')">
                                            <label for="image-upload" id="image-label">Change File</label>
                                            @endif
                                            @if ($post->featuredImage == null)
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            @endif
                                            <input type="file" name="featuredImage" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                                <input type="text" value="{{ Auth::user()->id }}" name="author" hidden>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Edit Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="{{asset('modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{asset('modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="{{asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('js/dashboard/page/features-post-create.js')}}"></script>
@endsection
