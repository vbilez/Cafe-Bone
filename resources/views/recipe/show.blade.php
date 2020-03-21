
@extends('mainpage')

@section('content')
<?php $tx=$recipe->description ?>
<style>
	pre
{
  font-family: Arial,Consolas, Menlo, Monaco, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
  border-radius: 0;
}
</style>
<div style="margin-bottom:25px;"></div>

<ul style="list-style:none;">
    <div class="row"  > 
<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
<li class="b-prev-articles__list-item g-clearfix" style="max-width:500px;">
                    <a class="b-prev-articles__list-item__image-outer " href="/recipe/{{$recipe->id}}">
                        <img class="b-prev-articles__list-item__image " style="width:499px; height:300px;"src="{{$recipe->preview}}" alt="{{$recipe->title}}">
                    </a>
                   
            
            <pre class="">{{$tx}}</pre>
            
</li><br>
           
                
 </div>
</div>
            </ul>
<div style="margin-bottom: 45px;"></div>
                 @include('errors.list')
@stop