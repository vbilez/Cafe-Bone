<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['item_id','order_id','price','amount','name','address','phone','city','time1','time2'];

     public function tovars() //этот метод нам понадобится чуть позже
     {
          return $this->belongsTo('App\Tovar', 'item_id', 'id');    //связь один к одному
     }
     
}
