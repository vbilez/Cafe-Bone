@extends('mainpage')

@section('content')

<div class="container">
<div class="row">
  <table class="table">
    <tr>
    <th>№</th>
    <th>Зображення</th>
    <th>Назва</th>
    <th>Заголовок</th>
    <th>Опис</th>
    
<th></th>
  </tr>
        @foreach ($recipe as $c )


 <tr>
    <td width=50>{{$c->id}}</td>
      <td width=170><img height="100" width="150"src="{{$c->preview}}" ></td>
      <td width=200><b>{{$c->title}}</b></td>
      <td width=200><b>{{$c->head}}</b></td>
      <td width=400>{{$c->description}}</td>
    
      <td width=50><a href='/recipe/{{$c->id}}/edit'</a><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
      <td width=50><a href='/recipe/{{$c->id}}/delete'</a><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
 </tr>

       

        <!-- {{$c->category}} -->
    @endforeach
    </table>
 </div>
</div>
<div style="margin-bottom:55px;"></div>
    @include('errors.list')
@stop