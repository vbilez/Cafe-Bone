@extends('mainpage')

@section('content')

<div class="container">
     <table class="table">
         <tr>
            <th>Номер замовлення</th>
            <th>Сума замовлення</th>
            <th>Дія</th>
         </tr>
      @foreach($orders as $order)
         <tr>
            <td>{{$order->order_id}}</td>
            <td>{{$order->summa}}</td>
           <td><a href="/orders/{{$order->order_id}}"><i class="glyphicon glyphicon-eye-open"></i> Дивитись </a></td>
        </tr>
     @endforeach
     </table>
</div>
<div style="margin-bottom:140px;"></div>
@stop