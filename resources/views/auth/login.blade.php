<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }
        .login-container {
            display: flex;
            height: 100vh;
        }
        .login-form {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-image {
            flex: 1;
            background: url('assets/images/login-banner.jpg') no-repeat center center;
            background-size: cover;
        }
        .form-control {
            font-size: 1.2rem;
            padding: 10px;
        }
        .btn-black {
            background-color: black;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
        }
        .btn-black:hover {
            background-color: #333;
        }
        .btn-back-home {
            background: linear-gradient(45deg, red, skyblue);
            color: white;
            font-size: 1.2rem;
            padding: 10px 20px;
            border: none;
            display: inline-block;
            margin-top: 25px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-back-home:hover {
            opacity: 0.8;
        }
        .forgot-password {
            color: black;
            font-size: 1.2rem;
        }
        .forgot-password:hover {
            color: #333;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-form">
        <div style="width: 100%; max-width: 500px;">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="text-center">WELCOME BACK</h2>
            <form method="POST" action="{{ route('login') }}">
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
                <div class="form-group mt-4">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-group form-check mt-4">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-black">
                        {{ __('Log in') }}
                    </button>
                </div>

                <div class="mt-4 text-center text-sm">
                    <span class="text-gray-600">Don’t have an account?</span>
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900">
                        {{ __('Register here') }}
                    </a>
                </div>
            </form>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn-back-home">Back to Home</a>
            </div>
        </div>
    </div>
    <div class="login-image"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
