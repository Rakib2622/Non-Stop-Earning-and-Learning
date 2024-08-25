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
                    <h2>Orders List</h2>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Customer Name</th>
                            <th>Mobile</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Payable Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>SKU-{{ $order->product->id }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->mobile }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->payable_price }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
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
