<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts() {
      public $timestamps = false;
      return $this->belongsToMany('App\Post');
    }
}
