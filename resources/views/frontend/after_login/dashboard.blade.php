@include('frontend.after_login.partials.header')

<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-2">
            @include('frontend.after_login.partials.leftsideber')
        </div>

        <!-- Main Content: Hero and Body -->
        <div class="col-md-10">
            @include('frontend.after_login.partials.hero')
            @include('frontend.after_login.partials.body')
        </div>
    </div>
</div>

@include('frontend.after_login.partials.footer')
