<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
            // made a relation with users detail table
    public function details(){
        return $this->hasOne('App\UsersDetail','user_id');
    }

    public function photos () {
        return $this->hasMany('App\UsersPhoto','user_id');
    }
            // fetching data in secondry header and step2 form for access the menu and page
    public static function datingProfileExist($user_id) {
        $datingcount = UsersDetail::select('user_id','status')->where(['user_id'=>$user_id,'status'=>1])->count();
        return $datingcount;
    }
        // fetching data in step2 file for access the form for update
    public static function datingProfileDetails($user_id){
        $datingprofile = UsersDetail::where('user_id',$user_id)->first();
        return $datingprofile;
    }

    //get name for response page
    public static function getName($user_id){
        $getName = User::select('name')->where('id',$user_id)->first();
        return $getName->name;
    }

    //get city for response page
    public static function getCity($user_id){
        $getCity = UsersDetail::select('city')->where('user_id',$user_id)->first();
        return $getCity->city;
    }

    public static function getUserName($user_id){
        $getusername = User::select('username')->where('id',$user_id)->first();
        return $getusername->username;
    }

    public static function getUserId($username) {
        $getUserId = User::select('id')->where('username',$username)->first();
        return $getUserId->id;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
