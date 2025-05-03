@extends('layouts.app')
@section('content')
<style>
    .login-background {
        background: linear-gradient(rgba(15,23,43, .7), rgba(15,23,43, .8)), url('{{ asset('images/somasteel.jpg') }}') center center/cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        width: 350px;
        max-width: 90%;
    }

    .login-header {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .inputBox {
        position: relative;
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        font-size: 1rem;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    .form-label {
        position: absolute;
        top: -8px;
        left: 12px;
        background: white;
        padding: 0 8px;
        font-size: 0.875rem;
        color: #555;
        transition: all 0.3s ease;
    }

    .form-control:focus + .form-label,
    .form-control:not(:placeholder-shown) + .form-label {
        top: -20px;
        left: 10px;
        font-size: 0.75rem;
        color: #007bff;
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #007bff;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .btn {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        background-color: #007bff;
        color: white;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .invalid-feedback {
        color: red;
        font-size: 0.875rem;
    }

    .location-link {
        display: block;
        margin-top: 10px;
        color: #007bff;
        text-align: center;
        text-decoration: none;
    }

    .location-link:hover {
        text-decoration: underline;
    }
</style>

<div class="login-background">
    <div class="login-card">
        <h2 class="login-header">{{ __('Login') }}</h2>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="inputBox">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label class="form-label">{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="inputBox">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label class="form-label">{{ __('Password') }}</label>
                    <input type="checkbox" hidden id="see-password">
                    <label for="see-password" id="see-password-label" class="fa fa-eye-slash toggle-password"></label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="location-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>

                <button type="submit" class="btn">{{ __('Login') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
