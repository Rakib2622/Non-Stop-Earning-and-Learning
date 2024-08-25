<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Confirmation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .form-control {
            font-size: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .text-center {
            text-align: center;
        }
        .text-gray-600 {
            color: #6c757d;
        }
        .mt-4 {
            margin-top: 1.5rem;
        }
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        .w-full {
            width: 100%;
        }
        .block {
            display: block;
        }
        .flex {
            display: flex;
        }
        .justify-end {
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card w-50">
            <div class="mb-4 text-center">
                <h2>Password Confirmation</h2>
                <p class="text-gray-600">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div>
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                    @if ($errors->has('password'))
                        <div class="mt-2 text-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
