	@extends('mainpage')

@section('content')
<div class="container">
	<div class="row">
{!! Form::open(['action' => 'RecipesController@store','files'=>true]) !!}
<div class="form-group">
    {!! Form::label('title','Назва рецепту:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('head','Короткий опис:') !!}
    {!! Form::text('head',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('preview','Завантажте картинку:') !!}
    {!! Form::file('preview',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description','Опис рецепту:') !!}
    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Створити',['class'=>'btn btn-primary form-control']) !!}

</div>
{!! Form::close()!!}
@include('errors.list')
</div>
</div>

@stop

