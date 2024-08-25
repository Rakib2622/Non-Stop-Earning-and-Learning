@include('frontend.after_login.partials.header')

<div class="container-fluid mt-5">
    <div class="row">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('frontend.after_login.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10">
            <div class="container mt-4">
                <h2 class="text-center mb-4">Video Editing</h2>
                <div class="text-center mb-4">
                    <button class="btn btn-primary " style="background: linear-gradient(to right, #56CCF2, #2F80ED); border: none;">Watch Video</button>
                </div>
                <h3 class="text-center mb-4">List Of Previous URL's</h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="">1</td>
                                <td><a href="#" class="btn btn-light " target="_blank"><i class="fa fa-link"></i> Open</a></td>
                                <td><span class="badge badge-success" style="">accept</span></td>
                                <td><button class="btn btn-primary "><i class="fa fa-edit"></i></button></td>
                            </tr>
                            <tr>
                                <td style="">2</td>
                                <td><a href="#" class="btn btn-light " target="_blank"><i class="fa fa-link"></i> Open</a></td>
                                <td><span class="badge badge-success" style="">accept</span></td>
                                <td><button class="btn btn-primary "><i class="fa fa-edit"></i></button></td>
                            </tr>
                            <tr>
                                <td style="">3</td>
                                <td><a href="#" class="btn btn-light " target="_blank"><i class="fa fa-link"></i> Open</a></td>
                                <td><span class="badge badge-danger" style="">reject</span></td>
                                <td><button class="btn btn-primary "><i class="fa fa-edit"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h3 class="text-center mb-4">Submit New URL</h3>
                <div class="d-flex justify-content-center">
                    <form class="form-inline w-100">
                        <div class="form-group flex-grow-1 mb-2">
                            <input type="url" class="form-control form-control-lg w-100" id="newUrl" placeholder="Enter URL">
                        </div>
                        <button type="submit" class="btn btn-success  mb-2 ml-2">Post URL</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

<!-- Footer -->

<style>
    .badge-success {
        background-color: #28a745;
        padding: 4px;
    }
    .badge-danger {
        background-color: #dc3545;
        padding: 4px;
    }
    .btn-light {
        background-color: #f8f9fa;
        color: #343a40;
        border: none;
        
    }
    .btn-light:hover {
        background-color: #e2e6ea;
    }
    
    .btn-primary:hover {
        background-color: #56CCF2;
    }
    .btn-success {
        background: linear-gradient(to right, #56CCF2, #138eda);
        border: none;
        
    }
    
</style>

@include('frontend.after_login.partials.footer')
