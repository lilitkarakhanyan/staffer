@extends('auth.layout')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">{{ config('app.name') }}</h1>

            </div>
            <h3>Welcome to {{ config('app.name') }}</h3>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="{{ route('login.account') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                           autofocus placeholder="Email">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required
                           placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a class="btn btn-link" href="{{ route('password.reset') }}">
                    <small>Forgot password?</small>
                </a>
                <p class="text-muted text-center">
                    <small>Do not have an account?</small>
                </p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('create.account') }}">Create an account</a>
            </form>
            <p class="m-t">
                <small>Staffer app &copy; {{ \Carbon\Carbon::now()->year }}</small>
            </p>
        </div>
    </div>
@endsection
