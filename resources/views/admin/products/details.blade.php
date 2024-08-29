@include('admin.partials.header')

<br><br>

<div class="container-fluid">
    <div class="row" style="overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('admin.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10 p-5" style="overflow-y: auto;">
            <div class="container bg-white p-5 shadow-sm rounded">
                <h2 class="mb-4">Product Details</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <!-- Product Image -->
                        @if ($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/default-product.png') }}" class="img-fluid" alt="Default Image">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <!-- Product Details -->
                        <h3>{{ $product->name }}</h3>
                        <p><strong>Price:</strong> ${{ number_format($product->old_price, 2) }}</p>
                        <p><strong>Offer Price:</strong> ${{ number_format($product->price, 2) }}</p>
                        <p><strong>Commission:</strong> ${{ number_format($product->commission, 2) }}</p>
                        <p><strong>Description:</strong></p>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.products') }}" class="btn btn-secondary">Back to Products</a>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
