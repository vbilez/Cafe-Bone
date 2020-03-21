	@extends('mainpage')

@section('content')
<div class="container">
	<div class="row">
{!! Form::open(['action' => 'TovarsController@save','files'=>true]) !!}
<div class="form-group">
    {!! Form::label('title','Назва товару:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>



<div class="form-group">
    {!! Form::label('preview','Завантажте картинку:') !!}
    {!! Form::file('preview',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category','Категорія:') !!}
    {!! Form::select('category',$categorys,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Опис товару:') !!}
    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('price','Ціна:') !!}
    {!! Form::text('price',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('OK',['class'=>'btn btn-primary form-control']) !!}

</div>
{!! Form::close()!!}
@include('errors.list')
</div>
</div>

@stop

