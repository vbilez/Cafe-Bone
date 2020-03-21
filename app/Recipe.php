<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $fillable=['title','description','preview','head'];
    protected $table = 'recipes';

  public function getShortTextAttribute()
  {
  	
  		$sub=mb_substr($this->head, 0, 117);
  		if(strlen($sub)<117) {return $sub;}
  			else {
      return $sub."...";
      }
  }
}
