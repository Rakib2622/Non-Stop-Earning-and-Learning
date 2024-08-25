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
                <h2 class="text-center mb-4">Withdrawal</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5>Account Balance: <span class="text-success">$500</span></h5>
                            </div>
                        </div>
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="amount"><strong>Amount:</strong></label>
                                    <input type="number" class="form-control" id="amount" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="number"><strong>Number:</strong></label>
                                    <input type="text" class="form-control" id="number" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="method"><strong>Method:</strong></label>
                                    <select class="form-control" id="method" required>
                                        <option value="bkash">bKash</option>
                                        <option value="nogod">Nogod</option>
                                        <option value="paytm">Paytm</option>
                                        <option value="rocket">Rocket</option>
                                        <option value="google_pay">Google Pay</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

<!-- Footer -->
@include('frontend.after_login.partials.footer')

<style>
    .card {
        background-color: #f8f9fa;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        padding: 2rem;
    }
    .form-control, .form-control-file, .form-control-select {
        font-size: 1rem;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
