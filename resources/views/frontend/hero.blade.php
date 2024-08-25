<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Responsive Hero Section</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Base Styles */
        .hero-section {
            background: url('/assets/images/banner.jpg') no-repeat center center;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 0 20px; /* Add padding to avoid content touching edges on small screens */
        }

        .hero-content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            height: 100%;
        }

        .text-container {
            flex: 1;
            color: white;
            text-align: left;
        }

        .text-container h1 {
            font-size: 40px;
            margin: 20px 0;
            font-weight: bold;
        }

        .text-container p {
            font-size: 18px;
            color: #484343;
        }

        .button-container {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            margin: 0 10px;
            transition: background-color 0.3s;
        }

        .btn.primary {
            background-color: #1891a9;
            color: white;
        }

        .btn.primary:hover {
            background-color: #126f9d;
        }

        .btn.secondary {
            background-color: transparent;
            border: 2px solid #007bff;
            color: #007bff;
        }

        .btn.secondary:hover {
            background-color: #007bff;
            color: white;
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            max-width: 80%;
            height: auto;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
            }

            .text-container {
                margin-bottom: 20px;
            }

            .hero-section {
                padding: 0 10px;
            }

            .text-container h1 {
                font-size: 30px;
            }

            .text-container p {
                font-size: 16px;
            }

            .image-container img {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .text-container h1 {
                font-size: 24px;
            }

            .text-container p {
                font-size: 14px;
            }

            .btn {
                padding: 10px 20px;
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>
    <div class="hero-section">
        <div class="hero-content">
            <div class="text-container">
                <h1>WELCOME TO Non Stop Earning - Learning Platform</h1>
                <p>It’s a Bangladeshi trusted online platform. You will need a good smartphone and a good internet connection to work here. It is a very easy process, and you can learn this process in your own mother tongue. Here you make your career smoothly.</p>
                <div class="button-container">
                    {{-- if logged in go to course route else go to login route --}}
                    <a href="{{ route('login') }}" class="btn primary">Login</a>
                    <a href="{{ route('login') }}" class="btn secondary">Discover More</a>
                </div>
            </div>
            <div class="image-container">
                <img src="/assets/images/logo/bner.png" alt="Large Image"/>
            </div>
        </div>
    </div>
</body>

</html>
