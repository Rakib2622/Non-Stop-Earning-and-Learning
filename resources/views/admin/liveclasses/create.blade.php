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
                    <h1 class="my-4">Create New Live Class</h1>

                    <form action="{{ route('admin.liveclass.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" id="url" required>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
