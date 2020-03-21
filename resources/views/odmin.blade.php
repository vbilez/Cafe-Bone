@extends('mainpage')

@section('content')
<nav class="navbar navbar-inverse navbar-fixed-top navbar-ct-black">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Cafe Bone</a>
        </div>
          <ul class="nav navbar-nav">
              <li>
                  <a href="/addtovar"><i class="pe-7s-plus"></i><p>Новий товар</p></a>
              </li>
              <li>
                  <a href="/category/create"><i class="pe-7s-angle-up-circle"></i><p>Нова категорія</p></a>
              </li>
              <li>
                  <a href="/recipe/create"><i class="pe-7s-plus"></i><p>Новий рецепт</p></a>
              </li>
              <li>
                  <a href="/category"><i class="pe-7s-menu"></i><p>Список категорій</p></a>
              </li>
                <li>
                  <a href="/viewtovars"><i class="pe-7s-cart"></i><p>Список товарів</p></a>
              </li>
               <li>
                  <a href="/orders"><i class="pe-7s-note"></i><p>Список замовлень</p></a>
              </li>
              <li>
                  <a href="/viewrecipes"><i class="pe-7s-coffee"></i><p>Рецепти</p></a>
              </li>         
          </ul>
        
      </div>
    </nav>
@stop