@extends('mainpage')

@section('content')

{!! Form::open(['method' => 'PATCH','action' =>['CategorysController@update',$categorie->id],'files' => 'true']) !!}
<div class="form-group">
    {!! Form::label('title','Enter category new name:') !!}
    {!! Form::text('title',$categorie->title,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('img','Upload your image:') !!}
    {!! Form::file('img',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('OK',['class'=>'btn btn-primary form-control']) !!}

</div>
{!! Form::close()

!!}
@include('errors.list')
@stop