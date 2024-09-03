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
        <div class="col-md-10" style="height: 100vh; margin-top:20px; overflow-y: auto;">
            <div class="row mt-4">
                <div class="col-12">
                    <h1 class="my-4">Live Classes List</h1>
                    
                    <a href="{{ route('admin.liveclass.create') }}" class="btn btn-primary mb-3">Create New Live Class</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($liveClasses as $liveClass)
                                <tr>
                                    <td>{{ $liveClass->id }}</td>
                                    <td>{{ $liveClass->title }}</td>
                                    <td>{{ $liveClass->url }}</td>
                                    <td>{{ $liveClass->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.liveclass.edit', $liveClass->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('admin.liveclass.delete', $liveClass->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

<style>
    table {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 10px;
        padding: 0;
    }
    table thead th {
        background-color: #f8f9fa;
        text-align: center;
    }
    table tbody td {
        vertical-align: middle;
        text-align: center;
    }
    img {
        border-radius: 50%;
    }
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>

@include('admin.partials.footer')
