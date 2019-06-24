@extends('layouts.admin')

@section('title')
Verify Membership &mdash; Blog
@endsection

@section('memberActive')
active
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">

            <h1>Membership Verification</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{action('PostController@index')}}">Post</a>
                </div>
                <div class="breadcrumb-item">Verify</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Verify Step</h2>
            <p class="section-lead">
                Please complete these steps to verify your account.
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

            <form action="{{ action('MembershipController@verify', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-camera"></i>
                        </div>
                        <div class="activity-detail">
                            <div class="mb-2">
                                <span class="text-job text-primary">STEP 1</span>
                            </div>
                            <p>Upload a Profile Picture</p>
                            <small>Best at 397x397</small>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="userImage" id="image-upload" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="activity-detail">
                            <div class="mb-2">
                                <span class="text-job text-primary">STEP 2</span>
                            </div>
                            <p>Tell us a bit about you</p>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="about" id="about" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="activity-detail">
                            <div class="mb-2">
                                <span class="text-job text-primary">STEP 3</span>
                            </div>
                            <p>Accept our Terms & Conditions</p>
                            <div class="form-group">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        required>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">I understand that Ketiq is still in
                                        Beta</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        required>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">I will NOT reupload news from other
                                        source</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        required>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">I agree with terms and conditions</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Verify</button>
            </form>

        </div>
    </section>
</div>
@endsection
