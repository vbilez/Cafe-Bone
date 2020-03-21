@extends('mainpage')

@section('content')


</center>
<center><h3>Всього категорій: {{$count}}</h3></center><br>
<div class="container">
<div class="row">
  <table class="table">
    <tr>
    <th>ID</th>
    <th>img</th>
    <th>Title</th>
   
<th>E</th>
<th>D</th>
  </tr>
        @foreach ($categories as $c )

  
 <tr>

    <td >{{$c->id}}</td>
    <td width=170><img height="100" width="150"src="{{$c->img}}" ></td>
    <td><b>{{$c->title}}</b></td>
    
    <td ><a href='/category/{{$c->id}}/edit'</a><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
    <td ><a href='/category/{{$c->id}}/delete'</a><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
 </tr>

       

        <!-- {{$c->category}} -->
    @endforeach
    </table>
</div>
</div>
    @include('errors.list')
@stop
