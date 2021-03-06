<div class="container">
                            
            
            <div >

            <!-- main content -->
            <div >

                            
    <div role="main">
                
            <article>
                
                
                <div class="page-content">
                    <div>
<div>

    
        
            <strong>Thank you. Your Subscription has been renewed.</strong>
                <br>
            <ul>

                <li class="">
                    Invoice Number:                    <strong>{{$invoice->number}}</strong>
                </li>

                <li class="woocommerce-order-overview__date date">
                    Date:                    <strong>{{$date}}</strong>
                </li>

                                    <li class="woocommerce-order-overview__email email">
                        Email:                        <strong>{{\Auth::user()->email}}</strong>
                    </li>
                
                <li class="woocommerce-order-overview__total total">
                    Total:                    <strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{$currency}} {{$invoiceItem->subtotal}}</span></strong>
                </li>

                                    <li class="woocommerce-order-overview__payment-method method">
                        Payment method:                        <strong>Razorpay</strong>
                    </li>
                
            </ul>

        
       
<section>
    
    <h2 style="margin-top:40px ; margin-bottom:10px;">Payment Details</h2>
    
    <table class="table table-bordered  table-striped">
    
        <thead>
            <tr>
                <th class="woocommerce-table__product-name product-name">Product</th>
                <th class="woocommerce-table__product-table product-total">Total</th>
            </tr>
        </thead>
        
        <tbody>
      
            <tr class="woocommerce-table__line-item order_item">

    <td class="woocommerce-table__product-name product-name">
        <strong>{{$invoiceItem->product_name}}</strong> <strong>× {{$invoiceItem->quantity}}</strong>    </td>

    <td class="woocommerce-table__product-total product-total">
        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$currency}}</span> {{$invoiceItem->regular_price}}</span>    </td>

</tr>

        </tbody>
        <tfoot>
                               
                                        <tr>
                        <th scope="row">Payment method:</th>
                        <td>Razorpay</td>
                    </tr>

                                        <tr>
                        <th scope="row">Total:</th>
                        <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$currency}}</span> {{$invoiceItem->subtotal}}</span></td>
                    </tr>
                            </tfoot>
    </table>
    <br>
    
            <section class="woocommerce-customer-details">

    
    <h2 style="margin-bottom:20px;">Billing address</h2>

    <strong>
      {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}<br>{{\Auth::user()->address}}<br>{{\Auth::user()->town}} - {{\Auth::user()->zip}}<br> {{$state}} <br>
                   {{\Auth::user()->mobile}} <br><br>
                     <a href=" product/download/{{$product->id}} / {{$invoice->number}} " class="btn btn-sm btn-primary btn-xs" style="margin-bottom:15px;"><i class="fa fa-download" style="color:white;"> </i>&nbsp;&nbsp;Download the Latest Version here</a>
                   
            </strong>

</section>
    

</section>

    
</div>
</div>
                </div>
            </article>

           

        
    </div>

        

</div><!-- end main content -->

    
    </div>
        </div>