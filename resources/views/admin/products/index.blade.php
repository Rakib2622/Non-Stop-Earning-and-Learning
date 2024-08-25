@include('admin.partials.header')

<br><br>

<div class="container-fluid">
    <div class="row" style="overflow: hidden;">
        <!-- Left Sidebar Start -->
        <div class="col-md-2 p-0">
            @include('admin.partials.leftsideber')
        </div>
        <!-- Left Sidebar End -->

        <!-- Main Content Start -->
        <div class="col-md-10 p-4 mb-10" style="overflow-y: auto;">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Products List</h2>
                    <a href="{{ route('admin.product.insert') }}" class="btn btn-success">Add Product</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Offer Price</th>
                            <th>Commission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100px; height:60px;">
                            </td>
                            <td>{{ $product->old_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->commission }}</td>
                            <td>
                                <a href="{{ route('admin.product.details', $product->id) }}" class="btn btn-primary btn-sm">Details</a>
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                
                                <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Main Content End -->
    </div>
</div>

@include('admin.partials.footer')
