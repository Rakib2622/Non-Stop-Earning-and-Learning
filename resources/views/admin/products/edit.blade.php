@include('admin.partials.header')

<br><br>

<div class="container-fluid">
    <div class="row" style="; overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0 ">
            @include('admin.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10 p-4 mb-10" style="overflow-y: auto;">
            <div class="container mt-5">
                
                <h2 class="mb-4">Update Product</h2>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-group ">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group ">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Enter price">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group ">
                            <label for="old_price">Old Price</label>
                            <input type="text" class="form-control" id="old_price" name="old_price" value="{{ old('old_price', $product->old_price) }}" placeholder="Enter old price (optional)">
                        </div>
                        <div class="form-group ">
                            <label for="commission">Commission</label>
                            <input type="text" class="form-control" id="commission" name="commission" value="{{ old('commission', $product->commission) }}" placeholder="Enter commission">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @if($product->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid" style="max-width: 150px;">
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Update Product</button>
                </form>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
