@extends('mainpage')

@section('content')
<header>
            <div class="top_banner_directory top_banner">
                
            </div>
           
</header>
<div style="margin-bottom:10px;"></div>
@if(true)
<?php
$categ='';
  if(!empty($cats[$tovar->category]))
  {
  $categ=$cats[$tovar->category];
}
?>
@endif
<div class="singleproductSizer">
    <div class="cart_notices">
            </div>
    <p class="breadcrumb_single_product">
        <a href="/shop">Магазин <span class="crumb_separator">&gt;</span></a> <a href="/category/{{$tovar->category}}">{{$categ}}</a>   </p>
        <div itemscope="" itemtype="http://schema.org/Product" id="prouctID" data-id="4446" class="post-4446 product type-product status-publish has-post-thumbnail product_cat-coconut-products product_cat-oil-vinegar-sauces product_cat-pantry-staples brands-primal-collective purchasable product-type-simple product-cat-coconut-products product-cat-oil-vinegar-sauces product-cat-pantry-staples instock">
    <div class="product_left_part">
                    <img src="{{$tovar->preview}}"  class="product_featured_image_single">
                <div class="product_tabs">
            
	<div class="woocommerce-tabs">
		<div class="tabs">
			<ul class="tabs">
					                					<li class="description_tab active">
						<a href="#tab-description">Опис</a>
					</li>
					                					<li class="reviews_tab">
						<a href="#tab-reviews">Огляди (0)</a>
					</li>
							</ul>
							<div class="add_to_wishlist_button">
					<a href="#" class="add_to_wishlist_button_inner">Додати до бажаних</a>
				</div>
						<div class="share_buttons">
				<div class="fb-like fb_iframe_widget" data-href="http://paleo-cafe.com.au/product/fat-ghee-coconut-oil-blend/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=737900236335986&amp;container_width=0&amp;href=http%3A%2F%2Fpaleo-cafe.com.au%2Fproduct%2Ffat-ghee-coconut-oil-blend%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=false&amp;show_faces=true"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe name="f266feba18" width="0" height="0" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/v2.2/plugins/like.php?action=like&amp;app_id=737900236335986&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2FTlA_zCeMkxl.js%3Fversion%3D41%23cb%3Df24d83ef94%26domain%3Dpaleo-cafe.com.au%26origin%3Dhttp%253A%252F%252Fpaleo-cafe.com.au%252Ffb8ab8be%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fpaleo-cafe.com.au%2Fproduct%2Ffat-ghee-coconut-oil-blend%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=false&amp;show_faces=true" style="border: none; visibility: visible; display: none !important; opacity: 0 !important; width: 0px; height: 0px;"></iframe></span></div>
				<br><a class="twitter-share-button" href="http://paleo-cafe.com.au/product/fat-ghee-coconut-oil-blend/" data-twitter-extracted-i1448743640515718056="true">Tweet</a>
			</div>
		</div>
		            			<div class="panel entry-content" id="tab-description" style="display: block;">
                <div class="inner">
                    
<h2>Опис продукту</h2>

{{$tovar->description}}
                </div>
			</div>

		            			<div class="panel entry-content" id="tab-reviews" style="display: none;">
                <div class="inner">
                    <div id="reviews">
	<div id="comments">
		<h2>Reviews</h2>

		
			<p class="woocommerce-noreviews">There are no reviews yet.</p>

			</div>

	
		<div id="review_form_wrapper">
			<div id="review_form">
										<div id="respond" class="comment-respond">
				<h3 id="reply-title" class="comment-reply-title">Be the first to review “FAT: Ghee &amp; Coconut Oil Blend” <small><a rel="nofollow" id="cancel-comment-reply-link" href="/product/fat-ghee-coconut-oil-blend/#respond" style="display:none;">Cancel reply</a></small></h3>
									<p class="must-log-in">You must be <a href="https://paleo-cafe.com.au/wp-login.php?redirect_to=http%3A%2F%2Fpaleo-cafe.com.au%2Fproduct%2Ffat-ghee-coconut-oil-blend%2F" class="login_button">logged in</a> to post a comment.</p>												</div><!-- #respond -->
						</div>
		</div>

	
	<div class="clear"></div>
</div>                </div>
			</div>

			</div>

        </div>
    
            </div><div class="product_right_part">
        <img src="/images/shop_cat_banner.png" class="shop_cat_banner_img">
              <div style="margin-top:10px;">
        <img style="float:left;margin-left:30px;" src="/images/heart.jpg" width="60" heigth="60" alt="Допоможи дітям">
        <div style="float:right;margin-top:10px;font-family:Arial;font-size:15px;color:red;">
        <b>Благодійна акція "Допоможи дітям"!<br>
        	15% покупки піде на допомогу дітям</b>
        </div>
        </div>
        <div class="right_inner_part_product">
            <h1 itemprop="name" class="product_title_product entry-title">
{{$tovar->title}}</h1>
            <div class="product_right_ruller"></div>
            <div class="inner_product_var_cart">
                
<p class="upperStock stock in-stock">21 in stock</p>


	
	<form >
	 	
	 			
		<div class="single_variation_wrap">
			
			<div class="variations_button">
				<label class="quantity_label_product">
					<p class="quantity_text">Кількість</p><!--
					--><div class="quantity_input_holder">
						<div class="quantity"><input id="ksttovary" style="width: 70px;" type="number" min="1" max="99" step="1" name="quantity" value="1" title="К-сть" class="input-text qty text" size="4"></div>					</div>
				</label>
			</div>
		</div>
		<p class="product_price_single"><span class="amount price">{{$tovar->price}}</span></p>
		<div class="product_right_ruller cart_ruller"></div>
		

	 

			</form>
<div class="">
			<button style="    color: #fff;
    background-color: #f36f21;
    border: none;    
    line-height: 35px;
    font-size: 16px;" type="button" class="buy-btn" onclick="buybtn('{{$tovar->id}}','{{$tovar->title}}','{{$tovar->preview}}','{{$tovar->price}}');">Купити зараз!</button>
		</div>
	            </div>
        </div>
    </div><!--
    -->
    <meta itemprop="url" content="http://paleo-cafe.com.au/product/fat-ghee-coconut-oil-blend/">
</div><!-- #product-4446 -->
</div>
@stop