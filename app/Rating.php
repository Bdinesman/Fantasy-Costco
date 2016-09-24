<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function items(){
    	return $this->hasMany('\App\Item','item_id','item.id');
    }
}
