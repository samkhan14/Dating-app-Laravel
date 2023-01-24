<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DynamicDependentController extends Controller
{
    public function index () {
        $country_list = DB::table('country_state_city')->groupBy('country')->get();
        return view('users.step2')->with(compact('country_list'));
    }
}
