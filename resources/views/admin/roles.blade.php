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
            <div class="container"><br>
                <h2 class="mb-4">Role Management</h2>

                <!-- Add New Role Button -->
                <a href="{{ route('admin.role.insert') }}" class="btn btn-primary mb-4">
                    Add New Role
                </a>

                <!-- Role Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Roles List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    {{-- <th>Amount</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->status ? 'Active' : 'Inactive' }}</td>
                                        {{-- <td>{{ number_format($role->amount, 2) }}</td> --}}
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>
                                            
                                            <!-- Delete Button Form -->
                                            <form action="{{ route('admin.role.delete', $role->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!-- Display error message -->
                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>



@include('admin.partials.footer')
