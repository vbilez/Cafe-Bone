@extends('mainpage')

@section('content')

<div class="container">
<div class="row">
  <table class="table">
    <tr>
    <th>№</th>
    <th>Зображення</th>
    <th>Назва</th>
    <th>К-я</th>
    <th>Опис</th>
    <th>Ціна</th>
<th></th>
  </tr>
        @foreach ($tovars as $c )
@if(true)
<?php
$cat='';
  if(!empty($categorys[$c->category]))
  {
  $cat=$categorys[$c->category];
}
?>
@endif

 <tr>
    <td width=50>{{$c->id}}</td>
      <td width=170><img height="100" width="150"src="{{$c->preview}}" ></td>
      <td width=200><b>{{$c->title}}</b></td>
      <td width=50><b>{{$cat}}</b></td>
      <td width=400>{{$c->description}}</td>
      <td width=50>{{$c->price}}</td>
      
      <td width=50><a href='/tovar/{{$c->id}}/edit'</a><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
      <td width=50><a href='/tovar/{{$c->id}}/delete'</a><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
 </tr>

       

        <!-- {{$c->category}} -->
    @endforeach
    </table>
 </div>
</div>

    @include('errors.list')
@stop