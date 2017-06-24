@extends('layouts.default')

@section('content')
<div class="container main-content">
    <div class="row first-row">
        <div class="col s12 m6 l6 push-s3">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="form-horizontal col s12 m12 l12" role="form" method="POST" action="{{ route('login') }}">
                            <h3 class="title">Sign in</h3>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="row">
                        <div class="form-group">
                            <div class="input-field col s12 m12 l12">
                                <div class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember">
                                    <label for="remember">Remember me</label>
                                </div>
                            </div>
                        </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="input-field col s12 m12 l12">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
