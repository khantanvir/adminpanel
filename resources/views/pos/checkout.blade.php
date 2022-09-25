@extends('sale')
@section('salepanel')
<div class="col-md-8">
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
                    <input type="text" name="f-name">
                </div>
                <div>
                    <label for="l-name">Last Name</label>
                    <input type="text" name="l-name">
                </div>
            </div>
            <div class="street">
                <label for="name">Street</label>
                <input type="text" name="address">
            </div>
            <div class="shipping-address">
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city">
                </div>
                <div>
                    <label for="state">State</label>
                    <input type="text" name="state">
                </div>
                <div>
                    <label for="zip">Zip</label>
                    <input type="text" name="zip">
                </div>
            </div>
            <h1 class="mb-4">
                <i class="far fa-credit-card"></i> Payment Info
            </h1>
            <div class="payment-info">
                <div>
                    <label for="card-num">Bkash Number</label>
                    <input type="text" name="expire">
                </div>
                <div>
                    <label for="card-num">Trx ID</label>
                    <input type="text" name="security">
                </div>
            </div>
            <div class="payment-info">
                <div>
                    <label for="card-num">Nagad Number</label>
                    <input type="text" name="expire">
                </div>
                <div>
                    <label for="card-num">Trx ID</label>
                    <input type="text" name="security">
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