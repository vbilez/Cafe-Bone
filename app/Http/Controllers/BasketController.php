<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Tovar;
use DB;
class BasketController extends Controller
{
  public function show()
  {
     if(isset($_COOKIE['basket'])) // проверяем, есть ли заказы
     {

          $orders = $_COOKIE['basket'];

          $orders=json_decode($orders); //перекодируем строку из куки в массив с объектами
     }
     else
     {
     
           $orders=[];
     }

    return view('basket',compact('orders',$orders));
  }



 public function checkout(Request $request)
  {
     if(isset($_COOKIE['basket'])) // проверяем, есть ли заказы
     {
           $orders = $_COOKIE['basket'];
           $orders=json_decode($orders); //перекодируем строку из куки в массив с объектами
     }
     else
     {$orders=[];
           return redirect('/'); //если заказ пустой, то редиректим на главную страницу
      }
     $ids=[]; //все идентификаторы товаров
     $amount=[];//количество товаров
     $total_cost=0; //общая цена заказа
     $order_id=Order::latest()->first();//получаем последний заказ
     empty($order_id)? $order_id=1:$order_id=$order_id->order_id+1; //определяемся с новым заказом, увеличивая номер последнего заказа на 1

     foreach($orders as $order)
     {
          $ids[]=$order->item_id;//создаем массив из id заказанных товаров
          $amount[$order->item_id]=$order->amount; //создаем массив с количеством каждого товара ['id товара'=>'количество товара']
     }

     $items=Tovar::whereIn('id',$ids)->get(); //выбираем все заказанные товары из базы
     foreach($items as $item)
     {
          $orders=Order::create(['item_id'=>$item->id,'price'=>$item->price,'order_id'=>$order_id,'amount'=>$amount[$item->id],'name'=>$request->name,'address'=>$request->address,'phone'=>$request->phone,'city'=>$request->city,'time1'=>$request->time1,'time2'=>$request->time2]);//сохраняем заказ в базу
          $total_cost=$total_cost+$item->price*$amount[$item->id]; //считаем общую сумму заказа
     }
    setcookie('basket',''); //удаляем куки
     $orders=Order::where('order_id',$orders->order_id)->get();//получаем только, что добавленный заказ
    
     return view('finish',compact('orders',$orders,'total_cost',$total_cost));
  }

  public function check(Request $request)
  {
    return view('check');
  }
  public function orders()
{
  $orders=DB::table('orders')->groupBy('order_id')->select('order_id',DB::raw('sum(price) as summa'))->get();
     
     return view('orders',compact('orders',$orders));
}
}
