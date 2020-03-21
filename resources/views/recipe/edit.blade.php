	@extends('mainpage')

@section('content')
<div class="container">
	<div class="row">
{!! Form::open(array('method'=>'PUT','url'=>array('recipe',$recipe->id),'files'=>'true') ) !!}
<div class="form-group">
    {!! Form::label('title','Назва рецепту:') !!}
    {!! Form::text('title',$recipe->title,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('head','Короткий опис (117 символів):') !!}
    {!! Form::text('head',$recipe->head,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('preview','Завантажте картинку (або пропустіть щоб лишити попередню):') !!}
    {!! Form::file('preview',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description','Опис рецепту:') !!}
    {!! Form::textarea('description',$recipe->description,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Зберегти',['class'=>'btn btn-primary form-control']) !!}

</div>
{!! Form::close()!!}
@include('errors.list')
</div>
</div>

@stop

