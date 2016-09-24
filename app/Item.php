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
    	$averageArray=[];
    	foreach ($ratings as $key => $rating) {
    		$averageArray[]=$rating->rating;
    	}
    	$numberOfResponses=count($averageArray);
    	if($numberOfResponses>0){
    		$average=array_sum($averageArray)/$numberOfResponses;
    	}else{
    		$average=0;
    	}
    	$data=compact('ratings','average','numberOfResponses');
    	return $data;
    }
}
