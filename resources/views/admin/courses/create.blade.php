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
                <h2>Add New Course</h2>
                <form action="{{ route('admin.insert.course') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Course Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="total_class" class="form-label">Total Classes</label>
                        <input type="text" class="form-control" id="total_class" name="total_class" required>
                    </div> --}}
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Course</button>
                        <a href="{{ route('admin.courses') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
