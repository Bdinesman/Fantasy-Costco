<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function authenticate(Request $request){
        $email=$request->input('username/email');
        $username=$request->input('username/email');
        $password=$request->input('password');
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
                if (Auth::attempt(['username' => $username, 'password' => $password])) {
                // Authentication passed...
                return redirect()->intended('/');
            }
            return "Username:$username & Password:$password";
            return back();
        }
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }

    public function getLogin(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $reqeust)
    {
        //$user=$request->session()->user();
        //$data=compact('user');
        return 'Currently under development';
        return view('home');
    }
    public function search(Request $request){
        if(!$request->has('search')){
            $items=\App\Item::all();
        }
        $keywordsArray=[];
        foreach ($items as $item) {
            $keywords=explode(',',$item->keywords);
            foreach ($keywords as $keyword) {
                if(!in_array($keyword,$keywordsArray)){
                    $keywordsArray[]=trim($keyword);
                }
            }
        }
        $string[]='[';
        foreach ($keywordsArray as $word) {
            $string[0].="'$word',";
        }
        $string[0].=']';
        $data=compact('items','string');
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
