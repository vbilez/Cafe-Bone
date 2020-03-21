 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, width=device-width, target-densitydpi=high-dpi, user-scalable=0">
    <title>Cafe Bone</title>
    <link rel="stylesheet" type="text/css" href="https://paleo-cafe.com.au/wp-content/themes/paleo/style.css" media="all">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/bundle.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/superslides.css')}}" media="all">
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet">
    <link href="{{asset('css/ct-navbar.css')}}" rel="stylesheet">
    

<script src="{{asset('js/jquery.cookie.js')}}"></script>
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script>
    $(function() {
      $('#slides').superslides({
        hashchange: true,
        play: 5000
      });

      
    });
  </script>
    <script>

    function set_amount(item_id, amount)
{
     order=JSON.parse(jQuery.cookie('basket')); //получаем куки и переделываем в массив с объектами
     for(var i=0;i<order.length; i++) //перебераем весь массив с объектами
     {
           if(order[i].item_id==item_id) //ищем нжный id
           {
           
                order[i].amount=amount; // устанавливаем количество товара
           }
}
jQuery.cookie('basket',JSON.stringify(order), { expires: 7, path: '/' });
count_order(); //не забываем обновлять количество товаров в корзине
}
    </script>

 <script type="text/javascript">
  function changeamt(vl,item_id,price)
{ 
  
     value=jQuery(vl).val();//получаем введенное значение
    
     if(value.match(/[^0-9]/g) || value<=0)//проверяем, что введенно число, что оно не равно нулю и не отрицательное.
     {
         //jQuery(this).val('1'); //если условие выше не вополняется то значение равно 1
        // value=1;
        jQuery(vl).val('1');
     }
     //price=jQuery(vl).parent().parent().siblings(".product-price").children().first().text(); //получаем цену товара
  jQuery(vl).parent().parent().siblings(".product-subtotal").children().first().text(value*price); //пересчитываем общую цену за товар
   //  item_id=jQuery(vl).parent().parent().siblings(".product-id").children().first().val(); //получаем id товара
  set_amount(item_id,value); //сохраняем новое количество товара в куки
     insert_cost();
}
 
 </script>
<script type="text/javascript" src="https://paleo-cafe.com.au/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1"></script>
    <script>
//$('.buy-btn').click(function()

  function getqty()
  {
    return jQuery("#ksttovary").val();
  };
    function buybtn(id,name,img1,price1)
{
//item_id=parseInt($(this).attr('id')); //получаем id товара
//price=parseInt($(this).parent().prev().children().html()); //получаем цену товара и преобразуем значение в число parseInt
//img=$(this).parent().parent().parent().children('img').attr('src'); //получаем ссылку на изображение, что бы отразить в корзине
//title=$(this).parent().parent().children('h3').html(); //название товара
//теперь нужно узнать есть ли в куках уже такой товар

item_id=id;
price=price1;
title=name;
img=img1;
var qty1=1;
qty=getqty();
if(qty<0)qty=1;
if(isNaN(parseInt(qty)))
    {qty1=1;}
else {qty1=qty};


order=jQuery.cookie('basket'); //получаем куки с именем basket

!order ? order=[]: order=JSON.parse(order);

if(order.length==0)
{
     order.push({'item_id': item_id, 'price':price,'amount':qty1,'img':img,'title':title});//добавляем объект к пустому массиву
}
else
{
     flag=false; //флаг, который указывает, что такого товара в корзине нет
     for(var i=0; i<order.length; i++) //перебираем массив в поисках наличия товара в корзине
     {
           if(order[i].item_id==item_id)
           {
                 order[i].amount=parseInt(order[i].amount)+parseInt(qty1); //если товар уже в корзине, то добавляем +1 к количеству (amount)
                 flag=true; //поднимаем флаг, что такой товар есть и с ним делать ничего не нужно
           }

    }

    if(!flag) //если флаг опущен, значит товара в корзине нет и его надо добавить.
    {
          order.push({'item_id': item_id, 'price':price,'amount':qty1,'img':img,'title':title}); //добавляем к существующему массиву новый объект
    }
}
jQuery.cookie('basket',JSON.stringify(order), { expires: 7, path: '/' });

 // переделываем массив с объектами в строку и сохраняем в куки
count_order(); //запускаем функция для отображения количества заказов, текст функции напишу ниже.
}
</script>
   <script>
 function count_order()
{
    
    order=jQuery.cookie('basket'); //получаем куки
    
     
     order ? order=JSON.parse(order): order=[]; //если заказ есть, то куки переделываем в массив с объектами
     count=0; // количество товаров
     if(order.length>0)
     {
          for(var i=0; i<order.length; i++)
          {
                count=count+parseInt(order[i].amount);
          }
     }
  
     $('.totalItemsInCart').html(count);// отображаем количество товаров корзине.
 }
    </script>


       <script>
 function del_order(id)
{
    string=jQuery(this).parent();
    string.remove();
    order=JSON.parse(jQuery.cookie('basket'));
    for(var i=0;i<order.length; i++)
     {
          if(order[i].item_id==id)
          {
                order.splice(i,1); //удаляем из массива объект
          }
     }
     jQuery.cookie('basket',JSON.stringify(order), { expires: 7, path: '/' });
     count_order();
     location.reload();
}

function total_cost()
{
     order=JSON.parse(jQuery.cookie('basket'));
     total=0;
     for(var i=0;i<order.length; i++)
     {
           total=total+(order[i].amount*order[i].price);
     }
     return total;
}

function insert_cost()
{
     jQuery('.total_cost').html(total_cost());
}



$( document ).ready(function() {
   insert_cost();


   //insert_cost();
});

function gocheckout()
{
  document.location.href = "http://cafebone.esy.es/checkout";
}

    </script>

 <script>
 function copys()
 {
   jQuery('#hs').val(jQuery('#search_title_shop').val());
   jQuery('#min_price2').val(jQuery('#min_price').val());
   jQuery('#max_price2').val(jQuery('#max_price').val());
 }
  function copycina()
 {
   //jQuery('#hs').val(jQuery('#search_title_shop').val());
  // jQuery('#min_price').val(jQuery('#min_price2').val());
  // jQuery('#max_price').val(jQuery('#max_price2').val());
 }
 </script>



    <!-- Google Analytics -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeOAHXep0E8k8qcDyqmmE9sOsQEglcRuQ&amp;sensor=true"></script>
    <script type="text/javascript" src="https://paleo-cafe.com.au/wp-content/themes/paleo/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=2.3.13"></script>
    <script type="text/javascript" src="//paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=2.3.13"></script>
    <script type="text/javascript" src="http://paleo-cafe.com.au/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://paleo-cafe.com.au/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://paleo-cafe.com.au/wp-includes/js/jquery/ui/mouse.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://paleo-cafe.com.au/wp-includes/js/jquery/ui/slider.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="http://paleo-cafe.com.au/wp-content/themes/paleo/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="http://paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/frontend/jquery-ui-touch-punch.min.js?ver=2.3.13"></script>
    <script src="https://paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/jquery-payment/jquery.payment.js"></script>
    

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui-slider.js')}}"></script>

<script type="text/javascript">

   isUserLoggedIn=false;

$(function() {
    $( "#slider" ).slider(
            {   
            range: true,
                min: 0,
                max: 300,
                step:1,
                values: [ 0, 300 ],
                change: function( event, ui ) {
                        //  var minn=jQuery("#slider").slider( "option", "min" );
                        //  var maxx=jQuery("#slider").slider( "option", "max" );
                        jQuery('#min_price').val(ui.values[0]);
                        jQuery('#max_price').val(ui.values[1]);
                      jQuery('.leftcina').html(ui.values[0]);
                      jQuery('.rightcina').html(ui.values[1]);
                      //   var prc= (ui.values[0]-minn)/maxx;
                      //   var prc2= (ui.values[1]-minn)/maxx;
                     //if(!isNaN(prc)&&!isNaN(prc2))
                     //   $('.ui-slider-range').attr('style','left: '+prc+'%'+";"+'width: '+maxx-prc2+'%');
                         
                          
                }
            }
        );
  });


</script>


<link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}"/>
<link rel="stylesheet" href="{{asset("css/bootstrap-theme.min.css")}}"/>
<link rel="stylesheet" href="{{asset("css/cards.css")}}"/>
<!-- This site is optimized with the Yoast WordPress SEO plugin v1.6.3 - https://yoast.com/wordpress/plugins/seo/ -->
<meta name="description" content="Cafe Bone">
<link rel="canonical" href="http://cafebone.esy.es">
<link rel="next" href="http://cafebone.esy.es">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="Cafe Bone">
<meta property="og:description" content="Cafe Bone">
<meta property="og:url" content="http://cafebone.esy.es">
<meta property="og:site_name" content="CAFE BONE">

<!-- / Yoast WordPress SEO plugin. -->

        <script type="text/javascript">
            window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"https:\/\/paleo-cafe.com.au\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.2.5"}};
            !function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
        </script><script src="https://paleo-cafe.com.au/wp-includes/js/wp-emoji-release.min.js?ver=4.2.5" type="text/javascript"></script>
        <style type="text/css">
img.wp-smiley,
img.emoji {
    display: inline !important;
    border: none !important;
    box-shadow: none !important;
    height: 1em !important;
    width: 1em !important;
    margin: 0 .07em !important;
    vertical-align: -0.1em !important;
    background: none !important;
    padding: 0 !important;
}
</style>


<link rel="stylesheet" id="se-link-styles-css" href="https://paleo-cafe.com.au/wp-content/plugins/search-everything/static/css/se-styles.css?ver=4.2.5" type="text/css" media="all">

<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://paleo-cafe.com.au/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://paleo-cafe.com.au/wp-includes/wlwmanifest.xml"> 
<meta name="generator" content="WordPress 4.2.5">
<meta name="generator" content="WooCommerce 2.3.13">
<script type="text/javascript">
    window._se_plugin_version = '8.1.1';
</script>
<style type="text/css">.fancybox-margin{margin-right:0px;}</style><style type="text/css">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow-x:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;_background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif);cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent;_background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_close_icon:active{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent;_background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_loader{background-color:#f6f7f8;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #3a5795;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{width:auto;height:auto;min-height:initial;min-width:initial;background:none}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{color:#fff;display:block;padding-top:20px;clear:both;font-size:18px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;left:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #2f477a;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f8;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yD/r/t-wz8gw1xG1.png);background-repeat:no-repeat;background-position:50% 50%;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}</style><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/23/0/intl/ru_ALL/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/23/0/intl/ru_ALL/util.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/23/0/intl/ru_ALL/stats.js"></script></head>
<body class="home_body" style="overflow-y: scroll;" onload='count_order();'>
  <div >
       

        @yield('content')
        



  <div class="sliderCont">
  <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
            </div>
        <div class="main_navigation">
    <div class="sizer menu_sizer">
        <nav class="franchize_menu">
            <ul id="menu-main-menu" class="menu openmenu"><li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-27"><a href="/">Домашня</a></li>

<li id="menu-item-5485" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5485"><a href="/shop">Магазин</a></li>
<li id="menu-item-3233" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3233"><a href="/spec">Спеціально</a>
<ul class="sub-menu">
    <li id="menu-item-219" style="width:300px;" class="menu-item menu-item-type-taxonomy menu-item-object-food_menus_categories menu-item-219"><a href="/specparalich">Для&nbsp;людей&nbsp;з&nbsp;фіз.відх.</a></li>
    <li id="" class="" style="width:300px;"><a href="/specdiabet">Для&nbsp;людей&nbsp;з&nbsp;цук.діабетом</a></li>
    
</ul>
<li id="menu-item-68" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-68"><a href="/recipe">Рецепти</a></li>

</li>
<li id="menu-item-115" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-115"><a href="/contacts">Контакти</a></li>
<li id="menu-item-3349" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3349"><a href="/pronas">Про нас</a></li>
@if(!Auth::check())
<li id="menu-item-5486" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5486 login_menu"><a href="#">Вхід</a></li>
@endif
@if(Auth::check())
@if(Auth::user()->name=='odmin')
<li id="menu-item-5486" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5486 logout_menu"><a href="/logout">Вихід</a></li>
@endif
@endif
<li id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29 cart_menu"><a href="/cart/"><div class="totalItemsInCart"></div><div class="cart_text">Кошик</div></a></li>
@if(Auth::check())
@if(Auth::user()->name=='odmin')
<li id="menu-item-3349" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3349"><a href="/odmin">Адмін-панель</a></li>
@endif
@endif
</ul>            <h1><div class="logo_on_mobile_ver"></div></h1>
            <a href="/cart" class="mobile_menu_cart">
                <div class="totalItemsInCart totalItemsInCartMobile">0</div>
            </a>
            <button class="menu_pop_up_btn" id="menu_pop_up_btn" onclick="$('.openmenu').toggle();"><img class="menu_help_img" src="/images/dropdown-3.png" alt=""><span>МЕНЮ</span></button>
            <div class="social_network_buttons_nav" style="vertical-align:middle;margin-top:5px;margin-right:35px;">    
                <a href="http://vk.com/public89477959" target="_blank"><img src="/images/vkbig.png" width="35" height="35" style="width:35px;height:35px;" /></a>
                <a href="https://facebook.com/CafeBone" target="_blank"><img src="/images/fb2.png" width="35" height="35" style="width:35px;height:35px;" /></a>
                <a href="http://plus.google.com/CafeBone" target="_blank"><img src="/images/gp.png" width="35" height="35" style="width:35px;height:35px;" /></a>
            </div>
        </nav>
        
    </div>  
</div>

<div id="footer-container">
   
</div>




<script type="text/javascript">
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","i18n_view_cart":"View Cart","cart_url":"https:\/\/paleo-cafe.com.au\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type="text/javascript" src="//paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=2.3.13"></script>
<script type="text/javascript" src="//paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.60"></script>
<script type="text/javascript">
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type="text/javascript" src="//paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=2.3.13"></script>
<script type="text/javascript" src="//paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js?ver=1.4.1"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","fragment_name":"wc_fragments"};
/* ]]> */
</script>
<script type="text/javascript" src="//paleo-cafe.com.au/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=2.3.13"></script>
<script type="text/javascript" src="https://paleo-cafe.com.au/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4"></script>
<script type="text/javascript" src="https://paleo-cafe.com.au/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4"></script>
<script type="text/javascript" src="https://paleo-cafe.com.au/wp-includes/js/jquery/ui/mouse.min.js?ver=1.11.4"></script>
<script type="text/javascript" src="https://paleo-cafe.com.au/wp-includes/js/jquery/ui/slider.min.js?ver=1.11.4"></script>
<script type="text/javascript" src="https://paleo-cafe.com.au/wp-content/themes/paleo/js/vendor/jquery.ui.touch-punch.min.js"></script>

<div class="newsletter_holder" id="newsletter_holder">
    <div id="newsletter_form_close"></div>
    <div class="newsletter_inner newsletter_form_holder" id="newsletter_form_holder">
        <p class="newsletter_title">Subscribe to our Newsletter</p>
        <input type="text" min="1" id="text_name" name="text_name" class="newsltr_input full_newsltr_input" placeholder="Name">
        <input type="email" min="4" id="email_email" name="email_email" class="newsltr_input full_newsltr_input" placeholder="Email">
        <div class="postode_gender_holder">
            <input type="number" min="3" id="text_postcode" name="text_postcode" class="newsltr_input postcode_newsltr_input" placeholder="Postcode"><!--
            --><div class="gender_holder" id="gender_holder">
                <p class="gender_text">Gender</p>
                <div class="femaleInput">
                    <input type="radio" name="radio_gender" value="Female" class="newsltr_input_radio">
                    <p class="fmmm">Female</p>
                </div>
                <div class="maleInput">
                    <input type="radio" name="radio_gender" value="Male" class="newsltr_input_radio">
                    <p class="fmmm">Male</p>
                </div>
            </div>
        </div>
        <div class="subscribe_button" id="subscribe_button">Підписатись</div>
    </div>
    <div class="newsletter_inner newsletter_thankyou_holder" id="newsletter_thankyou_holder">
        <p class="newsletter_title">Дякую</p><p>
        </p><p class="subscribe_thank_you_text">Cafe Bone</p>
    </div>
</div>
<div class="login_form_holder">
    <div class="login_form_inner">
        <div class="collpaseFooterLogin" id="collpaseFooterLogin"></div>
        
          {!! Form::open(['method' => 'POST','action' =>'odmin@loginfromsite','class'=>'login_form_footer']) !!}
            <input type="text" name="log" class="input_login_holder username" placeholder="Username">
            <input type="password" name="pwd" class="input_login_holder password" placeholder="Password">
            <input type="submit" name="wp-submit" value="Login" class="login_submission">
            
            <div class="text_holder_login">
                
                <input type="hidden" name="redirect_to" value="/">
            </div>
       {!! Form::close()!!}
    </div>
</div>
</div>
<div class="dir_menu" id="dir_menu">
    <div class="dir_menu_inner">
        <div class="categories_list_holder">
                                    <div class="menu_cats_one_item">
                            <p class="dir_cat_parent_menu">Products</p>
                                                                            <a href="https://paleo-cafe.com.au/directory-categories/baby/">
                                                <p class="dir_cat_child_menu">Baby</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/beauty/">
                                                <p class="dir_cat_child_menu">Beauty</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/food-beverages/">
                                                <p class="dir_cat_child_menu">Food &amp; Beverages</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/health/">
                                                <p class="dir_cat_child_menu">Health</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/home-lifestyle/">
                                                <p class="dir_cat_child_menu">Home &amp; Lifestyle</p>
                                            </a>
                                                                </div>
                                            <div class="menu_cats_one_item">
                            <p class="dir_cat_parent_menu">Resources &amp; Education</p>
                                                                            <a href="https://paleo-cafe.com.au/directory-categories/blogs-podcasts/">
                                                <p class="dir_cat_child_menu">Blogs &amp; Podcasts</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/community-groups/">
                                                <p class="dir_cat_child_menu">Community Groups</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/courses/">
                                                <p class="dir_cat_child_menu">Courses</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/publications/">
                                                <p class="dir_cat_child_menu">Publications</p>
                                            </a>
                                                                </div>
                                            <div class="menu_cats_one_item">
                            <p class="dir_cat_parent_menu">Services</p>
                                                                            <a href="https://paleo-cafe.com.au/directory-categories/adventure/">
                                                <p class="dir_cat_child_menu">Adventure</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/health-services/">
                                                <p class="dir_cat_child_menu">Health</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/movement/">
                                                <p class="dir_cat_child_menu">Movement</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/retreats/">
                                                <p class="dir_cat_child_menu">Retreats</p>
                                            </a>
                                                                </div>
                                            <div class="menu_cats_one_item">
                            <p class="dir_cat_parent_menu">Suppliers</p>
                                                                            <a href="https://paleo-cafe.com.au/directory-categories/butchers/">
                                                <p class="dir_cat_child_menu">Butchers</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/distributors/">
                                                <p class="dir_cat_child_menu">Distributors</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/farmers/">
                                                <p class="dir_cat_child_menu">Farmers</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/farmers-markets/">
                                                <p class="dir_cat_child_menu">Farmers Markets</p>
                                            </a>
                                                                                    <a href="https://paleo-cafe.com.au/directory-categories/seafood-markets/">
                                                <p class="dir_cat_child_menu">Seafood Markets</p>
                                            </a>
                                                                </div>
                            </div>
        <div class="dir_separator">
            <div class="top_ruler_sep_dir"></div>
            <p class="or_dir">or</p>
            <div class="vertical_ruler_dir"></div>
            <div class="bottom_ruler_sep_dir"></div>
        </div>
        <div class="map_holder_menu">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:amcharts="https://amcharts.com/ammap" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" width="375px" height="375px" viewBox="0 0 450 450">
    <g>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/northern-territory/" id="AU-NT" title="Northern Territory" d="M195.29,27.56l0.63,-1.15l-1.5,-1.01l0.76,-1l1.53,0.05l-0.03,-2.3l5.08,1.63l4.76,-0.32l1.42,0.45l1.75,-1.2l1.49,0.03l0.61,1.16l-0.37,0.8l0.66,-0.86l0,-1.68l1.45,-0.52l1.85,0.36l-1.2,-0.63l-0.12,-0.51l0.08,-3.17l0.61,-0.96l-2.19,-2l-1.27,-0.43l-3.1,0.96l-1.26,-1.76l-1.14,-0.61l-1.02,0.09l1.12,-1.54l1.2,-0.55l1.15,1.13l0.82,1.94l0.76,-0.56l-0.96,-2.37l1.41,0.26l0.7,-0.37l1.77,1.48l1.83,2.68l0.59,0.13l1.61,-2.05l0.47,0.04l2.88,4.18L222,17.2l0.55,0.8l1.54,0.65l1.26,-0.15l1.46,-1.11l1.18,0.2l-0.75,1.3l1.12,0.64l1.17,-0.75l1.47,1.12l0.23,1.27l1.77,-0.26l1.59,0.32l2.77,-0.78l1.08,1.5l2.31,1.49l1.6,0.31l1.05,-2.02l2.8,-0.15l0.83,-0.67l-0.87,0.23l0.12,-1.1l1.74,-0.25l1.38,-1.1l-0.04,-0.77l0.4,0.01l0.37,0.43l-2.18,2.1l0.46,0.54l-1.29,1.62l0.72,0.99l1.61,-1.42l1.51,-0.44l-0.92,1.16l0.37,0.56l0.8,-0.37l0.19,0.33l-0.87,1.26l0.61,1.04l2.18,-0.18l0.58,-0.45l0.76,-1.93l-2.02,-0.8l2.97,-2.35l1.21,-0.22l-0.25,0.83l1.46,3.03l0.91,-0.31l-0.69,-0.71l0.88,-0.22l1.1,0.56l1.11,1.5l-2.53,2.05l-1.1,1.77l-0.25,1.34l-1.37,-0.51l0.55,3.05l-0.95,2.19l-0.1,-0.35l-0.88,0.3l-0.12,-2.14l-1.7,2.05l-1.12,-0.6l-1.84,1.03l-0.39,0.67l0.47,0.65l-0.77,1.05l-0.2,1.25l0.89,1.61l1.07,-0.68l-1.4,5.06l-2.99,3.28l-0.9,2.33l-1.8,0.92l1.13,2.63l7.99,4.81l1.17,2.34l2.7,1.29L259,63.9l2.87,0.12l3.68,2.39l4,1.39l1.32,2.1l1.54,1.31l0,0l0,109.55l0,0l-97.64,0.07l0,0L174.7,52.34l0,0l2.01,1.22l0.06,2.26l0.71,-0.88l-0.29,-2.96l2.52,1.02l2.33,3.05l0.6,-0.23l-1.15,-1.79l0.23,-2.05l1.67,0.29l1.55,-1.07l-1.94,0.61l-0.98,-0.63l-0.96,-1.54l1.27,-0.29l0.75,-0.74L181.86,49l-1.3,-0.24l-1.97,-1.52l0.13,-0.89l1.33,-2.13l2.61,-1.64l1.04,-5.31l0.77,-0.8l0.48,0.91l1.05,-0.19l2.42,-2.05l-1.61,-1.97l0.27,-2.46l0.45,-0.2l0.47,0.43l1.11,-0.58l0.29,-2.45l1.68,-0.75l1,1.14l0.96,-0.07l-0.92,-0.27l-0.31,-1.17l0.37,-1.59l-0.33,-0.25l2.07,0.27L195.29,27.56zM195.97,19.82l-5.05,-3.27l-1.4,-4.28l0.3,-0.99l1.96,2.05l1.43,0.45l2.11,-0.91l1.14,0.49l1.6,-1.01l0.78,1.55l-0.33,-1.21l0.85,-1.12l1.59,0.64l1.2,1.58l0.09,0.83l-2.77,2.91L195.97,19.82zM260.56,44.63l0.64,-0.31l-0.28,1.4l-0.57,0.22l-5.55,-0.91l0.55,-3.66l0.31,-0.53l1.81,-0.55l-0.31,-0.7l0.91,-0.76l0.47,0.03l-0.5,0.81l0.4,1.16l1.03,0.18l0.8,-1.13l0.4,0.63l-1.64,1.47l-0.64,2.51l1.76,0.49L260.56,44.63zM190.91,18.71l-1.8,-0.69l-2.51,0.64l-0.78,-0.39l0.52,-1.37l0.91,0.32l0.4,-0.39l-0.21,-2.01l0.89,-1.55l0.96,-0.2l1.6,4l1.58,0.93l-0.25,0.55L190.91,18.71zM256.16,14.5l2.94,-4.79l-0.53,2.04l-1.77,2.48L256.16,14.5zM213.74,13.27l-1.02,-3.23l0.83,-0.32l0.52,1.71L213.74,13.27zM262.14,63.06l-1.3,-1.47l0.82,-1.19l0.9,1.94L262.14,63.06zM252.88,41.08l-0.31,-1.01l-0.11,0.72l-0.62,-0.21l0.1,-0.93l0.95,-0.75l0.95,0.73L252.88,41.08zM252.68,17.08l0,-0.51l0.99,-0.79l0.82,-0.04l1.44,-1.12L254.74,16L252.68,17.08zM256.39,61l-0.06,-1.08l0.93,-0.28l-0.19,1.23L256.39,61z"></path>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/western-australia/" id="AU-WA" title="Western Australia" d="M14.47,180.78l0.2,-1.84l-2.43,-2.57l-2.47,-5.41l-1.15,-0.7l-0.98,-2.78l0.03,-1.61l-2.44,-3.85l-0.06,-2.35l1.61,-5.6l0.75,-1.5l1.54,-1.21l0.27,-1.01l-0.09,-2.91l0.63,-1.92l-0.12,-1.14l-1.64,-3.85l3.01,-7.33l1.05,-1.56l1.44,-0.5l0.14,0.28l-1.07,4.09l0.7,1.48l-0.34,2.16l0.47,0.48l2.37,-1l3.02,-7.02l3.17,-1.76l1.19,-0.09l4.33,-1.9l1.82,-2.15l2.03,-1.1l1.29,-1.94l2.55,-1.19l0.97,-1.12l2.46,-0.73l2.52,-1.81l1.83,0.79l2.07,-1.11l2.99,1.26l3.72,-0.63l1.79,-0.78l3.56,-2.99l0.61,0.29l6.15,-1.02l1.94,-2.81l1.09,-0.83l1.18,-0.11l4.27,1.28l2.21,-1.14l5.99,-1.07l7.49,-3.28l2.71,-2.26l2.3,-3.11l1.64,-3.53l1.5,-2.02l0.25,-1.78l1.51,-0.37l4.32,-3.6l0.26,-1.43l-1.18,-0.54L101,86.33l-0.12,-2.14l-0.64,-1.66l0.37,-3.56l2.22,-2.79l0.74,-0.47l1.38,-0.01l-0.55,-1.23l0.46,-0.62l2.02,-0.31l0.09,-1.82l1.45,-1.11l0.28,-0.99l0.77,-0.28l0.74,0.74l-0.77,0.23l-0.36,1.25l1.52,1.46l5.2,9.95l-0.13,-2.6l0.6,-1.82l-0.49,-1.5l0.2,-0.86l0.69,-0.02l2.17,2.39l0.65,0.02l-0.91,-0.81l-0.39,-1.56l1.03,-1.18l-1.36,-0.06l-1.72,-2.42l0.06,-1.23l-1.22,0.02l-0.83,-0.75l2.34,0.34l0.74,-1.12l-0.02,-1.01l-1.6,-0.58l0.12,-1.31l1.69,-0.37l0.87,0.68l-0.8,0.68l1.72,1.34l0.79,-1.5l1.91,0.45l0.98,1.34l1.12,0.06l0.56,-0.64l0.99,0.48l4.53,0.12l-3.02,-0.89l-2.33,0.02l-0.27,-1.21l0.59,-1.34l0.44,-0.1l0.52,0.79l0.81,-0.56l0.24,-2.2l1.22,-1.23l-1.2,-0.07l-0.88,1.5l-1.46,-0.81l-0.31,-2.2l0.93,-2.13l1.35,0.43l0.81,-0.42l0.08,-2.42l0.46,-0.11l5.17,2.99l-1.14,-1.01l0.23,-1.44l-2.01,0.38l0.28,-1.2l0.73,0l0.43,-0.74l-1.76,0.85l-0.62,-0.86l0.82,-0.67l0.87,0.12l1.06,-1.24l0.94,1.82l-0.03,-1.44l1.74,1.36l1.23,-0.26l-2.73,-2.06l0.65,-0.52l-1.16,-1.72l2.17,-2.5l2.74,0.29l-0.1,-2.68l0.42,-0.96l1.2,0.57l-0.94,3.98l0.87,-2.52l1.31,0.67l-0.2,1.2l0.84,0.79l1.46,-1.43l1.18,-4.29l-0.71,-1.82l-0.69,-0.44l2.17,0.39l-0.09,0.84l-0.56,0.24l0.37,1.22l1.04,0.72l0.5,-2.03l1.83,-0.95l-0.51,1.25l1.58,1.69l2.05,-2.87l-0.47,-1.96l1.22,-0.49l1.06,-0.25l0.67,0.54l1.2,2.17l0.28,-0.79l2.94,0.6l1.04,1.47l1.49,1l3.25,4.52l0.47,-0.23l1.84,1.58l0.2,1.09l-1.29,3.36l0.04,3.31l-0.57,1.14l0.83,-0.72l0.38,-2.46l1.36,1.03l0.32,1.06l0.05,-1.08l-1.08,-2.67l1.24,-1.7l0.51,1.47l1.03,0.03l-0.66,-2.76l1.61,-0.46l5.04,1.26l0,0l0.06,128.49l0,0L174.7,251l0,0l-8.88,4.31l-9.21,3l-7.03,0.63l-5.51,-0.99l-1.2,0.59l-1.05,-0.23l-4.96,3.58l-2.31,0.67l-6.03,3.84l-5.04,1.13l-1.91,1.98l-1.63,5.43l-2.02,1.76l-0.38,1.1l-2.11,1.64l-1.87,-0.14l-2.18,1.61l-0.73,-1.72l-0.9,-0.38l-1.88,0.64l-5.33,0.08l-1,0.69l-0.12,0.66l-1.44,0.15l-0.42,-0.14l-0.09,-1.62l-0.84,-0.89l-2.31,0.97l-3.47,-1.07l-6.5,0.51l-3.5,0.79l-1.34,0.74l-4.47,-0.59l-2.08,0.64l-2.14,1.59l-1.61,3.03l-1.54,1.51l-1.27,0.75l-3.22,-0.67l-1.87,1.27l0.16,0.75l-0.38,0.43l-2.63,1.1l-2.12,2.39l-2.17,1.16l-2.65,0.48l0.21,0.55l1.5,0.33l-0.67,0.38l-2.25,-1.02l-1.02,0.28l-0.25,0.91l-3.01,-1.58L43.87,294l-0.82,0.54l-4.48,-0.75l-2.64,-1.76l-2.64,-0.61l-1.73,-2.78l-3.46,-2.94l-2.76,-1.12l-1.29,0.85l-1.23,-1.31l-0.6,-7.43l0.47,-2.18l2.43,1.68l1.92,-0.41l3.43,-4.63l-1.28,-7.64l1.09,-1.9l-0.68,1.62l0.94,1.56l0.47,-2.54l-0.61,-10.92l-7.15,-15.29l-0.26,-2.89l-0.94,-2.67l0.44,-7.12l-0.98,-3.49l-0.57,-1.35l-2.34,-2.78l-0.38,-2.93l-0.88,-1.78l-3.78,-4.87l-0.65,-2.93l0.5,-1.76l-0.21,-1.27l-2,-4.92l-3.81,-6.15l-3.31,-3.52l-0.61,-1.93l0.69,-2.54l0.5,3.02l0.34,-1.92l1.61,1.99l0.35,2.7l1.05,1.77l1.53,-0.61l0.78,-1.16l0.06,-2.06l-3.37,-3.15l-0.63,-2.6l-1.1,-1.78l0.85,-2.03l2.47,3.05l0.4,1.13l-0.57,1.75l0.35,1.95l0.92,-0.34l0.87,-1.68l0.87,3.6l1.2,1.61l1.36,-1.07l0.29,-0.97l-0.54,-1.32l0.37,-2.33L14.47,180.78zM3.24,182.51l-2.75,-4.33L0,176.3l0.51,-1.67l0.54,0.13l-0.17,0.86l2.39,5.66L3.24,182.51zM126.09,58.75l-0.58,-1.35l0.98,-0.72l0.94,1.57L126.09,58.75zM26.72,120.51L26,120.37l0.01,-0.61l1.47,-1.72l0.23,1.22L26.72,120.51zM132.78,49.85l-0.57,-0.31l0.07,-0.85l0.76,-1.17l0.5,0.56L132.78,49.85z"></path>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/australian-capital-territory/" id="AU-ACT" title="Australian Capital Territory" d="M392.28,306.01L391.02,305.37L391.02,305.37L389.29,302.43L389.31,300.59L389.83,298.03L392.68,295.93L396.19,298.12L393.88,298.81L393.36,299.53L392.74,302.02L392.9,305.16L392.9,305.16z"></path>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/new-south-wales/" id="AU-NSW" title="New South Wales" d="M402.43,327.48l-19.25,-9.7l-0.98,-0.08l0.99,-2.48l-1.68,-2.93l-0.56,-4.42l-1.18,-0.75l-1.82,-0.78l-0.93,0.36l-1.53,-0.29l-1.01,0.17l-1.01,1.26l-2.8,0.73l-1.46,-0.1l-4.52,-1.69l-2.2,0.99l-5.35,-0.78l-3.1,-2.19l-1.77,0.7l-1.31,-0.39l-2.7,0.35l-0.58,1.62l0.17,1.36l-2.34,0.43l-1.34,-0.78l-2.28,-2.67l-0.56,-1.28l-2.81,-2.59l-3.52,-2.26l-1.89,-0.68l-0.35,-1.69l-1.69,-0.72l-0.5,-1.1l-0.16,-4.01l-2.31,-1.26l-2.89,-0.62l-0.82,-0.81l-0.81,0.48l-0.84,2.17l-0.92,-0.18l-0.93,-2.25l-0.94,-0.87l-0.05,-1.88l-1.51,-2.54l-2.12,-1.16l-1.7,0.35l-1.61,-0.42l-2.1,1.48l-3.19,-1.83l-1.87,-0.14l-0.84,-0.6l0,0l0.05,-63.7l0,0l86.31,0l5.57,-4.95l1.2,-0.33l1.4,0.69l6.37,-1.08l1.88,1.44l3.45,-0.29l2.74,1.25l2.77,2.39l0.13,1.88l0.68,1.09l1.06,-0.68l0.98,-2l1.87,-0.83l1.07,1.1l2.08,-1l0.35,-2.01l-0.98,-2.22l2.27,-1.44l2.16,-0.71l1.28,-1.38l1.19,0.8l1.78,0.39l3.82,-0.09l0.83,-1.1l2.64,-0.73l0.81,-0.66l0,0l0.78,0.71l0.15,0.81l-0.35,2.67l0.7,2.08l-0.2,2.48l-1.71,2.24l-1.2,3.52l0.3,0.87l-1.21,6.89l-2.55,7.71l-0.14,3.35l0.75,1.43l-2.46,8.95l-3.66,6.04l0.19,3.48l-4.37,3.57l0.19,1.13l-3.61,1.52l-2.58,4.88l-1.3,0.64l-0.11,0.59l0.46,0.41l-0.35,1.39l-1.24,1.66l-0.73,4.43l-1.88,0.58l1.04,0.56l-2.83,3.59l-1.02,2.97l0.44,0.54l-0.54,2.46l-0.92,1.21l1.14,1.9l-0.17,0.88l-0.29,0.25l-0.36,-0.39l-0.02,-0.88l-0.98,0.4l0.2,1.12l-1.77,1.32l-4.1,9.49l-0.29,5.19l-0.63,0.82l-1.9,7.2l0.05,1.97l1.08,1.25l0.14,0.94l-0.01,0.45l-0.77,0.24L402.43,327.48zM392.74,302.02l0.62,-2.48l0.52,-0.73l2.31,-0.68l-3.5,-2.19l-2.85,2.1l-0.52,2.56l-0.02,1.85l1.73,2.94l0,0l1.35,0.59l0.53,-0.8L392.74,302.02z"></path>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/south-australia/" id="AU-SA" title="South Australia" d="M254.01,283.28l-1.08,1.74l-0.88,0.39l-0.93,1.59l-1.12,0.7l-0.67,1.33l-0.77,2.33l0.75,0.06l1.45,-1.02l0.15,0.69l-0.17,2.59l-0.52,0.22l-1.84,-1.95l-0.68,0.1l-0.48,1.13l-0.39,-0.01l-3.44,-4.32l-1.2,-0.78l-1.12,0.39l1.04,-2.08l0.05,0.82l1.42,1.52l0.57,0.39l1.08,-0.35l-1.23,-0.85l-1.31,-7.14l-2.47,-3.1l-2.09,-1.7l0.19,-2.15l-1.63,-3.81l-1.24,-0.48l-2.87,0.81l-0.66,-0.74l-2.11,-5.47l0.87,0.06l0.58,1.05l0.96,-1.67l-0.22,-1.14l-1.76,-1.73l-2.84,1.13l0.33,-1.76l0.73,-0.08l-1.35,-1.88l-1.78,-1.26l0.12,-0.47l-0.74,-0.23l-1.31,1.43l-3.46,-0.24l-4.14,-2.99l-2.18,-0.26l-2.79,1.3l-1.43,-0.14l-4.63,-3.88l-6.74,-3.15l-3.85,1.73l-7,-0.39L174.7,251l0,0l0.06,-70.18l0,0l97.64,-0.07l0,0l32.57,0L305,217.3l0,0l-0.05,63.7l0,0l-0.28,-0.37l-0.04,54.4l0,0l-2.93,0.11l-1.83,-0.98l-1.89,-1.9l-2.55,-4.52l-1.38,-0.52l-2.63,-3.98l0.34,-0.7l-0.54,-1.81l0.2,-1.25l1.19,-1.71l-0.42,-3.24l-1.9,-4.63l-3,-4l-3.14,-3.08l3.49,2.76l2.78,4.4l-1.02,-2.95l-5.07,-5.1l-0.02,-1.18l0.67,-0.27l0.82,0.71l0.07,1.9l1.02,-0.11l0.23,-4.21l-1.56,-0.77l-0.84,0.83l-1.79,0.39l-0.11,0.89l0.83,0.46l-0.49,0.63l-2.93,-0.25l-2.01,1.52l-3.92,0.21l-0.89,-0.67l0.65,-1.15l1.44,-0.72l1.66,-1.79l0.28,-3.05l0.53,-1.16l-0.2,-3.9l-2.4,-3.27l-0.6,-2.16l-1.38,-2.35l-0.93,1.6l0.13,1.14l-1.03,1.06l-0.38,1.31l-0.15,2.44l-1.38,5.56l-0.8,0.65l-2.75,-0.81l-2.04,0.77l-0.72,0.93l-1.51,-0.23l-1.47,0.97l-0.66,-0.69l1.14,-1.38l0.95,-3.24l0.91,0.36l1.89,-0.3l1.12,0.72l0.54,-0.29l0.7,-3.69l-0.06,-4.88l-0.45,-1.65l1,-0.85l0.64,-2.76l3.75,-4.22l-1.46,-3.64l0.33,-0.98l2.19,-0.94l-0.08,-0.66l-0.93,-0.89l-1.5,-5.68l-0.58,-0.44l-0.09,2.09l0.5,0.58l0.07,1.37l-0.36,1.86l-1.95,0.48l-1.16,1.26l-3.02,6.97l-0.74,0.62l-1.32,0.05l-0.77,-0.47l-0.93,1.64l-4.89,3.05L254.01,283.28zM271.44,303.46l1.65,0.45l0.54,1.42l-0.79,0.71l-1.29,-0.63l-1.74,-0.13l-1.53,0.72l-0.06,1.2l-1.73,1.01l-1.06,-1.08l-1.43,-0.27l-0.82,0.8l-4.75,0.17l-1.89,-1.86l0.46,-1.97l5.85,-1.43l2.14,-0.95l2.27,0.19l0.64,0.61l0.14,1.28l2.1,0.75l0.64,0.05L271.44,303.46z"></path>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/victoria/" id="AU-VIC" title="Victoria" d="M398.1,330.52l-2.92,0.82l-10.86,0.36l-5.97,2.2l-4.2,3.51l-5.42,5.71l-4.8,0.91l-2.3,-0.02l-0.38,0.57l1.21,2.21l1.25,-0.88l0.23,-0.84l0.39,0.18l0.16,3.76l-0.97,0.99l-0.81,-0.69l-0.79,-2.07l-1.14,-1.43l-0.84,-0.36l-0.68,0.6l-1.07,-0.09l-0.96,-2.84l-0.96,-0.15l-1.31,0.58l-2.08,-1.91l0.18,-1.29l1.34,-1.08l-1.21,-2.03l-2.05,0.15l-0.46,1.54l-1.98,2.04l-1.4,0.12l-1.52,-1.77l2.43,-0.51l1.59,-2.8l-0.35,-1.29l-1.97,-2.39l-4.24,3.19l-1.72,0.35l0.06,0.5l1.5,0.26l1.35,-0.65l0.75,0.21l0.05,1.01l-0.56,0.86l-3.21,0.54l-3.27,2.21l-2.38,2.93l-1.2,0.33l-2.05,1.93l-5.37,-3.08l-2.66,-0.85l-2.91,-2.25l-1.69,-0.67l-2.38,0.5l-2.12,-1.49l-2.32,-0.34l-1.42,0.75l0.33,1.08l-0.86,0.24l-1.27,-0.62l-2.83,-2.92l-2.44,-1.32l0,0l0.04,-54.4l0.28,0.37l0,0l0.84,0.6l1.87,0.14l3.19,1.83l2.1,-1.48l1.61,0.42l1.7,-0.35l2.12,1.16l1.51,2.54l0.05,1.88l0.94,0.87l0.93,2.25l0.92,0.18l0.84,-2.17l0.81,-0.48l0.82,0.81l2.89,0.62l2.31,1.26l0.16,4.01l0.5,1.1l1.69,0.72l0.35,1.69l1.89,0.68l3.52,2.26l2.81,2.59l0.56,1.28l2.28,2.67l1.34,0.78l2.34,-0.43l-0.17,-1.36l0.58,-1.62l2.7,-0.35l1.31,0.39l1.77,-0.7l3.1,2.19l5.35,0.78l2.2,-0.99l4.52,1.69l1.46,0.1l2.8,-0.73l1.01,-1.26l1.01,-0.17l1.53,0.29l0.93,-0.36l1.82,0.78l1.18,0.75l0.56,4.42l1.68,2.93l-0.99,2.48l0.98,0.08l19.25,9.7l0,0l-2.09,0.65l-1.22,1.86L398.1,330.52zM352.26,340.07l-0.78,-0.3l0.13,-1.52l1.74,0.36l0.44,0.52L352.26,340.07zM352.24,341.99l-0.9,-0.68l-1.64,0l0.76,-0.74l1.01,-0.2L352.24,341.99z"></path>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/queensland/" id="AU-QLD" title="Queensland" d="M402.43,140.14l0.66,0.82l-1.28,-3.39l0.85,-2.22l0.86,0.03l1.32,2.67l4.26,2.27l-0.64,-2.37l0.3,-0.61l0.79,0.14l0.77,1.15l-0.24,1.31l1.47,2.09l-0.69,4.67l0.61,1.26l-0.13,1.68l0.72,1.46l1.69,0.61l1.57,2.78l1.13,0.41l1.66,1.78l1.33,0.68l-0.09,0.6l0.83,-0.4l0.28,-0.89l0.48,0.14l2.71,2.71l2.15,4.63l3.65,2.42l0.43,2.21l1.78,2.95l2.57,0.52l0.42,1.76l-0.58,1.51l0.29,2.07l0.69,0.44l0.58,1.42l1.6,0.99l-1.23,4.03l0.92,9.36l-1.33,1.14l0.33,1.66l2.08,2.02l0.68,2.33l0.92,1.29l0.32,0.87l-0.24,1.63l1.04,2.06l0,0l-0.81,0.66l-2.64,0.73l-0.83,1.1l-3.82,0.09l-1.78,-0.39l-1.19,-0.8l-1.28,1.38l-2.16,0.71l-2.27,1.44l0.98,2.22l-0.35,2.01l-2.08,1l-1.07,-1.1l-1.87,0.83l-0.98,2l-1.06,0.68l-0.68,-1.09l-0.13,-1.88l-2.77,-2.39l-2.74,-1.25l-3.45,0.29l-1.88,-1.44l-6.37,1.08l-1.4,-0.69l-1.2,0.33l-5.57,4.95l-86.31,0l0,0l-0.02,-36.54l-32.57,0l0,0l0,-109.55l0,0l3.15,2.11l3.79,0.42l2.21,1.09l1.82,0.26l1.42,1.97l0.23,1.46l1.06,1.58l1.92,0.41l1.95,1.6l2.15,0.62l2.22,1.56l4.1,-0.45l4.74,-2.51l1.34,-5.09l2.58,-3.35l1,-2.26l1.52,-4.82l-0.28,-1.89l0.65,-4.14l2.23,-5.7l-1.07,-2.94l-0.49,-3.15l0.86,-3.76l-1.33,-2.17l-0.09,-1.34l0.79,-3.28l1.59,-3.09l-1.03,-3.28l1.67,-1.47l0.53,-1.47l0.65,0.2l0.82,2.19l0.09,-0.47l-0.61,-1.78l-1.8,-2.33l0.32,-0.26l-0.93,-0.21l0.25,1.11l-0.63,0.2l-0.36,-0.42l1.97,-3.51l0.8,-2.48l0.47,-0.21l0.27,1.32l1.16,-0.23l-0.84,-1.58l1.91,-6.08l0.27,-4.66l2.12,-0.59l1.1,-2.04l1.83,0.45l-1.05,1.18l-0.08,1.01l1.08,-0.85l1.47,1.25l0.47,1.03l0.84,3.42l-0.07,4.87l1.18,1.04l1.46,-0.26l1.04,0.93l-1.05,1.69l-0.27,2.14l2.15,0.87l0.04,1.16l1.64,1.1l-0.73,2.57l1.65,0.33l0.08,4.71l0.79,1.42l-0.69,3.6l0.77,2l0.92,0.97l1.05,4.34l1.14,0.82l1.35,0.01l4.59,-2.6l0.45,-1.01l0.43,0.1l0.68,1.02l0.39,2.47l0.68,0.81l2.39,0.68l0.68,1.51l3.87,2.14l-0.88,2.11l0.6,2.2l-0.44,1.29l1.21,3.23l0,2.03l1.12,1.88l-0.65,4.02l4.39,5.32l1.36,-0.47l0.26,0.32l-0.79,1.95l1.62,3.31l0.79,3.7l-0.11,2.99l-1,2.12l0.08,1.09l2.2,2.88l1.32,0.5l-0.61,4l3.12,2.93l2.15,0.49l1.33,1.33l2.02,0.45l0.73,0.69l3.18,0.11l-0.33,-1.19l1.67,2.6l0.43,2.2l0.81,1.12l1.09,0.02l-0.09,-1.33l0.66,0.01l0.98,2.1l3.34,0.61l0.86,1.04l-0.26,0.44l1.51,1.49l0.57,-0.25l-0.15,-1.39l2.39,1.75l1.04,0.19l1.8,3.48l-1.56,-0.9l-0.53,0.22l-0.8,0.99l0.67,1.8l5.27,4.19l0.27,2.3l2.2,3.52l-0.14,2.21l0.99,3.54l1.91,3.19l-0.29,1.69l1.58,-1.3L402.43,140.14zM436.13,178.32l-0.91,-0.7l-0.59,-2.15l1.32,-2.63l-0.16,-1.29l2.07,-2.83l-0.03,-0.94l-0.86,-1.18l1.33,-1.38l0.09,2.44l0.88,1.31l-2.65,6.24L436.13,178.32zM284.87,73.53l0.18,-1.81l1.54,-1.55l2.47,-0.55l2.09,0.34l0.06,0.66l-0.47,0.22l-1.18,-0.23l-1,0.4l-0.51,1.46L284.87,73.53zM416,154.42l-1.75,-2.14l-0.52,-1.75l0.48,-0.11l1.73,1.31l0.83,2.26L416,154.42zM362.4,93.15l-0.75,-0.29l-0.21,-1.04l-1.25,-1.39l1.99,0.61l0.9,1.3L362.4,93.15zM439.66,201.72l0.29,-3.84l1.17,0.02l-0.94,3.76L439.66,201.72zM439.86,197.24l-0.72,-2.02l0,-1.64l0.93,-0.51L439.86,197.24zM317.82,6.96l-0.68,-0.55l-0.05,-0.69l1.1,-0.52l0.46,1.21L317.82,6.96zM318.87,1.42l-0.98,-0.67l0.42,-0.64l0.6,-0.11l0.61,0.61L318.87,1.42zM287.91,77.87l-0.31,-0.65l1.11,-1.04l0.56,0.4l0.18,0.83l-1.28,-0.03L287.91,77.87z"></path>
        <path class="map_dir " data-href="https://paleo-cafe.com.au/directory_region/tasmania/" id="AU-TAS" title="Tasmania" d="M369.2,414.49l-0.9,0.45l-0.2,-0.45l-1.4,-0.22l-0.94,-0.71l-3.29,-0.32l-0.7,-0.68l-1.31,0.4l-0.78,-0.26l-1.15,-1.81l0.64,-0.45l2.61,0.67l0.02,-0.98l-0.77,-0.64l-0.42,0.76l-3.12,-0.54l-2.62,-4.71l-0.91,-0.2l-0.56,-0.9l-1.15,-3.62l-1.02,-0.68l-0.59,-5.21l0.2,-0.26l2.2,1.98l0.47,2.18l0.9,-2.52l-1.02,-0.36l-1.93,-2.12l-0.35,-2.13l-3.18,-4.67l-2.92,-7.17l-0.73,-4.09l0.88,-0.8l0.02,-1.66l0.66,-0.44l2.43,0.29l1.42,1.05l1.72,-0.28l9.97,5.07l3.32,-0.1l0.94,0.53l-0.05,-0.5l1.62,-1.17l0.57,0.18l0.24,0.95l1.48,0.27l-1.3,-0.84l-0.05,-0.69l2.15,-1.2l1.41,0.47l2.27,-0.46l0.66,0.59l0.78,-0.47l1.34,-2.04l0.69,-0.17l1.77,0.86l0.69,-0.4l0.76,-1.69l1.17,0.34l2.1,1.89l0.6,1.35l-0.69,2.46l0.57,2.41l-0.47,1.72l0.44,2.29l-0.54,2.92l1.08,5.94l-0.57,0.81l-0.39,-0.33l0.37,-1.68l-1.24,-2.84l-1.26,2.5l-0.82,5.93l-0.65,1.34l0.12,1.52l-0.78,0.81l-0.44,1.48l0.62,0.2l0.12,-0.68l0.96,0.98l-0.52,2.59l0.48,2.15l-1.04,-0.66l-1.19,0.94l-1.72,-2.69l-0.14,-0.71l0.95,-1.17l0.82,1.67l1.28,-0.36l-0.8,-1.4l-2.91,-1.5l-0.6,0.45l0.55,1.75l-0.29,0.58l-1.07,0.35l-0.21,-2.25l-0.98,-0.63l0.34,0.86l-1.16,3.39l0.06,2.01l-0.75,0.19l-0.87,-0.56l-0.94,-1.87l-0.46,0.27l-0.01,1l1.37,1.25L369.2,414.49zM382.36,365.85l-0.98,-0.54l-0.22,-1.36l-1.24,-2.33l-1.55,-1.38l1.32,-1.74l0.93,-0.4l2.15,2.87l1.33,0.92l0.47,3.17L382.36,365.85zM336.69,363.9l-0.38,-0.28l0.06,-1.87l-0.62,-0.81l0.03,-0.77l0.19,-2.27l0.85,-0.63l0.02,-1.18l0.46,-0.13l1.42,1.24l0.41,3.76l-0.44,1.51L336.69,363.9zM384.64,369.1l-0.23,-0.97l-2.52,0.32l-0.97,-0.42l0.02,-0.55l0.72,-0.59l1.49,0.19l1.52,-0.77l1.48,1.76L384.64,369.1zM373.39,412.93l-1.38,-0.17l-0.57,-1.19l1.92,-2.37l0.7,1.83L373.39,412.93zM499.07,600l-0.48,-0.05l-0.01,-1.54l0.62,-2.78l0.75,-0.81L499.07,600zM374.03,409.2l-0.75,-1.57l0.7,-1.22l0.82,2.48L374.03,409.2zM381.12,401.66l0.05,-1.96l1.19,-0.43l0.44,1.11l-0.76,0.01L381.12,401.66zM347.19,372.32l-0.25,-0.83l0.65,-0.77l0.98,1.12L347.19,372.32z"></path>
    </g>
</svg>          <p class="region_text_selector"></p>
        </div>
    </div>
</div>
<!-- POPUP-->
<!-- <div class="background hidden">

</div>
<div class="popup_outer hidden">
    <div class="popup_inner">
        <h4>Cafe Bone</h4>
        <p>Your Item name is added to the cart.</p>
        <a class="btn_close js_close" href=""></a>
        <div class="button_holder">
                <a class="button_popup js_continue" href="">Продовжити покупки</a>
                <a class="button_popup" href="">Перейти до оплати</a>
        </div>
    </div>
</div> -->

<script type="text/javascript" src="{{asset('js/bundle.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.animate-enhanced.min.js')}}"></script>
<script src="{{asset('js/jquery.superslides.js')}}"></script>
  
</body>