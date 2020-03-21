@extends('mainpage')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($categories as $c )

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="card" data-no-turbolink="">
                    <div class="thumbnail">

                        <div style="
                                  background-image:url('{{$c->img}}');
                                height:270px;
                                width:360px;
                                background-size:cover;
                                background-color:  {{$c->color}};
                                "></div>
                        <a href="/category/{{$c->id}}">
                            <div class="thumb-cover">
                            </div></a>
                        <!-- <div class="details"></div>-->
                    </div>

                     <div class="card-info-container">
                        <div class="card-info">
                            <div class="moving">
                                <a style="color: {{$c->color}}" href="/category/{{$c->id}}"><h3>{{$c->title}}</h3>
                                   </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--  {{$c->category}} -->
        @endforeach
    </div>
</div>

    @include('errors.list')
@stop