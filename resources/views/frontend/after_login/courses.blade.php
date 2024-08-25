@include('frontend.after_login.partials.header')

<br><br>

<div class="container-fluid">
    <div class="row" style="height: 100vh; overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10" style="height: 100vh; margin-top:20px; overflow-y: auto;">
            <div class="row mt-4">
                <!-- Course Card Start -->
                @for ($i = 0; $i < 9; $i++)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets1\images\auth-bg.jpg" class="card-img-top" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title">Course Name</h5>
                                <a href="{{ route('enroll') }}" class="btn btn-primary">Enroll</a>
                            </div>
                        </div>
                    </div>
                @endfor
                <!-- Course Card End -->
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        margin: 10px;
        padding: 0;
    }
    .card:hover {
        transform: translateY(-10px);
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    .card-body {
        text-align: center;
        padding: 10px;
    }
    .card-body h5 {
        margin-bottom: 15px;
    }
    
</style>

@include('frontend.after_login.partials.footer')
