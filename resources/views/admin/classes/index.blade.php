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
        <div class="col-md-10 p-4 mb-10" style="overflow-y: auto;">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Classes for {{ $course->title }}</h2>
                    <a href="{{ route('admin.class.insert', ['course_id' => $course->id]) }}" class="btn btn-success">Add Class</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Class Title</th>
                            <th>Class URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $index => $class)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $class->class_title }}</td>
                            <td><a href="{{ $class->class_url }}" target="_blank">{{ $class->class_url }}</a></td>
                            <td>
                                
                                <form action="{{ route('admin.class.delete', ['course_id' => $course->id, 'class_id' => $class->id]) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
