@extends('sale')
@section('salepanel')
<div class="col-lg-8 col-md-12 col-sm-12">
<div class="checkout-wrapper">
    <div class="container-chekout">
        <form class="checkout-input">
            <h1 class="mb-4">
                <i class="fas fa-shipping-fast"></i>
                Shipping Details
            </h1>
            <div class="shipping-name">
                <div>
                    <label for="f-name">First Name</label>
                    <input class="shiping-input" type="text" name="f-name">
                </div>
                <div>
                    <label for="l-name">Last Name</label>
                    <input class="shiping-input" type="text" name="l-name">
                </div>
            </div>
            <div class="street">
                <label for="name">Street</label>
                <input class="shiping-input" type="text" name="address">
            </div>
            <div class="shipping-address">
                <div>
                    <label for="city">City</label>
                    <input class="shiping-input" type="text" name="city">
                </div>
                <div>
                    <label for="state">State</label>
                    <input class="shiping-input" type="text" name="state">
                </div>
                <div>
                    <label for="zip">Zip</label>
                    <input class="shiping-input" type="text" name="zip">
                </div>
            </div>
            <h1 class="mb-4">
                <i class="far fa-credit-card"></i> Payment Info
            </h1>
            <div class="text-center d-flex mb-3">
                <div>
                    <input id="cash" class="radio-button" type="radio" name="" id="">
                </div>
                <label for="cash"><h6 class="ml-3"> Cash on Delivery </h6></label>
            </div>
            <div class="payment-info">
                <div>
                     <div class="d-flex">
                        <div>
                            <input id="bkash" class="radio-button" type="radio" name="" id="">
                        </div>
                        <label for="bkash"><h6 class="ml-3">Bkash</h6></label>
                      </div>
                    
                    <div>
                        <label>Bkash Number</label>
                        <input class="payment-method" type="text" name="expire">
                        <label>Trx ID</label>
                        <input class="payment-method" type="text" name="security">
                    </div>
                </div>
                <div>
                    <div class="d-flex ml-3">
                        <div>
                            <input id="nagad" class="radio-button" type="radio" name="" id="">
                        </div>
                        <label for="nagad"><h6 class="ml-3">Nagad</h6></label>
                    </div>
                    <div class="nagad-part ml-3">
                        <label>Nagad Number</label>
                        <input class="payment-method" type="text" name="expire">
                        <label>Trx ID</label>
                        <input class="payment-method" type="text" name="security">
                    </div>
                </div>
                
            </div>
            
            <div class=" checkout-button mt-4 mb-4">
                <button>Confirm</button>
           
            </div>
        </form>
    </div>
</div>
</div>

@endsection