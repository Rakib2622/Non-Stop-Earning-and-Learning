@include('admin.partials.header')

<br><br>

<div class="container-fluid">
    <div class="row" style="height: 100vh; overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('admin.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10 p-4">
            <div class="card shadow-sm mt-4">
                <div class="card-header">
                    <h3 class="mb-0">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin->name) }}">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $admin->whatsapp) }}">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="text-muted">Leave blank if you don't want to change the password.</small>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>
                        
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                            <a href="{{ route('admin.showprofile') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
