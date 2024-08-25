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
                    <h1 class="my-4">Student List</h1>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Whatsapp</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->whatsapp }}</td>
                                    <td>{{ $student->status }}</td>
                                    <td>
                                        <!-- Add actions like view, edit, or delete -->
                                        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-info btn-sm">View</a>
                                        <!-- You can add more actions as needed -->
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
</style>

@include('admin.partials.footer')
