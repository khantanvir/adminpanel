@extends('sale')
@section('salepanel')
<div class="col-lg-8 col-md-12 bg-white invoice-part">

    <div class="  p-5">
        <div class="invoice">
            <div class="">
                <img class="invoice-logo" src="{{ asset('sale/assets/images/logos/squanchy.jpg') }}">
            </div>
            <div class="">
                <h3 class="text-center">Beautysiaa online Shop</h3>
                <p class="text-center invoice-description">Beautysiaa is a best online cosmetics shop in Bangladesh. Buy 100% authentic cosmetics, beauty, makeup, skincare
                products at cheapest price.</p>
            </div>
            <div class="invoice-number">
                <h3>Invoice</h3>
                <h5><b>Invoice No</b>: <label>#12151512</label></h5>
                <h5><b>Date:</b> <label>25/09/2022</label></h5>
            </div>
            </div>
    <div class="invoice-location mt-4">
        <div>
            <h6>Invoice To</h6>
             <span>Barguna</span><br>
             <span>450 E 96th St, Khalpatua</span><br>
             <span>WRHX+8Q IN 46240,</span><br>
             <span>Bangladesh</span><br>
        </div>
        <div class="vl">
        </div>
        <div>
            <h6>Company name</h6>
            <span>Barisal</span><br>
            <span>450 E 96th St, Khalpatua</span><br>
            <span>info@gmail.com</span><br>
            <span>01749718743</span><br>
        </div>
    </div>
    <div class="invoice-payment mt-4">
        <div>
            <h6>Order Date:</h6>
            <span>25/09/2022</span>
        </div>
        <div>
            <h6>Payment Mehtod:</h6>
            <span>Bkash</span>
        </div>
    </div>
    
    <div class="invoice-table mt-4 table-responsive">
            <table>
                <tr class="table-head">
                    <th>Product Id</th>
                    <th>Product Description</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>2121515</td>
                    <td>Mobile</td>
                    <td>600</td>
                    <td>2</td>
                    <td>900</td>
                </tr>
              <tr>
                    <td>2121515</td>
                    <td>Mobile</td>
                    <td>500</td>
                    <td>2</td>
                    <td>900</td>
                </tr>
            <tr>
                <td>2121515</td>
                <td>Mobile</td>
                <td>400</td>
                <td>2</td>
                <td>900</td>
            </tr>
               <tr class="table-end">
                    <td>2121515</td>
                    <td>Mobile</td>
                    <td>200</td>
                    <td>2</td>
                    <td>900</td>
                </tr>
        
          </table>
    </div>
        <div class="invoice-payment-info mt-4">
            <div>
                <h6>Payment info</h6>
                <span>01749718743</span><br>
                <span>#Abkdld5l6ddk</span>
            </div>
            <div>
                <div class="d-flex">
                    <h6>Sub Total:</h6>
                     <span class="mx-3">$1200</span>
                </div>
                <div class="d-flex">
                    <h6>Tax:</h6>
                    <span class="tax-amount">$100</span>
                </div>
                <hr>
                <div class="d-flex">
                    <h6>Total:</h6>
                  <span class="mx-5">$3000</span>
                </div>
          
            </div>
        </div>

        <div class="d-flex justify-content-center flex-wrap contact-us bg-dark mt-4 pt-2">
            <div class="mr-5">
                <h6 class="text-info">Call: +880174971873</h6>
            </div>
             <div class="vl2">
             </div>
            <div class="ml-5">
                <h6 class="text-info">www.infotech12.com</h6>
            </div>
        </div>
   
    </div>
    <div class="d-flex justify-content-center print-area pb-3">
        <div>
            <button class="bg-dark text-white btn">Print</button>
        </div>
        <div>
            <button class="bg-info text-white btn">Download</button>
        </div>
 </div>
</div>
@endsection