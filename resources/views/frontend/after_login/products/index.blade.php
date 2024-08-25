@include('frontend.after_login.partials.header')

<div class="container-fluid">
    <div class="row" style="overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10" style=" overflow-y: auto;">
            <div class="container mt-4">
                <h2 class="text-center mb-4 mt-9">Latest Products</h2>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 mb-4"> <!-- Increased card width -->
                            <a href="{{ route('user.product.details', $product->id) }}" class="text-decoration-none text-dark">
                                <div class="card h-100 shadow-sm" style="background-color: #f8f9fa;">
                                    <div class="d-flex justify-content-center align-items-center position-relative" style="height: 250px;">
                                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}" style="object-fit: cover; height: 100%; width: 100%;">
                                        <div class="badge-new position-absolute top-0 start-0 bg-light text-dark p-2 rounded-circle">P{{ $loop->index + 1 }}</div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text text-muted">
                                            <s>BDT {{ $product->old_price }}</s>
                                            <strong class="text-danger">BDT {{ $product->price }}</strong>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Commission: {{ $product->commission }} TK</span>
                                            <button class="btn btn-link p-0" style="font-size: 1.5rem; color: #000;">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                        {{-- <div class="mt-3">
                                            <form action="{{ route('user.product.order', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">Order Now</button>
                                            </form>
                                            <form action="{{ route('user.product.cart', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary btn-lg">Add to Cart</button>
                                            </form>
                                        </div> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

<!-- Footer -->
@include('frontend.after_login.partials.footer')

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
        background-color: #f8f9fa;
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-title {
        font-size: 1rem;
        font-weight: bold;
    }
    .card-text {
        font-size: 1rem;
    }
    .card-img-top {
        height: 250px;
        width: 100%;
      
