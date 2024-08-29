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
            <div class="container">
                <h2 class="mb-4">Update Role</h2>

                <!-- Form to Update Role -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Role Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Role Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select  name="status" class="form-select" required>
                                    <option value="" disabled>Select Status</option>
                                    <option value="1" {{ old('status', $role->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $role->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" id="amount" name="amount" class="form-control" step="0.01" min="0" value="{{ old('amount', $role->amount) }}" required>
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Permissions Checkboxes -->
                            <div class="mb-3">
                                <label class="form-label">Permissions</label>
                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}"
                                                    @if(in_array($permission->id, $rolePermissions)) checked @endif>
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ $permission->title }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Update Role</button>
                            <a href="{{ route('admin.roles') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
