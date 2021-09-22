<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class UserController extends controller

{   
    //
    public function test(){
        // $obj =new \stdClass();
    //    $obj -> name= 'ahmed';
    $data=['ali','jaky'];
    // return view('welcome')-> with('name','koory');
    return view('welcome',compact('data'));
    }

}





