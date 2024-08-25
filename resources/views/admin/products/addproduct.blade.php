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
        <div class="col-md-10 p-5" style="overflow-y: auto;">
            <div class="container bg-white p-5 shadow-sm rounded">
                <h2 class="mb-4">Add New Product</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group ">
                            <label for="price">Offer Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter offer price (optional)">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="old_price">Price</label>
                            <input type="text" class="form-control" id="old_price" name="old_price" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="commission">Commission</label>
                            <input type="text" class="form-control" id="commission" name="commission" placeholder="Enter commission">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter product description"></textarea>
                    </div>

                    <div class="form-group mt-2 mb-2">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                </form>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
