@include('admin.partials.header')

<br><br><br><br>

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
                    <h3 class="mb-0">Admin Profile</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $admin->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $admin->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">WhatsApp:</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $admin->whatsapp }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Role:</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $admin->selected_role->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Joined At:</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $admin->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
