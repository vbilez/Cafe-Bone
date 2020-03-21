@extends('mainpage')

@section('content')
<div class="row">
        @foreach ($tovars as $c )

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <div class="card" data-no-turbolink="">
        <div class="thumbnail">
             
             <div style="
             background-image:url('{{$c->img}}');
  height:270px;
  width:360px;
  background-size:cover;
  "></div>
             <a href="/article/{{$c->id}}">
            <div class="thumb-cover">
            </div></a>
            <div class="details">

        </div>
    </div>
     <div class="card-info-container">
            <div class="card-info">
                <div class="moving">
                    <a href="/article/{{$c->id}}">
                        <h3>{{$c->title}}
                        <!--    <div class="time pull-right">{{$c->id}}</div>-->
                        </h3>
                    <p>{{$c->short_text}}</p></a>              
                </div>
            </div>
        </div></div></div>

        <!-- {{$c->category}} -->
    @endforeach
</div>

    @include('errors.list')
@stop