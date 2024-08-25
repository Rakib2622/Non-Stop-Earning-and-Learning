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
        <div class="col-md-10 p-4" style="overflow-y: auto;">
            <div class="container mt-5">
                <h2>Add New Class for {{ $course->title }}</h2>
                <form action="{{ route('admin.insert.class', $course->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="class_title" class="form-label">Class Title</label>
                        <input type="text" class="form-control" id="class_title" name="class_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="class_url" class="form-label">Class URL</label>
                        <input type="url" class="form-control" id="class_url" name="class_url" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Class</button>
                        <a href="{{ route('admin.classes', $course->id) }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
