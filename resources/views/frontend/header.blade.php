<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/index.html   11 Nov 2019 12:16:10 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Non Stop Earning - NSE | Nonstopearning</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="/assets/images/favicon.png" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="/assets/css/plugins.css">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/responsive.css">
</head>
<body class="template-index belle template-index-belle">
<div id="pre-loader">
    <img src="/assets/images/loader.gif" alt="Loading..." />
</div>
<div class="pageWrapper">
	<!--Search Form Drawer-->
	<div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
<header style="background: linear-gradient(90deg, rgba(255, 223, 186, 0.8), rgba(135, 206, 250, 0.8)); padding: 10px 0; position: absolute; top: 0; width: 100%; z-index: 1000;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div style="font-size: 28px; font-weight: bold; color: #333;">
            <a href="{{ url('/') }}" style="text-decoration: none; color: #333;">NSE</a>
        </div>
        <nav style="flex: 1; display: flex; justify-content: center;">
            <ul style="list-style: none; display: flex; margin: 0; padding: 0;">
                <li style="margin: 0 15px;"><a href="{{ route('home') }}" style="text-decoration: none; color: #333; transition: color 0.3s;">Home</a></li>
                <li style="margin: 0 15px;"><a href="{{ route('products') }}" style="text-decoration: none; color: #333; transition: color 0.3s;">Product</a></li>
                <li style="margin: 0 15px;"><a href="{{ route('about') }}" style="text-decoration: none; color: #333; transition: color 0.3s;">About Us</a></li>
                <li style="margin: 0 15px;"><a href="{{ route('contact') }}" style="text-decoration: none; color: #333; transition: color 0.3s;">Contact</a></li>
            </ul>
        </nav>
        <a href="{{ route('loginpage') }}" class="btn" style="background-color: #38b9d9; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-left: 10px; transition: background-color 0.3s;">Sign In</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif   

</header>


