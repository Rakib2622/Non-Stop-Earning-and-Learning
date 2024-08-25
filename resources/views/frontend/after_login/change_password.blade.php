@include('frontend.after_login.partials.header')

<div class="container-fluid">
    <div class="row" style="height: 100vh; overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10" style="height: 100vh; margin-top:80px; overflow-y: auto;">
            <div class="container mt-4">
                <h2 class="text-center mb-4">Change Password</h2>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="old_password"><strong>Old Password:</strong></label>
                                    <input type="password" class="form-control" id="old_password" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="new_password"><strong>New Password:</strong></label>
                                    <input type="password" class="form-control" id="new_password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="retype_password"><strong>Retype New Password:</strong></label>
                                    <input type="password" class="form-control" id="retype_password" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
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
    .form-control {
        font-size: 1rem;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
