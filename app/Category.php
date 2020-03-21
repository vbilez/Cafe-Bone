<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categorys";
	 protected  $fillable =[
        'title',

         'img'
    ];

     public function tovars()
    {
        return $this->hasMany('App\Tovar');
    }
}
