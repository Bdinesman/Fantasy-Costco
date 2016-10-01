<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Auth::check()){
            $request->session()->flash('alert','info');
            $request->session()->flash('message','Please sign in to view your account');
            return redirect('/login');
        }
        $user=Auth::user();
        $data=compact('user');
        return view('dashboard',$data);
    }
    public function checkIfAvailable(Request $request){       
        if(!$request->ajax()){
           return abort(403);
        }
        $username=$request->session()->get('username');
        $count=\App\User::where('username',$username)->get()->count();
        if($count==0){
            return response()->json(['alert'=>'success','message'=>$count]);
        }
        return response()->json(['alert'=>'danger','message'=>'This username is already taken']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new \App\User();
        $user->email=$request->input('email');
        $user->username=$request->input('username');
        $user->password=bcrypt($request->input('password'));
        $user->first_name=$request->input('first_name');
        $user->last_name=$request->input('last_name');
        $user->phone_number=$request->input('phone_number');
        $user->address_line_1=$request->input('address_line_1');
        $user->address_line_2=$request->input('address_line_2');
        $user->zip_code=$request->input('zip_code');
        $user->state=$request->input('state');
        $user->save();
        var_dump($user);
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
