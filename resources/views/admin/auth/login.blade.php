<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-form {
            background: #fff;
            padding: 2rem;
            border-radius: .5rem;
            box-shadow: 0 0 1rem rgba(0,0,0,0.1);
        }
        .btn-black {
            background-color: #000;
            color: #fff;
        }
        .btn-black:hover {
            background-color: #333;
        }
        .btn-back-home {
            color: #007bff;
        }
        .btn-back-home:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-form">
        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        <h2 class="text-center mb-4">WELCOME TO ADMIN LOGIN</h2>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group mt-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="form-group form-check mt-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-4">
                <button type="submit" class="btn btn-black">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn-back-home">Back to Home</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
