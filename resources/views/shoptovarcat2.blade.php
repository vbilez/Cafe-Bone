@extends('mainpage')

@section('content')

<header>
            <div class="top_banner_directory top_banner">
                
            </div>
            <div class="beauty_banner" id="beauty_banner"><p class="beauty_title" id="beauty_title"><a href="/category/{{$category->id}} ">{{$category->title}} </a></p></div>
</header>

<div class="shop_page_holder" >
    <div class="cat_container" >
          <div class="shop_cat_banner"></div>
                <!-- LEFT SIDEBAR -->
        <div class="shop_left_sidebar">
    <!-- BREADCRUMB -->
    <p class="shop_crumb">
        <a href="/shop/">Магазин</a>
                    <span class="crumb_separator">&gt;
            </span> {{$category->title}}          </p>
    <!-- END OF BREADCRUMB -->
    <div class="search_holder_shop">
	<form role="search" method="get" class="searchformShop" action="/category/{{$category->id}}">
		<div>
			<input type="text" class="search_title_shop" id="search_title_shop" placeholder="Пошук" value="" name="s" oninput="copys();">
            <input type="text" id="min_price2" name="min_price" value="" data-min="7" placeholder="Min price" style="display: none;">
            <input type="text" id="max_price2" name="max_price" value="" data-max="25" placeholder="Max price" style="display: none;">
            <div class="shaddowSearchShop"></div>
			
			<input type="submit" class="searchsubmitShop" value="Шукати">
		</div>
	</form>
</div>
            <div class="taxonomiesHolderShop">
            <div class="shop_and_info_holder">
                <a href="/shop/">&larr;&nbsp;До вибору категорій</a>
                <a href="/info">Інформація</a>
            </div>
            <div class="categoriesHolderShop">
                <a href="#" class="categoriesLink sidebarShopLink">Категорії</a>
               
               @foreach ($cats as $idc => $k)
               
                    <a class="categoriesShopLink hidden" href="/category/{{$idc}}">{{$k}}</a>
                    @endforeach
                </div>
           <!-- <div class="brandsHolderShop">
                <a href="https://paleo-cafe.com.au/brands" class="categoriesLink sidebarShopLink">Бренди</a>
                    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/180-nutrition/">180 Nutrition</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/2die4nuts/">2Die4 Nuts</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/a-taste-of-plenty/">A Taste of Plenty</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/amara/">Amara</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/amazonia-2/">Amazonia</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/arthur/">Arthur</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/at-one/">At One</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/bare-movement/">Bare Movement</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/being-co/">Being Co.</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/big-tree-farms/">Big Tree Farms</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/bio-medicals/">Bio-Medicals</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/black-chicken-remedies/">Black Chicken Remedies</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/blue-dinosaur/">Blue Dinosaur</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/bragg/">Bragg</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/bulletproof/">Bulletproof®</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/byron-bay-healthy-salts-co/">Byron Bay Healthy Salts Co</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/byron-bay-muesli/">Byron Bay Muesli</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/c-j-hunt/">C.J.Hunt</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/carawi/">Carawi</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/cave-foods/">Cave Foods</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/coconut-magic/">Coconut Magic</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/comvita/">Comvita</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/dallas-melissa-hartwig/">Dallas &amp; Melissa Hartwig</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/damon-gameau/">Damon Gameau</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/dr-brett-hill/">Dr Brett Hill</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/dr-bronner/">Dr Bronner</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/eco-tan/">Eco Tan</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/ere-perez/">Ere Perez</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/food-to-nourish/">Food to Nourish</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/gefu/">Gefu</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/gimme/">Gimme</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/gluten-free-co/">Gluten Free Co.</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/gold-mine/">Gold Mine</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/grants/">Grants</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/great-lakes/">Great Lakes</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/green-pasture/">Green Pasture</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/hemp-foods-australia/">Hemp Foods Australia</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/hilbilby/">Hilbilby</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/hunted-gathered/">Hunted + Gathered</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/ikou/">iKOU</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/jack-jill/">JACK n' JILL</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/jimalie/">Jimalie</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/karom/">Karom</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/kitz-living-foods/">Kitz Living Foods</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/kora-organics/">KORA Organics</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/living-synergy/">Living Synergy</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/lola-berry/">Lola Berry</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/lola-tan-body/">Lola Tan Body</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/loren-cordain/">Loren Cordain</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/loving-earth/">Loving Earth</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/luke-scott/">Luke &amp; Scott</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/lunch-bots/">Lunch Bots</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/fressko/">made by Fressko</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/matakana/">Matakana</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/max/">Max</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/mayde-tea/">Mayde Tea</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/melrose/">Melrose</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/my-new-skin/">My New Skin</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/natural-evolution/">Natural Evolution</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/nuzest/">Nuzest</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/our-eco-home/">Our Eco Home</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/paleo-cafe/">Paleo Cafe</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/paleo-skincare/">Paleo Skincare</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/pete-evans/">Pete Evans</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/planet-organic/">Planet Organic</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/power-superfoods/">Power Superfoods</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/powerstart/">Powerstart</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/pressed-purity/">Pressed Purity</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/primal-collective/">Primal Collective</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/pukka/">Pukka</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/pure-delish/">Pure Delish</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/pure-eden/">Pure Eden</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/pure-pharma/">Pure Pharma</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/rainbow-wellness/">Rainbow Wellness</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/raw-c/">Raw C</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/red-boat/">Red Boat</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/sarah-wilson/">Sarah Wilson</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/signature-scents/">Signature Scents</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/simple-chemistry/">Simple Chemistry</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/simply-raw/">Simply Raw</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/snappy-jaws/">Snappy Jaws</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/spiral/">Spiral Foods</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/sweet-leaf/">Sweetleaf Bliss Balls</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/synergy/">Synergy</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/the-divine-company/">The Divine Company</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/the-fit-foodie/">The Fit Foodie</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/the-merry-maker-sisters/">The Merry Maker Sisters</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/tropical-teethers/">Tropical Teethers</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/vanilla-mozi/">Vanilla Mozi</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/vivo-barefoot/">Vivo Barefoot</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/willowvale/">Willowvale Organics</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/wotnot/">Wotnot</a>
    <a class="categoriesShopLink hidden" href="http://paleo-cafe.com.au/brands/zestio/">Zestio</a>
            </div>

        -->
        </div>
      
        <ul class="sidebarShopWp">
        <li id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter"><h2 class="widgettitle">Фільтр ціни</h2><form method="get" action="/category/{{$category->id}}" >
			<div class="price_slider_wrapper">
               <div id="slider">
				<div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
                    
                    <span class="ui-slider-handle ui-state-default ui-corner-all corner3" tabindex="0" style="left: 0%;"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all corner4" tabindex="0" style="left: 100%;"></span>
                </div>
				<div class="price_slider_amount">
					<input type="text" id="min_price" name="min_price" value="" data-min="7" placeholder="Мін. ціна" style="" oninput="copycina();">
					<input type="text" id="max_price" name="max_price" value="" data-max="25" placeholder="Макс. ціна" style="" oninput="copycina();">
                    <hr>
                    <input type="hidden" class="search_title_shop" id="hs" placeholder="Пошук" value="" name="s">
					<button type="submit" class="button">Фільтр</button>
					<div class="" style="color: #5f2c00;">
						Ціна: <span style="color: #5f2c00;" class="leftcina" >0</span> — <span style="color: #5f2c00;" class="rightcina">300</span>
					</div>
					
					<div class="clear"></div>
				</div>
               </div>
			</div>
		</form></li>    </ul>
</div>
        <!-- END OF LEFT SIDEBAR -->
        <!-- CONTENT -->
        <div class="shopContent" id="shopContent" >
          <div class="shop_sort">
        <!--        <form class="woocommerce-ordering" method="get">
    <div class="sort_by_holder orderby">
        <div class="visible_select_element">
            <p class="sort_by_title">Sort by</p>
            <div class="sort_dropdown_holder">
                <p class="selected_sort_text">Default sorting</p>
                <div class="sort_dropdown_indicator">
                    <div class="sort_dropdown_indicator_inner"></div>
                </div>
            </div>
        </div>
    	<ul name="orderby" class="orderby_paleo">
    		<li class="do_sort" data-value="menu_order">Default sorting</li><li class="do_sort" data-value="popularity">Sort by popularity</li><li class="do_sort" data-value="rating">Sort by average rating</li><li class="do_sort" data-value="date">Sort by newness</li><li class="do_sort" data-value="price">Sort by price: low to high</li><li class="do_sort" data-value="price-desc">Sort by price: high to low</li>    	</ul>
    	    </div>
</form>-->


            </div>
              


     @foreach ($tovars as $c )
    <div itemscope="" itemtype="https://schema.org/Product" id="{{$c->id}}" class="paleo_product_list js_product post-4446 product type-product status-publish has-post-thumbnail product_cat-coconut-products product_cat-oil-vinegar-sauces product_cat-pantry-staples brands-primal-collective purchasable product-type-simple product-cat-coconut-products product-cat-oil-vinegar-sauces product-cat-pantry-staples instock">
    	<div class="summary entry-summary">
            <a href="/tovar/{{$c->id}}">
                <div class="image_listin_shop" style="background-image: url({{$c->preview}}); background-size: cover; background-repeat: no-repeat; background-position: center; background-color: white"></div>
            </a>
            <div class="product_text_part_shop">
                <a href="/tovar/{{$c->id}}">
                    <h2 itemprop="name" class="product_title entry-title">{{$c->title}}</h2>
                </a>
                <p class="product_price"><span class="amount">{{$c->price}}</span></p>
                <div class="paleo_ratings_shop">
                    <div class="rating_html"><div class="product_comment_star_cat gray_star"></div><div class="product_comment_star_cat gray_star"></div><div class="product_comment_star_cat gray_star"></div><div class="product_comment_star_cat gray_star"></div><div class="product_comment_star_cat gray_star"></div></div>                </div>
            </div>
    	</div><!-- .summary -->
    	<meta itemprop="url" content="/tovar/{{$c->id}}">
    </div><!-- #product-4446 -->
    @endforeach
  
                    <!--        <a href="#" class="shopAllShopButton" id="shopAllShopButton">Show all</a>-->
                    <div style="margin-bottom:20px;"></div>
<div align="center">{!! $tovars->appends(Request::except('page'))->render() !!}</div>
<div class="loaderAnimation" id="loaderAnimation">
    <div class="loader" title="6">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
            <rect x="0" y="0" width="4" height="20" fill="#333">
                <animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
            </rect>
            <rect x="7" y="0" width="4" height="20" fill="#333">
                <animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0.2s" dur="0.6s" repeatCount="indefinite"></animate>
            </rect>
            <rect x="14" y="0" width="4" height="20" fill="#333">
                <animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0.4s" dur="0.6s" repeatCount="indefinite"></animate>
            </rect>
        </svg>
    </div>
</div>                    </div><!-- shopContent -->
    </div><!-- cat Ontainer -->

</div>
@stop