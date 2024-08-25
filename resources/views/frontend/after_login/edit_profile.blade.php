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
                <h2 class="text-center mb-4">Edit Profile</h2>
                <div class="card">
                    <div class="card-body">
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PATCH')
                            <div class="row mb-3">
                                <div class="col-md-3 text-center">
                                    <img src="{{ $user->image ? asset('storage/profile_images/' . $user->image) : '/assets1/images/users/avatar-1.jpg' }}" alt="Profile Image" class="img-fluid rounded-circle mb-2">
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="name"><strong>Name:</strong></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="student_id"><strong>Student ID:</strong></label>
                                            <input type="text" class="form-control" id="id" name="id" value="NSE-00{{ old('id', $user->id) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="email"><strong>Email:</strong></label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="country"><strong>Country:</strong></label>
                                            <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $user->country) }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="language"><strong>Language:</strong></label>
                                            <input type="text" class="form-control" id="language" name="language" value="{{ old('language', $user->language) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone"><strong>Phone:</strong></label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="whatsapp"><strong>WhatsApp:</strong></label>
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="role"><strong>Role:</strong></label>
                                            <input type="text" class="form-control" id="role" value="{{ $user->role->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="reference"><strong>Reference:</strong></label>
                                            <input type="text" class="form-control" id="reference" value="{{ old('reference', $user->reference) }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status"><strong>Status:</strong></label>
                                            <input type="text" class="form-control" value="{{ $user->status }}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="team_leader_id"><strong>Team Leader ID:</strong></label>
                                            <input type="text" class="form-control" id="team_leader_id" value="{{ $user->team_leader_id }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="trainer_id"><strong>Trainer ID:</strong></label>
                                            <input type="text" class="form-control" id="trainer_id" value="{{ $user->trainer_id }}" disabled>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
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
    .img-fluid {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
