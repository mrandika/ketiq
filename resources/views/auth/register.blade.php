<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('/modules/bootstrap-social/bootstrap-social.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <i class="fas fa-pen fa-lg text-primary"></i>
                            <p class="mt-5">Ketiq</p>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{route('register')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" tabindex="1" required="" autofocus="">
                                        @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" tabindex="1" required="">
                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" tabindex="2" required="">
                                        @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('password')}}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password-confirm" class="control-label">Confirm Password</label>
                                        </div>
                                        <input id="password-confirm" type="password"
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation" tabindex="2" required="">
                                        @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('password_confirmation')}}
                                        </div>
                                        @endif
                                    </div>

                                    <input type="hidden" value="1" name="membership" required="required">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright © Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
