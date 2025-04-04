<html lang="en">
<body>
    <table style="width: 700px;">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><img src="{{ asset('images/front_images/logos/logo.png') }}" alt=""></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Hello ,</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td> Your order #123456 status has been updated to  $order_status </td></tr>
        @if(!empty($courier_name) && !empty($tracking_number))
            <tr><td>&nbsp;</td></tr>
            <tr><td>Courier Name is---------- and Tracking Number is---------- </td></tr>
        @endif
        <tr><td>&nbsp;</td></tr>
        <tr><td> Your Order Details are as below :-</td></tr>
        <tr><td>
            <table style="width: 95%" cellspacing="5" bgcolor="#f7f4f4">
                <tr bgcolor="#cccccc">
                    <td>Product Name</td>
                    <td>Code</td>
                    <td>Size</td>
                    <td>Color</td>
                    <td>Quantity</td>
                    <td>Price</td>
                </tr>
                    <tr>
                        <td>product name</td>
                        <td>product code</td>
                        <td>product size</td>
                        <td>product color</td>
                        <td>product qty</td>
                        <td>USD product price</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Shipping Charges</td>
                        <td>USD shipping charges</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Coupon Discount</td>
                        <td>USD 
                            {{-- @if($orderDetails['coupon_amount']> 0) --}}
                                {{-- {{ $orderDetails['coupon_amount'] }} --}}
                                coupon_amount
                            {{-- @else --}}
                                0
                            {{-- @endif --}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Grand Total</td>
                        <td>USD grand_total</td>
                    </tr>
            </table>    
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>
            <table>
                <tr>
                    <td><strong>Delivery Address :-</strong></td>    
                </tr>    
                <tr>
                    <td>Customer name</td>    
                </tr>    
                <tr>
                    <td>Customer Address</td>    
                </tr>    
                <tr>
                    <td>Customer City</td>    
                </tr>    
                <tr>
                    <td>Customer State</td>    
                </tr>    
                <tr>
                    <td>Customer Country</td>    
                </tr>    
                <tr>
                    <td>Customer Pincode</td>    
                </tr>    
                <tr>
                    <td>Customer Phone Number</td>    
                </tr>
            </table>    
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>For any enquiries, you can contact us at <a href="mailto:@amrasafricangrocery@gmail.com">amrasafricangrocery@gmail.com</a></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Regards, <br> Amras Grocery Store</td></tr>
        <tr><td>&nbsp;</td></tr>
        
    </table>    
</body>
</html>