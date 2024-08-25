@include('frontend.after_login.partials.header')

<div class="container-fluid">
    <div class="row mt-4">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10">
            <div class="container">
                <br><br><br><br><br><br>
                <div class="row">
                    <!-- Product Image Start -->
                    <div class="col-md-6">
                        <div class="product-image">
                            <img src="{{ asset('images/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}" style="max-height: 500px; width: 100%; object-fit: cover;">
                        </div>
                    </div>
                    <!-- Product Image End -->

                    <!-- Product Details Start -->
                    <div class="col-md-6 align-content-center ">
                        <h1>{{ $product->name }}</h1>
                        <p class="text-muted">
                            <s>BDT {{ $product->old_price }}</s>
                            <strong class="text-danger" style="font-size: 1.5rem;">BDT {{ $product->price }}</strong>
                        </p>
                        <p class="text-muted">Commission: {{ $product->commission }} TK</p>
                        <p>{{ $product->description }}</p>

                        {{-- <div class="mt-4">
                            <form action="{{ route('user.product.order', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg">Buy Now</button>
                            </form>
                            <form action="{{ route('user.product.cart', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-lg">Add to Cart</button>
                            </form>
                        </div> --}}
                    </div>
                    <!-- Product Details End -->
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('frontend.after_login.partials.footer')

<style>
    .product-image img {
        border: 1px solid #ddd;
        padding: 10px;
        background-color: #f8f9fa;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
</style>
