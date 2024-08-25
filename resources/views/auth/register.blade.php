<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(196, 219, 224);
            font-family: 'Arial', sans-serif;
        }
        .register-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 30px;
        }
        .register-form {
            width: 100%;
            max-width: 600px;
            background-color: #f7f7f7;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            font-size: 1rem;
            padding: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group .required {
            color: red;
        }
        .btn-black {
            background: linear-gradient(45deg, red, skyblue);
            color: white;
            font-size: 1.2rem;
            padding: 10px 20px;
            border: none;
            width: 100%;
        }
        .btn-black:hover {
            background-color: #333;
        }
        .text-link {
            color: rgb(46, 123, 174);
            font-size: 1rem;
        }
        .text-link:hover {
            color: #17a6d1;
        }
        .form-header {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .form-header h2 {
            margin-bottom: 10px;
        }
        .form-header p {
            margin: 0;
            color: #555;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="register-form">
        <div class="form-header">
            <br><br><br><br><br><br>
            <h2>Registration Form</h2>
            <p>Provide your necessary information here.</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group mt-4">
                <label for="name">{{ __('Name') }}<span class="required">*</span></label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="language">{{ __('Choose your language') }}<span class="required">*</span></label>
                    <select id="language" class="form-control" name="language" required>
                        <option value="" disabled selected>Select Language</option>
                        <option value="English">{{ __('English') }}</option>
                        <!--<option value="Spanish">{{ __('Spanish') }}</option>-->
                        <option value="Bangla">{{ __('Bangla') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="country">{{ __('Choose your country') }}<span class="required">*</span></label>
                    <select id="country" class="form-control" name="country" required>
                        <option value="" disabled selected>Select Country</option>
                        <option value="Bangladesh">{{ __('Bangladesh') }}</option>
                        <option value="India">{{ __('India') }}</option>
                        <option value="Saudi Arabia">{{ __('Saudi Arabia') }}</option>
                        <option value="Malaysia">{{ __('Malaysia') }}</option>
                        
                    </select>
                </div>
            </div>

            
            
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                <label for="whatsapp">{{ __('Enter WhatsApp No.') }}<span class="required">*</span></label>
                <input id="whatsapp" class="form-control" type="text" name="whatsapp" value="{{ old('whatsapp') }}" required>
            </div>
                <div class="form-group col-md-6">
                    <label for="phone">{{ __('Enter Phone Number') }}<span class="required">*</span></label>
                    <input id="phone" class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
             
            

            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="email">{{ __('Enter Email') }}<span class="required">*</span></label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="reference">{{ __('Enter Reference') }}<span class="required">*</span></label>
                    <input id="reference" class="form-control" type="text" name="reference" value="{{ request()->query('referral') ?? old('reference') }}">
                </div>
                
            </div>

            <div class="form-group mt-4">
                <label for="password">{{ __('Password') }}<span class="required">*</span></label>
                <input id="password" class="form-control" type="password" name="password" required>
            </div>

            <div class="form-group mt-4">
                <label for="password_confirmation">{{ __('Confirm Password') }}<span class="required">*</span></label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
            </div>

            <div class="form-group form-check mt-4">
                <input id="terms" type="checkbox" class="form-check-input" name="terms" required>
                <label for="terms" class="form-check-label">
                    {{ __('By clicking Register, you agree to Non Stop Earning - Learning Platform’s terms & conditions, Privacy Policy and Cookie Policy') }}<span class="required">*</span>
                </label>
            </div>

            <button type="submit" class="btn btn-black mt-4">
                {{ __('Sign Up') }}
            </button>
        </form>
        <div class="mt-4 text-center">
            <span>{{ __('Already have an account?') }}</span>
            <a href="{{ route('login') }}" class="text-link">{{ __('Login here') }}</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
