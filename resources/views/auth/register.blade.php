@extends('layouts.app')

@section('content')
<style>
    .register-background {
        background: linear-gradient(rgba(15,23,43, .7), rgba(15,23,43, .8)), url('{{ asset('images/somasteel.jpg') }}') center center/cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        width: 350px;
        max-width: 90%;
    }

    .register-header {
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
</style>

<div class="register-background">
    <div class="register-card">
        <h2 class="register-header">{{ __('Register') }}</h2>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="inputBox">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label class="form-label">{{ __('Name') }}</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="inputBox">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <label class="form-label">{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="inputBox">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label class="form-label">{{ __('Password') }}</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="inputBox">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <label class="form-label">{{ __('Confirm Password') }}</label>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
