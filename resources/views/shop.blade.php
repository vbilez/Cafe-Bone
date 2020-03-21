@extends('mainpage')

@section('content')

<div class="sve_holder">
        <header>
            <div class="top_banner_directory top_banner">
                
            </div>
            <div class="beauty_banner" id="beauty_banner"><p class="beauty_title" id="beauty_title">Магазин</p></div>
        </header>
<div class="shopMenu">
    <div class="shopMenuInner">
        <ul class="shopMenuInnerList">
            <li>
                <a href="/search">Пошук</a>
            </li>
            <li>
                <a href="">Категорії</a>
                        <span class="dropdown_indicator"></span>
        <div class="dropdown_indicator_drp"><div class="dropdown_indicator_drp_inner"></div></div>
        <div class="ca_dropdown">
            <div class="ca_dropdown_inner">
                <div class="ca_dropdown_pader">
                    <div class="ca_dropdown_left categories_shop_image">
                        <p class="ca_dropdown_title">Категорії</p>
                        <div class="detHolder">
                                                                                                <ul class="oneColumnHolderCat">
@foreach ($cat as $c )
  <li class="oneDropdownShop" data-img="{{$c->img}}">
  <a href="/category/{{$c->id}}"> {{$c->title}}  </a>
  <div class="hiddenDescription">
  </div>
  <div class="hiddenTitle">
  {{$c->title}}</div>
  </li>
  @endforeach
                                        
  </ul>
  
                        </div>
                    </div><!--
                    --><div class="ca_dropdown_right categories_shop_image">
                        <div class="ca_dropdown_right_inner">
                            <div class="rightTextPart">
                                <h3 class="dropdown_title"></h3>
                                <p class="dropdown_content"></p>
                            </div><!--
                            --><div class="left_imagePart" id="left_imagePart">
                                <img class="categoryImage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    </li>
            <li>
                <a href="/spec">Спец</a>
           </li>
            <li>
                <a href="/info">Інфо</a>
            </li>
        </ul>
    </div>
</div><input type="hidden" name="found_posts" id="found_posts" value="544">
<input type="hidden" name="ajax_posts_per_page" id="ajax_posts_per_page" value="40">
<div class="shopArchiveSizer" style="margin-top:60px">
    <p class="dir_title" style="line-height: 41.4px;">“Знати те, що хочеш, <br>це перший крок до отримання цього”<br><span class="normal_title" style="font-size:19px;">Мей Вест</span></p>
    <div class="shopIntroText">
        <p style="font-size:20px;"><strong>Ваше здоров'я і щастя на пріоритет!<br> Ми робимо якісну їжу для дорослих і дітей!<br> Купуйте те, що вам подобається в нашому кафе! </strong></p>
<p><i><strong>Поліна Тищенко і Ко</strong></i></p>
    </div>
   <div style="margin-bottom:20px;">
    </div>
     <div class="shopIntroText">
   <img wigth="60" height="60" src="/images/heart.jpg"/>     <p style="font-size:20px;color:red;font-family:Arial;"><strong>Увага! Купуючи товари в цьому магазині,<br>ви маєте можливість допомогти хворим дітям з ДЦП або діабетом.</strong></p>
   <p style="font-size:20px;color:red;font-family:Arial;"><strong>Діти отримають 15% сумми покупки, на них буде куплена спеціальна ложка для неспроможних їсти руками та інші засоби допомоги.</strong></p>
<p style="font-size:20px;color:red;font-family:Arial;"><i><strong>Допоможіть тому, хто потребує!</strong></i></p>
    </div>
</div>







</div>
  @include('errors.list')
@stop