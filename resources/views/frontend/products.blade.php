<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    @include('frontend.header')

    <br><br><br>

    <!-- Product List -->
    @include('frontend.body')

    <div class="d-flex justify-content-center my-4">
        <a href="#" class="btn btn-info">View All Products</a>
    </div>
    

@include('frontend.footer')
</body>
</html>
