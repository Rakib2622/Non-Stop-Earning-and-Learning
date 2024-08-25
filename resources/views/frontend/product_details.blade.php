@include('frontend.header')

<br><br><br>

<div class="container mt-4 mb-4" style="height: 100vh;">
    <div class="row justify-content-center align-items-center" style="height: 100%;">
        <div class="col-md-6 col-lg-5 d-flex justify-content-center">
            <!-- Product Image -->
            <img src="{{ asset('images/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}" style="object-fit: cover; width: 90%; height: auto;">
        </div>
        <div class="col-md-6 col-lg-6 d-flex flex-column justify-content-center">
            <!-- Product Information -->
            <h2 class="mb-3">{{ $product->name }}</h2>
            <p class="text-muted">
                <s>BDT {{ $product->old_price }}</s>
                <strong class="text-danger">BDT {{ $product->price }}</strong>
            </p>
            <p>{{ $product->description }}</p>
            <div class="d-flex">
                <!-- Buy Now Button (GET request) -->
                <a href="{{ route('home.product.buyNow', $product->id) }}" class="btn btn-success">Buy Now</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('frontend.footer')
