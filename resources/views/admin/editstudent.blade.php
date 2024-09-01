@include('admin.partials.header')
<div class="container-fluid">
    <div class="row" style="height: 100vh; overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('admin.partials.leftsideber')
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
                        <form action="{{ route('admin.students.update', $student->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-3 text-center">
                                    <img src="{{ $student->image ? asset('storage/profile_images/' . $student->image) : '/assets1/images/users/avatar-1.jpg' }}" alt="Profile Image" class="img-fluid rounded-circle mb-2">
        
                                </div>
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="name"><strong>Name:</strong></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email"><strong>Email:</strong></label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="role"><strong>Role:</strong></label>
                                            <input type="text" class="form-control" id="role" value="{{ $student->role->name }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="student_id"><strong>Student ID:</strong></label>
                                            <input type="text" class="form-control" id="id" name="id" value="NSE-00{{ old('id', $student->id) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="language"><strong>Language:</strong></label>
                                            <input type="text" class="form-control" id="language" name="language" value="{{ old('language', $student->language) }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="country"><strong>Country:</strong></label>
                                            <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $student->country) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="whatsapp"><strong>WhatsApp:</strong></label>
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $student->whatsapp) }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone"><strong>Phone:</strong></label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="role"><strong>Role:</strong></label>
                                            <input type="text" class="form-control" name="role" value="Students" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="balance"><strong>Balance:</strong></label>
                                            <input type="text" class="form-control" name="balance" value="{{ old('balance', $balance) }}" readonly>
                                        </div>
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="reference"><strong>Reference:</strong></label>
                                            <input type="text" class="form-control" id="reference" value="{{ $student->reference }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status"><strong>Status:</strong></label>
                                            <select class="form-control"  name="status">
                                                <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status', $student->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>                                        
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="team_leader_id"><strong>Team Leader ID:</strong></label>
                                            <input type="text" class="form-control" name="team_leader_id" id="team_leader_id" value="{{ $student->team_leader_id }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="trainer_id"><strong>Trainer ID:</strong></label>
                                            <input type="text" class="form-control" name="trainer_id" id="trainer_id" value="{{ $student->trainer_id }}">
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
@include('admin.partials.footer')

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

        