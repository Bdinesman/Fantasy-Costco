<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function addRating(Request $request){
        if(!$request->ajax()){
           abort(403);
        }
        $item_id=strip_tags($request->input('item_id'));
        $user_id=strip_tags(Auth::user()->id);
        $previousReviews=\App\Rating::where('user_id',$user_id)->where('item_id',$item_id)->count();
        //Check if they have already submitted a review
        if($previousReviews>0){
            return response()->json(['alert'=>'alert-info','message'=>'You have already submitted a review for this product']);
        }
        $rating=intval(strip_tags($request->input('rating')));
        if($rating>5 || $rating<1){
            return response()->json(['alert'=>'alert-warning','message'=>'Review could not be uploaded']);
        }
        $response=strip_tags($request->input('review'));
        $title=strip_tags($request->input('title'));
        $newRating = new \App\Rating();
        //Check to see if they have already posted a review
        $newRating->item_id=$item_id;
        $newRating->user_id=$user_id;
        $newRating->rating=$rating;
        $newRating->review=$response;
        $newRating->title=$title;
        //Ensure that values weren't tampered with
        $newRating->save();
        return response()->json(['alert'=>'alert-success','message'=>'Review added!']);
    }
    public function addToCart(Request $request){
        if(!Auth::check()){
            //Flash to session please login
            $alert=$request->session()->flash('alert','info');
            $message=$request->session()->flash('message','You must be logged in to use the cart');
            return redirect('/login');
        }
        $cart = new \App\Cart();
        $cart->user_id=Auth::user()->id;
        $cart->quantity=$request->quantity;
        $cart->item_id=$request->item_id;
        $cart->save();
        return $cart;
    }
    public function viewCart(Request $request){
        if(!Auth::check()){
            $request->session()->flash('alert','info');
            $request->session()->flash('message','You must be logged in to use the cart');
            return redirect('/login');
        }
        $total=0;
        $carts=\App\Cart::where('user_id',Auth::user()->id)->get();
        foreach ($carts as $key => $cart) {
            foreach ($cart->items as $key => $item) {
                $total+=($item->item_price * $cart->quantity);
            }
        }
        $data=compact('carts','total');
        return view('users.view_cart',$data);
    }
    public function checkout(Request $request){
        if(!Auth::check()){
            return redirect('/login');
        }
        $user=\App\User::where('id',Auth::user()->id)->first();
        $total=0;
        foreach ($request->cart as $key => $value) {
            if(intval($value['item_id'])<=0){
                return back();
            }
            $item=\App\Item::where('id',intval($value['item_id']))->first();
            if(sizeof($item)==0){
                return back();
            }
            $quantity=intval($value['quantity']);
            $total+=$item->item_price * $quantity;
        }
        if($total>$user->gold){
            $alert=$request->session()->flash('alert','danger');
            $message=$request->session()->flash('message','Insufficent Funds');
            $data=compact('alert','message');
            return redirect()->back();
        }
        $user->gold=$user->gold-$total;
        $user->save();
        $carts=\App\Cart::where('user_id',$user->id)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return $user->gold;
    }
    public function authenticate(Request $request){
        $email=$request->input('username/email');
        $username=$request->input('username/email');
        $password=$request->input('password');
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
                if (Auth::attempt(['username' => $username, 'password' => $password])) {
                    $request->session()->flash('alert','success');
                    $request->session()->flash('message','You have successfully logged in');
                return redirect()->intended('/');
            }
            $request->session()->flash('alert','danger');
            $request->session()->flash('message','Invalid username/email or password');
            return back();
        }
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }
    public function logout(Request $request){
        if(Auth::check()){
            Auth::logout();
            $request->session()->flash('alert','success');
            $request->session()->flash('message','You have successfully logged out');
            return redirect('/');
        }
        return back();
    }
    public function getLogin(Request $request){
        if(Auth::check()){
            return redirect('/');
        }
        $data=compact('request');
        return view('login',$data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $message="Currently under development";
        $javascript="";
        $data=compact('message','javascript','request');
        return view('home',$data);
    }
    public function search(Request $request){
        $search=$request->get('category');
        $range=$request->get('range');
        if(!empty($request->get('category'))){
            $category=ucfirst($request->get('category'));
        }
        if($request->has('keyword')){
                $items=\App\Item::where('keywords','like','%' . $request->get('keyword') . '%')->get();
        }
        if(isset($category)){
            if(isset($items)){
                $items=$items->where('category',$category);
            }else{
                $items=\App\Item::where('category',$category)->get();
            }
        }
        if(isset($range)){
            if(!isset($items)){
                $items=\App\Item::all();
            }
            if($range=='<50'){
                $items=$items->filter(function($item){
                    return $item->item_price < 50;});
                }
                if($range=='50-100'){
                    $items=$items->filter(function($item){
                    return $item->item_price > 50 && $item->item_price<=100;});
                }
                if($range=='100-500'){
                    $items=$items->filter(function($item){
                    return $item->item_price > 100 && $item->item_price<=500;});
                }
                if($range=='500-1000'){
                    $items=$items->filter(function($item){
                    return $item->item_price > 500 && $item->item_price<=1000;});

                }
                if($range=='>1000'){
                    $items=$items->filter(function($item){
                    return $item->item_price > 1000;});
                }
        }
        if(!isset($items)){
            $items=\App\Item::all();
        }
        $categories=$items->groupBy('category');
        $keywords=[];
        foreach ($items as $item) {
            foreach(explode(',',$item->keywords) as $keyword){
                if(!empty($keyword)){
                    $keywords[]=$keyword;
                }
            }
        }
        $keywords=array_unique($keywords);
        $prices=['Less than 50'=>0,'50-100'=>0,'100-500'=>0,'500-1000'=>0,'More than 1000' =>0];
        foreach($items->groupBy('item_price') as $price=>$value){
            if(intval($price)<50){
                $prices['Less than 50']+=count($value);
            }
            if(intval($price)>=50 && intval($price)<100){
                $prices['50-100']+=count($value);
            }
            if(intval($price)>=100 && intval($price)<500){
                $prices['100-500']+=count($value);
            }
            if(intval($price)>=500 && intval($price)<1000){
                $prices['500-1000']+=count($value);
            }
            if(intval($price)>1000){
                $prices['More than 1000']+=count($value);
            }
        }
        $data=compact('items','search','categories','keywords','prices');
        return view('search',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
