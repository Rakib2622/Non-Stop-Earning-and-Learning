@include('frontend.after_login.partials.header')

<div class="container-fluid">
    <div class="row" style="height: 100vh; overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10" style="height: 100vh; margin-top:80px;">
            <div class="container mt-4">
                <h2 class="text-center mb-4">Reference List (Inactive)</h2>
                <div class="text-center mb-3">
                    <span class="badge bg-warning text-dark p-2">Last 3 Month Outbound</span>
                </div>
                <div class="text-center mb-2">
                    <span class="text-info">Search by, date, month or userid</span>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Start Date" aria-label="Start Date">
                            <input type="text" class="form-control" placeholder="End Date" aria-label="End Date">
                            <input type="text" class="form-control" placeholder="User Id" aria-label="User Id">
                            <button class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

<style>
    .input-group .form-control {
        border-radius: 0.25rem;
    }
    .input-group .btn-primary {
        background: linear-gradient(45deg, #007bff, #00b3ff);
        border: none;
        color: white;
    }
    .input-group .btn-primary:hover {
        background: linear-gradient(45deg, #00b3ff, #007bff);
    }
    .badge-warning {
        background-color: #f8d42b;
        font-size: 1rem;
        padding: 10px;
        border-radius: 5px;
    }
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        margin: 10px;
    }
    .card:hover {
        transform: translateY(-10px);
    }
    .card-body {
        text-align: center;
        padding: 5px;
    }
</style>

@include('frontend.after_login.partials.footer')
