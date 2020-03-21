
@extends('mainpage')

@section('content')
<link rel="stylesheet" href="{{asset("css/cards2.css")}}"/>
<div style="margin-bottom:25px;"></div>
<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @foreach ($rc as $c )

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <div class="card2" data-no-turbolink="">
        <div class="thumbnail2">
             
             <div style="
             background-image:url('{{$c->preview}}');
  height:270px;
  width:100%;
  background-size:cover;
border-radius: 6px 6px 0 0;
  "></div>
             <a href="/recipe/{{$c->id}}">
            <div class="thumb-cover2">
            </div></a>
            
    </div>
     <div class="card-info-container2">
            <div class="card-info2">
                <div class="moving2">
                    <a href="/recipe/{{$c->id}}">
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