@extends('mainpage')

@section('content')

<div class="container">
	<hr>
<h2>Інформація про доставку</h2>
{!! Form::open(['method' => 'POST','action' =>'BasketController@checkout']) !!}
<label for="name">Ваше імя і прізвище</label><br>
<input class="form-control" type="text" name="name"/><br>

<label  for="address">Місто доставки</label><br>
<input class="form-control" type="text" name="city" value="Львів"/><br>
<label  for="address">Адреса доставки</label><br>
<input class="form-control" type="text" name="address"/><br>
<label  for="address">Час доставки від:</label><br>
<input type="time" class="form-control" type="text" name="time1" style="width:100px;"/><br>
<label  for="address">Час доставки до:</label><br>
<input type="time" class="form-control" type="text" name="time2" style="width:100px;"/><br>
<label for="phone">Телефон</label><br>
<input class="form-control" type="text" name="phone"/><br>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<button type="submit" class="btn btn-warning btn-lg">Замовити</button>
{!! Form::close()!!}
	</div>
	<div style="margin-bottom:140px;"></div>

@stop