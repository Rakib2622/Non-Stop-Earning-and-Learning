@include('admin.partials.header')

<br><br><br>

<div class="container-fluid">
    <div class="row" style=" overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('admin.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10 p-4">
            <div class="container">
                <h2 class="mb-4">Withdrawal Requests</h2>

                <!-- Withdrawal Requests Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Pending Withdrawals</h5>
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdrawals as $withdrawal)
                                    <tr>
                                        <td>{{ $withdrawal->id }}</td>
                                        <td>{{ $withdrawal->user_id }}</td>
                                        <td>{{ $withdrawal->amount }}</td>
                                        <td>{{ $withdrawal->method }}</td>
                                        <td>{{ $withdrawal->number }}</td>
                                        <td>{{ $withdrawal->status }}</td>
                                        <td>{{ $withdrawal->description }}</td>
                                        <td>
                                            <form action="{{ route('admin.withdrawal.update_status', $withdrawal->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <select name="status" class="form-select form-select-sm" style="display: inline-block; width: auto;">
                                                    <option value="Pending" {{ $withdrawal->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Accepted" {{ $withdrawal->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                                    <option value="Rejected" {{ $withdrawal->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                                </select>
                                                <input type="text" name="description" class="form-control form-control-sm" placeholder="Optional description" style="display: inline-block; width: auto;" value="{{ $withdrawal->description }}">
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
