@include('admin.partials.header')

<br><br>

<div class="container-fluid">
    <div class="row" style=" overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('admin.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10 p-4" style="overflow-y: auto;">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Courses</h2>
                    <a href="{{ route('admin.course.insert') }}" class="btn btn-success">Add Course</a>
                </div>
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ asset('assets1\images\auth-bg.jpg') }}" class="card-img-top" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                {{-- <p class="card-text">Total Classes: {{ $course->total_class }}</p> --}}
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.classes', $course->id) }}" class="btn btn-primary">Details</a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.course.delete', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
