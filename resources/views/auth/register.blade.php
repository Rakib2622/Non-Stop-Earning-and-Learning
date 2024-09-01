<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(196, 219, 224);
        }
        .card {
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-black {
            background: linear-gradient(45deg, red, skyblue);
            color: white;
            border: none;
        }
        .btn-black:hover {
            background-color: #333;
        }
    </style>
</head>
<body class="bg-light">

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="w-100" style="max-width: 600px;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <h2>Registration Form</h2>
                <p>Provide your necessary information here.</p>
            </div>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
             @endif
             @if (session('success'))
            <div class="alert alert-info">
                {{ session('success') }}
            </div>
             @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}<span class="text-danger">*</span></label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="language">{{ __('Choose your language') }}<span class="text-danger">*</span></label>
                        <select id="language" class="form-control" name="language" required>
                            <option value="" disabled selected>Select Language</option>
                            <option value="English">{{ __('English') }}</option>
                            <option value="Bangla">{{ __('Bangla') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country">{{ __('Choose your country') }}<span class="text-danger">*</span></label>
                        <select id="country" class="form-control" name="country" required>
                            <option value="" disabled selected>Select Country</option>
                            <option value="Bangladesh">{{ __('Bangladesh') }}</option>
                            <option value="India">{{ __('India') }}</option>
                            <option value="Saudi Arabia">{{ __('Saudi Arabia') }}</option>
                            <option value="Malaysia">{{ __('Malaysia') }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="whatsapp">{{ __('Enter WhatsApp No.') }}<span class="text-danger">*</span></label>
                        <input id="whatsapp" class="form-control" type="text" name="whatsapp" value="{{ old('whatsapp') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{ __('Enter Phone Number') }}</label>
                        <input id="phone" class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Enter Email') }}<span class="text-danger">*</span></label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="reference">{{ __('Enter Reference') }}<span class="text-danger"></span></label>
                        <input id="reference" class="form-control" type="text" name="reference"  value="{{ old('reference', $referral) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}<span class="text-danger">*</span></label>
                    <input id="password" class="form-control" type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                </div>

                <div class="form-group form-check">
                    <input id="terms" type="checkbox" class="form-check-input" name="terms" required>
                    <label for="terms" class="form-check-label">
                        {{ __('By clicking Register, you agree to Non Stop Earning - Learning Platform’s terms & conditions, Privacy Policy and Cookie Policy') }}<span class="text-danger">*</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-black btn-block mt-4">
                    {{ __('Sign Up') }}
                </button>
            </form>
            <div class="mt-4 text-center">
                <span>{{ __('Already have an account?') }}</span>
                <a href="{{ route('login') }}" class="text-primary">{{ __('Login here') }}</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
