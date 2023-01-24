<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Admin;
class AdminController extends Controller
{
    public function login(Request $request) {

    	if ($request->isMethod('post')) {
            $data = $request->input();
            
            $adminCount = Admin::where(['username'=>$data['username'],'password'=>md5($data['password']),'status'=> 1])->count();
            if($adminCount>0){
              Session::put('adminSession',$data['username']);
    			return redirect('/admin/dashboard');  
            }
    		else{ 
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
             }
    	}
    	return view('admin.admin_login');
    }

    public function dashboard()
    {
        // if (Session::has('adminSession')) {
            
        // }
        // else{
        //     return redirect('/admin')->with('flash_message_error','Please Login to Access');
        // }

        return view('admin.dashboard');
    }

    public function settings()  {
        return view('admin.settings');
    }

    public function chkPassword(Request $request)
    {
        $data = $request->all();
        $current_pwd = md5($data['current_pwd']);
        $count = Admin::where('username',Session::get('adminsession'))->where('password',$current_pwd)->count();
        if($count==1){
             echo "true"; die;
         } 
         else{ echo "false"; die;}
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $check_password   = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password))
            {
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password' => $password]);
                return redirect('/admin/settings')->with('flash_message_success','Password Has been Updated !');
            } 
            else{
               return redirect('/admin/settings')->with('flash_message_error','Password not Updated yet !');
            }           
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logout Successfully');
    }


}
