@include('frontend.header')

<br><br><br>

<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Checkout</h1></div>
          </div>
    </div>
    <!--End Page Title-->
    
    <div class="container">
        <div class="row">
            <!-- Billing Details -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom mb-4">
                <div class="create-ac-content bg-light-gray padding-20px-all">
                    <form action="{{ route('home.product.order', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="payable_price" id="input-payable-price" value="{{ $product->price }}">
                         <input type="hidden" name="shipping_cost" id="input-shipping-cost" value="0">
                        <fieldset>
                            <h2 class="login-title mb-3">Billing details</h2>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-name">Name <span class="required-f">*</span></label>
                                    <input name="name" value="" id="input-name" type="text" required>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-mobile">Mobile <span class="required-f">*</span></label>
                                    <input name="mobile" value="" id="input-mobile" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-city">City <span class="required-f">*</span></label>
                                    <input name="city" value="" id="input-city" type="text" required>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-address">Address <span class="required-f">*</span></label>
                                    <input name="address" value="" id="input-address" type="text" required>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                    <label for="input-shipping">Shipping Address</label>
                                    <div>
                                        <input type="radio" name="shipping" id="insideDhaka" value="70" onclick="updateShipping()">
                                        <label for="insideDhaka">Inside Dhaka</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="shipping" id="outsideDhaka" value="120" onclick="updateShipping()">
                                        <label for="outsideDhaka">Outside Dhaka</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                <div class="order-box">
                    <div class="bg-light-gray padding-20px-all">
                        <h5 class="no-margin-top">Your Order</h5>
                        <div class="table-responsive-sm order-table">
                            <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-left">Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">{{ $product->name }}</td>
                                        <td>BDT {{ $product->price }}</td>
                                        <td>1</td>
                                        <td>BDT {{ $product->price }}</td>
                                    </tr>
                                </tbody>
                                <tfoot class="font-weight-600">
                                    <tr>
                                        <td colspan="3" class="text-right">Shipping</td>
                                        <td id="shipping-cost">৳0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">Total</td>
                                        <td id="total-cost">৳{{ $product->price }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.footer')

<script>
    function updateShipping() {
    const shippingRadios = document.getElementsByName('shipping');
    let shippingCost = 0;
    for (let i = 0; i < shippingRadios.length; i++) {
        if (shippingRadios[i].checked) {
            shippingCost = parseFloat(shippingRadios[i].value);
            break;
        }
    }
    
    const subtotal = {{ $product->price }}; // Product price
    const totalCost = subtotal + shippingCost;
    
    document.getElementById('shipping-cost').textContent = `৳${shippingCost.toFixed(2)}`;
    document.getElementById('total-cost').textContent = `৳${totalCost.toFixed(2)}`;
    
    document.getElementById('input-payable-price').value = totalCost;
    document.getElementById('input-shipping-cost').value = shippingCost;
}

</script>
