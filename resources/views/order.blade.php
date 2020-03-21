@extends('mainpage')

@section('content')
<header>
            <div class="top_banner_directory top_banner">
                
            </div>
           
</header>
<div style="margin-bottom:10px;"></div>
<div class="sizer">
        <div class="woocommerce">
	
  @if(count($order1)==0)
              <center> <h2>Замовлення пусте або неправильный номер</h2></center>
          @else
          <center><h2>Замовлення № {{$order1[0]->order_id}}</h2></center>
          <hr>
          <center><h3>Доставка:<br> {{$order1[0]->city}},&nbsp;{{$order1[0]->address}}<br>Години:  {{$order1[0]->time1}}&nbsp;-&nbsp;{{$order1[0]->time2}}</h3></center>
<form action="/cart/" method="post" onsubmit="return false">


<table class="shop_table cart" cellspacing="0" >
	<thead>
		<tr>
			<th class="product-thumbnail">ID</th>
			<th class="product-thumbnail">Зображення</th>
			<th class="product-name">Товар</th>
			<th class="product-price">Ціна</th>
			<th class="product-quantity">Кількість</th>
			<th class="product-subtotal">Всього</th>
		</tr>
	</thead>
	<tbody>
		@foreach($order1 as $order)
						<tr class="cart_item">
<td class="product-id" style="display:none;">
	<input id="itemid" type="hidden" value="{{$order->id}}">
</td>
				
                    <td class="product-id">
                    <span id="orderidtovar" class="amount">{{$order->item_id}}</span>					</td>

					<td class="product-thumbnail">
						<a href="#"><img style="max-width:90px;"width="90" height="90" src="{{$order->tovars->preview}}" class="attachment-shop_thumbnail wp-post-image" alt="loving-earth-cold pressed coconut-oil"></a>					</td>

					<td class="product-name">
						<span id="ordernametovar" class="amount">{{$order->tovars->title}}</span>					</td>

					<td class="product-price">
						<span id="orderprice" class="amount">{{$order->price}}</span>					</td>

					<td class="product-quantity">
						<div class="quantity"><input readonly id="kstcart{{$order->item_id}}" type="number" style="width:50px;"step="1" min="0" max="99" name="cart[ea96efc03b9a050d895110db8c4af057][qty]" value="{{$order->amount}}" title="К-сть" class="input-text qty text kstcart" size="4"></div>					</td>

					<td class="product-subtotal">
						<span id="ordertotal" class="amount">{{$order->price*$order->amount}}</span>					</td>
				</tr>
				@endforeach
						<tr>
			<td colspan="6" class="actions">

									<div class="coupon">

						

											</div>
				
				

				
				<input type="hidden" id="_wpnonce" name="_wpnonce" value="88711776c0"><input type="hidden" name="_wp_http_referer" value="/cart/">			</td>
		</tr>

			</tbody>
</table>
<div style="margin-bottom:20px;"></div>
<!--<div style="float:right;"><span style="font-size: 19px;color: #f36f21;">Всьoго:&nbsp;&nbsp;</span><span style="font-size: 21px;color: #f36f21;font-weight:700" class="total_cost">0</span> <span style="font-size: 19px;color: #f36f21;">грн.</span></p></div>
-->


</form>
@endif
<div class="cart-collaterals">

	<div class="cart_totals ">

	
	<h2>Cart Totals</h2>

	<table cellspacing="0">

		<tbody><tr class="cart-subtotal">
			<th>Subtotal</th>
			<td><span class="amount">$52.50</span></td>
		</tr>

		
		
			
			<tr class="shipping">
	<th>Shipping</th>
	<td>
		
			Flat rate: <span class="amount">$12.00</span>				<input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="flat_rate" class="shipping_method">

			
		
		
					

<form class="shipping_calculator" action="https://paleo-cafe.com.au/cart/" method="post">

	<h2><a href="#" class="shipping-calculator-button">Calculate Shipping</a></h2>

	<section class="shipping-calculator-form" style="display: none;">

		<p class="form-row form-row-wide">
			<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
				<option value="">Select a country…</option>
				<option value="AU" selected="selected">Australia</option><option value="NZ">New Zealand</option>			</select>
		</p>

		<p class="form-row form-row-wide">
			<span>
						<select name="calc_shipping_state" id="calc_shipping_state" placeholder="State / county"><option value="">Select an option…</option><option value="ACT">Australian Capital Territory</option><option value="NSW">New South Wales</option><option value="NT">Northern Territory</option><option value="QLD">Queensland</option><option value="SA">South Australia</option><option value="TAS">Tasmania</option><option value="VIC">Victoria</option><option value="WA">Western Australia</option></select>
					</span>		</p>

		
		
			<p class="form-row form-row-wide">
				<input type="text" class="input-text" value="" placeholder="Postcode / Zip" name="calc_shipping_postcode" id="calc_shipping_postcode">
			</p>

		
		<p><button type="submit" name="calc_shipping" value="1" class="button">Update Totals</button></p>

		<input type="hidden" id="_wpnonce" name="_wpnonce" value="88711776c0"><input type="hidden" name="_wp_http_referer" value="/cart/">	</section>
</form>

			</td>
</tr>
			
		
		
		
		
		<tr class="order-total">
			<th>Total</th>
			<td><strong><span class="amount">$64.50</span></strong> <small class="includes_tax">(Includes <span class="amount">$1.09</span> GST)</small></td>
		</tr>

		
	</tbody></table>

			<p class="wc-cart-shipping-notice"><small>Note: Shipping and taxes are estimated and will be updated during checkout based on your billing and shipping information.</small></p>
	
	<div class="wc-proceed-to-checkout">

				<a href="https://paleo-cafe.com.au/checkout/" class="checkout-button button alt wc-forward">Proceed to Checkout</a>
		
	</div>

	
</div>
</div>

</div>
</div>
@stop