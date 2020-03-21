@extends('mainpage')

@section('content')
<div class="container">
	<div class="row">
{!! Form::open(['action' => 'CategorysController@store','files' => 'true']) !!}
<div class="form-group">
    {!! Form::label('title','Введіть назву категорії:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('img','Завантажте картинку для категорії:') !!}
    {!! Form::file('img',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('OK',['class'=>'btn btn-primary form-control']) !!}

</div>
{!! Form::close() !!}

@include('errors.list')
</div>
</div>
@stop