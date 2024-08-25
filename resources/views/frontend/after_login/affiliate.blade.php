@include('frontend.after_login.partials.header')

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
                <h2 class="text-center mb-4">Affiliate Orders</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Product Details</th>
                                <th scope="col">Commission</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 8; $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        <img src="assets/images/product-images/bags-p-img3-1.jpg" alt="Product Image" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <strong>Product Name {{ $i + 1 }}</strong><br>
                                        <span class="text-muted">BDT 800</span>
                                    </td>
                                    <td>BDT 60</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">Accept</button>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

<!-- Footer -->



<style>
    .table {
        margin-top: 20px;
        background-color: #f8f9fa;
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        font-size: 15px;
    }
    .table img {
        border-radius: 5px;
    }
    .btn-sm {
        font-size: 16px;
        padding: 5px 10px;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-success:hover, .btn-danger:hover {
        opacity: 0.8;
    }
</style>

@include('frontend.after_login.partials.footer')
