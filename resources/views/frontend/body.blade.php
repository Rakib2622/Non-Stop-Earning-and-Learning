<div class="container mt-4">
    <h2 class="text-center mb-4">Latest Products</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4"> <!-- Updated to col-md-3 for 4 products per row -->
                <a href="{{ route('home.product.details', $product->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm" style="background-color: #f8f9fa;">
                        <div class="d-flex justify-content-center align-items-center position-relative" style="height: 250px;"> <!-- Increased image height -->
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}" style="object-fit: cover; height: 100%; width: 100%;">
                            <div class="badge-new position-absolute top-0 start-0 bg-light text-dark p-2 rounded-circle">New</div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">
                                <s>BDT {{ $product->old_price }}</s>
                                <strong class="text-danger">BDT {{ $product->price }}</strong>
                            </p>
                            <a href="{{ route('home.product.details', $product->id) }}" class="btn btn-gradient">Order Now</a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>


<!-- Footer -->


<style>
    .badge-new {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: bold;
        color: black;
    }
    .card {
        border: none;
        background-color: #f8f9fa; /* Light gray background */
    }
    .card-title {
        font-size: 1rem;
        font-weight: bold;
    }
    .card-text {
        font-size: 1rem;
    }
    .card-img-top {
        height: 250px; /* Increased height */
        width: 100%; /* Full width */
        object-fit: cover;
    }
    .btn-gradient {
        background: linear-gradient(45deg, #fc4a1a, #f7b733);
        border: none;
        color: white;
        padding: 10px 20px;
        text-transform: uppercase;
        border-radius: 30px;
        font-size: 1rem;
        transition: background 0.3s ease;
    }
    .btn-gradient:hover {
        background: linear-gradient(45deg, #f7b733, #fc4a1a);
    }
</style>