<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function carts(){
    	$this->belongsTo('App\Cart','id');
    }
}
