@extends('mainpage')

@section('content')
@if(count($orders)!=0)
<?php $shapka=count($orders);?>
@else
<?php $shapka=0;?>
@endif
<nav class="navbar  navbar-default">
     <div class="container">
          <p class="navbar-text">Магазин</p>
          <a href="/basket" class=" navbar-link navbar-text navbar-right"><span style="font-size:1.5em;" class="glyphicon glyphicon-shopping-cart basket"></span><span class="badge pull-right count_order">{{$shapka}}</span></a>
     </div>
</nav>
<div class="container">
     <div class="row">
          @if(count($orders)==0)
               <h2>Ничего не выбрано</h2>
          @else
     <h2>Ваш заказ</h2>
     <table width=100% class="table-responsive table-striped">
         <thead>
             <tr>
                <th>Идентификатор</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Итого</th>
                <th>Действие</th>
             </tr>
        </thead>
     @foreach($orders as $order)
          <tr>
              <td>{{$order->item_id}}</td>
              <td><img height=50 src="{{$order->img}}"></td>
              <td>{{$order->title}}</td>
              <td>{{$order->price}}</td>
              <td><input class="total" type="text" value="{{$order->amount}}"/> <button type="button" class="btn btn-default plus">+</button> <button type="button" class="btn btn-default minus">-</button></td>
              <td class="price_order">{{$order->price*$order->amount}}
              <td><button type="button" class="btn btn-danger del_order">Удалить</button></td>
          </tr>
     @endforeach
     </table>
@endif
     </div>
</div>
@stop