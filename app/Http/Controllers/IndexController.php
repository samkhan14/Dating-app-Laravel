<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
{
    public function Index()
    {
        $recent_users = User::with('details')->with('photos')->where('admin','!=','1')->orderBy('id','desc')->get();
        $recent_users = json_decode(json_encode($recent_users));
       // echo "<pre>"; print_r($recent_users); die;
    	return view('index')->with(compact('recent_users'));
    }
}
