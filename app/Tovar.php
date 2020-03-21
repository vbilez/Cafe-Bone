<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tovar extends Model
{
    protected $fillable=['title','description','preview','price','category'];
    protected $table = 'tovars';

    public function categorry()
    {
        return $this->belongsTo('App\Category');
    }

  //   public function order()
  //{
 //   return $this->belongsTo('App\Order');
  // }
}
