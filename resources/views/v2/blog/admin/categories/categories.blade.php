@extends('layouts.admin')

@section('title')
Categories &mdash; Blog
@endsection

@section('categorieActive')
active
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
            <div class="section-header-button">
                <a href="{{action('CategoryController@create')}}" class="btn btn-primary">New</a>
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
                                            class="badge badge-white">{{\App\Category::count()}}</span></a>
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
                                <tr id="categoriesId_{{$categorie->id}}">
                                    <td>{{$categorie->id}}</td>
                                    <td>{{$categorie->title}}
                                        <div class="table-links">
                                            <a href='javascript:void(0)' id="deleteCategories"
                                                data-id="{{$categorie->id}}" class="text-danger">Remove</a>
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
@endsection
