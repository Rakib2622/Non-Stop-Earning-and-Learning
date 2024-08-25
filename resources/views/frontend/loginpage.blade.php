<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Options</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: white;
        }
        .login-container {
            display: flex;
            height: 100vh;
        }
        .options-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .option-button {
            width: 80%;
            margin-bottom: 20px;
            font-size: 1.5rem;
            padding: 15px;
            border: none;
            border-radius: 5px;
            color: white;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            display: block;
        }
        .option-button:hover {
            opacity: 0.9;
        }
        .btn-student {
            background-color: #3498db;
        }
        .btn-admin {
            background-color: #e74c3c;
        }
        .btn-subadmin {
            background-color: #f1c40f;
        }
        .login-image {
            flex: 1;
            background: url('assets/images/login-banner.jpg') no-repeat center center;
            background-size: cover;
        }
        .back-home-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2rem;
            color: black;
        }
        .back-home-icon:hover {
            color: #333;
        }
    </style>
</head>
<body>

<div class="login-container">
    <a href="{{ route('home') }}" class="back-home-icon">
        <i class="fa fa-home"></i>
    </a>
    <div class="options-container">
        <a href="{{ route('login') }}" class="option-button btn-student">Student Login</a>
        <a href="{{ route('admin.login') }}" class="option-button btn-admin">Admin Login</a>
        <a href="#" class="option-button btn-subadmin">Sub Admin Login</a>
    </div>
    <div class="login-image"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
