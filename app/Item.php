<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function carts(){
    	return $this->belongsTo('App\Cart','id');
    }
    public function ratings(){
    	$ratings=\App\Rating::where('item_id',$this->id)->get();
    	return $ratings;
    }
    public function average_rating(){
    	$ratings=$this->ratings();
		$averageArray=[];
    	if(count($ratings)==0){
    		return 0;
    	}
    	foreach ($ratings as $rating) {
    		$averageArray[]=$rating->rating;
    	}
    	return (array_sum($averageArray)/count($ratings));
    }
}
