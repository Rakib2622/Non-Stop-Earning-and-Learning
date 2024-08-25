@include('frontend.after_login.partials.header')

<br><br>

<div class="container-fluid">
    <div class="row" style="overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10 p-4" style="overflow-y: auto;">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Available Courses</h2>
                </div>
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('assets1\images\auth-bg.jpg') }}" class="card-img-top" alt="Course Image">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $course->title }}</h5> 
        
                                <div class="mt-auto">
                                    <a href="{{ route('user.classes', $course->id) }}" class="btn btn-primary">Enroll</a>
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

@include('frontend.after_login.partials.footer')

<style>
    .card {
        border: none;
        background-color: #f8f9fa;
    }
    .card-img-top {
        height: 200px; /* Adjust height as needed */
        object-fit: cover;
    }
    .card-body {
        padding: 15px;
    }
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
    .card-text {
        font-size: 1rem;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
