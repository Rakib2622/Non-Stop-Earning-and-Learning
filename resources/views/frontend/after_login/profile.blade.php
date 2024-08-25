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
                <h2 class="text-center mb-4">Profile Details</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <img src="{{ $user->image ? asset('storage/profile_images/' . $user->image) : '/assets1/images/users/avatar-1.jpg' }}" alt="Profile Image" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-md-9">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Name:</strong>
                                        <p>{{ $user->name ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6"> 
                                        <strong>Student Id:</strong>
                                        <p>NSE-00{{ $user->id }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Email:</strong>
                                        <p>{{ $user->email ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Country:</strong>
                                        <p>{{ $user->country ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Language:</strong>
                                        <p>{{ $user->language ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Phone:</strong>
                                        <p>{{ $user->phone ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>WhatsApp:</strong>
                                        <p>{{ $user->whatsapp ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Role:</strong>
                                        <p>{{ $user->role->name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Reference:</strong>
                                        <p>{{ $user->reference ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Balance:</strong>
                                        <p>{{ $user->balance ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Team Leader ID:</strong>
                                        <p>{{ $user->team_leader_id ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Trainer ID:</strong>
                                        <p>{{ $user->trainer_id ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Referral Link:</strong>
                                        <p>https://nonstopearning.com/register?referral=00{{ $user->id }}</p>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <strong>Status:</strong>
                                        <p>{{ $user->status?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>



<style>
    .card {
        background-color: #f8f9fa;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        padding: 2rem;
    }
    .card p {
        margin: 0;
        font-size: 1rem;
    }
    .card strong {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    .img-fluid {
        width: 100%;
        height: auto;
        border-radius: 50%;
        margin-bottom: 1rem;
    }
    .btn-info {
        background-color: #500c95;
        border-color: #007bff;
        font-size: 1rem;
        padding: 0.5rem 1rem;
        margin-top: 0.5rem;
    }
    .btn-info:hover {
        background-color: #835407;
        border-color: #0056b3;
    }
</style>

@include('frontend.after_login.partials.footer')
