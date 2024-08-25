{{-- @include('frontend.after_login.partials.header')

<div class="container-fluid">
    <div class="row" style="height: 100vh; overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10" style="height: 100vh; overflow-y: auto;">
            <div class="container mt-4">
                <h2 class="text-center mb-4">Latest Products</h2>
                <div class="row">
                    @for ($i = 0; $i < 8; $i++)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100 shadow-sm" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-center align-items-center position-relative" style="height: 250px;">
                                    <img src="assets/images/product-images/bags-p-img3-1.jpg" class="card-img-top img-fluid" alt="Product Image" style="object-fit: cover; height: 100%; width: 100%;">
                                    <div class="badge-new position-absolute top-0 start-0 bg-light text-dark p-2 rounded-circle">P{{ $i + 1 }}</div>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Product Title {{ $i + 1 }}</h5>
                                    <p class="card-text text-muted">
                                        <s>BDT 1000</s>
                                        <strong class="text-danger">BDT 800</strong>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">Commission: 60 TK</span>
                                        <button class="btn btn-link p-0" style="font-size: 1.5rem; color: #000;">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
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
        object-fit: cover;
    }
    .btn-link {
        background: none;
        border: none;
        padding: 0;
        color: #000;
    }
    .btn-link:hover {
        color: #555;
    }
</style> --}}
