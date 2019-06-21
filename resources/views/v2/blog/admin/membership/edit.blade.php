@extends('layouts.main')

@section('title')
Edit Membership &mdash; Blog
@endsection

@section('memberActive')
active
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{action('MembershipController@index')}}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{action('PostController@index')}}">User</a></div>
                <div class="breadcrumb-item">Edit User</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit User</h2>
            <p class="section-lead">
                On this page you can edit a user and fill in all fields.
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
            <form method="POST" action="{{action('MembershipController@update', $user->id)}}"
                enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Fill Users Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <p>Leave the password fields if not changed.</p>
                                        <input type="hidden" name="oldpassword" value="{{$user->password}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password
                                        Confirmation</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" name="confirmpassword">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="membership">
                                            @foreach ($memberships as $membership)
                                            <option value="{{$membership->id}}" @if($user->
                                                membership==$membership->id)
                                                selected
                                                @endif>{{$membership->member}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
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
