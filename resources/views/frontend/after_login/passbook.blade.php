@include('frontend.after_login.partials.header')

<div class="container-fluid mt-5">
    <div class="row">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10">
            <div class="container mt-4">
                <br><br><br>
                <div class="d-flex justify-content-center mb-4">
                    
                    <button class="btn btn-primary mx-2" style="background: linear-gradient(to right, #56CCF2, #2F80ED); border: none;">Credit History</button>
                    <button class="btn btn-secondary mx-2" style="background: linear-gradient(to right, #f2c94c, #f2994a); border: none;">Debit History</button>
                </div>

                <h3 class="text-center mb-4">Passbook</h3>

                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Title / Id</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data Row -->
                            <tr>
                                <td>1</td>
                                <td>2024-08-19</td>
                                <td>#12345</td>
                                <td>Product</td>
                                <td>Commission</td>
                                <td>Payment for services</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('frontend.after_login.partials.footer')

<style>
    .btn-primary, .btn-secondary {
        font-size: 1rem;
        padding: 10px 20px;
    }

    .btn-primary:hover {
        background-color: #56CCF2;
    }

    .btn-secondary:hover {
        background-color: #f2994a;
    }

    .table thead th {
        background-color: #343a40;
        color: #fff;
    }

    .table td, .table th {
        vertical-align: middle;
    }
</style>
