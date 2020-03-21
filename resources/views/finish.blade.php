@extends('mainpage')

@section('content')
<div class="container">
  <header>
            <div class="top_banner_directory top_banner">
                
            </div>
           
</header>
     <h2 style="color:#f36f21">Ваше замовлення прийнято!</h2>
     <div style="margin-bottom:10px;"> </div>
     <table width=90%   class="" cellspacing="2" cellpadding="2">
          <thead height="40" style="height:40px;">
                   <th style="text-align: center;padding:10;">Ідентифікатор</th>
                   <th style="text-align: center;padding:10;">Зображення</th>
                   <th style="text-align: center;padding:10;">Назва</th>
                   <th style="text-align: center;padding:10;">Ціна</th>
                   <th style="text-align: center;padding:10;">Кількість</th>
                   <th style="text-align: center;padding:10;">Всього</th>
                </tr>
          </thead>
         @foreach($orders as $order)
             <tr style="color:#f36f21;padding:10;">
                <td align="center" style="text-align: center;padding:10;">{{$order->item_id}}</td>
                <td align="center" style="text-align: center;padding:10;" ><img  style="max-width:50px;" width="50"  src="{{$order->tovars->preview}}"></td>
                <td align="center" style="text-align: center;padding:10;">{{$order->tovars->title}}</td>
                <td align="center" style="text-align: center;padding:10;">{{$order->price}}</td>
                <td align="center" style="text-align: center;padding:10;">{{$order->amount}}</td>
                <td align="center" style="text-align: center;padding:10;">{{$order->price*$order->amount}}
             </tr>
           </br>
         @endforeach
     </table>
     <h2 style="color:#f36f21">Сума замовлення всього: &emsp;{{$total_cost}}  </h2>
     <hr>
     <h2 style="color:#f36f21">Інформація про доставку</h2>
     <span style="color:#f36f21">Місто: </span>{{$orders[0]->city}}<br>
     <span style="color:#f36f21">Адреса:</span>{{$orders[0]->address}}<br>
     <span style="color:#f36f21">Ім'я:</span> {{$orders[0]->name}}<br>
     <span style="color:#f36f21">Телефон: </span>{{$orders[0]->phone}}<br>
     <span style="color:#f36f21">Години: </span>{{$orders[0]->time1}}&nbsp;-&nbsp;{{$orders[0]->time2}}<br>

</div>
@stop