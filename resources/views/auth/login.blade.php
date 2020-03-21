
<head>
	<link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}"/>
</head>
<div style="margin-top: 20px;"></div>
<div class="container">
{!! Form::open(['method'=>'POST','url' => '/login2']) !!}

<div class="form-group">
    {!! Form::label('login','Логін:') !!}
    {!! Form::text('login',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('pass','Пароль:') !!}
    {!! Form::password('pass',['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Ввійти',['class'=>'btn btn-primary form-control']) !!}

</div>

@include('errors.list')
{!! Form::close() !!}
</div>