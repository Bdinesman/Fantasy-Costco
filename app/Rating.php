<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function items(){
    	return $this->hasMany('\App\Item','item_id','item.id');
    }
    public function author(){
    	$author=\App\User::where('id',$this->user_id)->first()->username;
    	return $author;
    }
}
