<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\User;
use App\UsersDetail;
use App\Country;
use App\Language;
use App\Hobby;
use App\UsersPhoto;
use App\ Response;
use App\Friend;
use File;
use Image;
use Session;
use Auth;


class UsersController extends Controller
{
    public function register(Request $request)
    {

        if ($request->isMethod('post'))
        {
            $data = $request->all();
            $user = new User;
            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            if (Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'admin' => '0']))
            {
                Session::put('frontSession', $data['username']);
                return redirect('/step/2');
            }

        }
        return view('users.register');
    }

    public function dashboard(){
        $user = Auth::user()->id;
        $user_detail = UsersDetail::where('user_id',$user)->first();
        $uname = $user_detail->username;
        return view('users.Dashboard')->with(compact('uname'));

    }

    // persnol info form
    public function step2(Request $request)
    {
        // check persnol info exist
        $UserProfileCount = UsersDetail::where(['user_id' => Auth::user() ['id'], 'status' => 0])->count();
        if ($UserProfileCount > 0)
        {
            return redirect('/review');
        }
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['user_id']))
            {
                $user_detail = new UsersDetail;
                $user_detail->user_id = Auth::User() ['id'];
            }
            else
            {
                $user_detail = UsersDetail::where('user_id', $data['user_id'])->first();
                $user_detail->status = 0;
            }
            $user_detail->username = Session::get('frontSession');
            $user_detail->dob = $data['dob'];
            $user_detail->gender = $data['gender'];
            $user_detail->height = $data['height'];
            $user_detail->marital_status = $data['marital_status'];
            $user_detail->body_type = $data['body_type'];
            $user_detail->city = $data['city'];
            $user_detail->state = $data['state'];
            $user_detail->country = $data['country'];
            $user_detail->education = $data['education'];
            $user_detail->occupation = $data['occupation'];
            $user_detail->income = $data['income'];
            $user_detail->about_myself = $data['about_myself'];
            $user_detail->about_partner = $data['about_partner'];

            $hobbies = "";

            foreach ($data['hobbies'] as $hobby)
            {
                $hobbies .= $hobby . ', ';
            }

            $user_detail->hobbies = $hobbies;

            $languages = "";
            foreach ($data['languages'] as $language)
            {
                $languages .= $language . ',';
            }

            $user_detail->languages = $languages;

            $user_detail->save();
            return redirect('/review');

        }

        $countries = Country::get();

        $language = Language::orderby('name', 'asc')->get();

        $hobbies = Hobby::orderby('title', 'ASC')->get();

        return view('users.step2')
            ->with(compact('countries', 'language', 'hobbies'));

    }

    public function login(Request $request)
    {

        if ($request->isMethod('post'))
        {
            $data = $request->input();
            // echo "<pre>"; print_r($data); die;
            if (Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'Admin' => '0']))
            {
                if(preg_match("/contact/i",Session::get('current_url'))){
                Session::put('frontSession', $data['username']);
                return redirect(Session::get('current_url'));
                }
                else{
                    Session::put('frontSession',$data['username']);
                    return redirect('/dashboard');
                }
            }
            else
            {
                return redirect::back()->with('flash_message_error', 'Invalid Email or Password');
            }

        }
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('frontSession');
        return redirect()
            ->action('IndexController@index');
    }

    public function checkEmail(Request $request)
    {
        $data = $request->all();
        $usersCount = User::where('email', $data['email'])->count();
        if ($usersCount > 0)
        {
            echo 'false';
        }

        else
        {

            echo 'true';
        }
    }

    public function checkUsername(Request $request)
    {
        $data = $request->all();
        $usersCount = User::where('username', $data['username'])->count();
        if ($usersCount > 0)
        {
            echo 'false';
        }

        else
        {

            echo 'true';
        }
    }

    // for review page coding .
    public function review()
    {
        $user_id = Auth::User() ['id'];
        $userStatus = UsersDetail::select('status')->where('user_id', $user_id)->first();
        if ($userStatus->status == 1)
        {
            return redirect('/step/2');
        }
        else
        {
            return view('users.review');
        }
    }

    public function viewUsers()
    {
        $users = User::with('details')->with('photos')->where('admin', '!=', '1')->get();
        $users = json_decode(json_encode($users) , true);
        // echo "<pre>"; print_r($users); echo "</pre>"; die;
        return view('admin.users.view_users')->with(compact('users'));
    }

    public function updateUserStatus(Request $request)
    {
        $data = $request->all();
        UsersDetail::where('user_id', $data['user_id'])->update(['status' => $data['status']]);
    }

    public function updatePhotoStatus(Request $request)
    {
        $data = $request->all();
        UsersPhoto::where('id',$data['photo_id'])->update(['status' => $data['status']]);
    }

    public function step3(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>";print_r($data); die;
            if ($request->hasFile('photo'))
            {
                $files = $request->file('photo');
                foreach ($files as $file)
                {
                    // get photo extension
                    $extension = $file->getClientOriginalExtension();
                    // give random name to img and add its ext
                    $fileName = rand(111, 99999) . '.' . $extension;
                    //set img path
                    $image_path = 'img/frontend_images/photos/' . $fileName;
                    // intervention code for uploading photo
                    Image::make($file)->resize(600, 400)
                        ->save($image_path);

                    // add photo at users table
                    $photo = new UsersPhoto;
                    $photo->photo = $fileName;
                    $photo->user_id = $data['user_id'];
                    $photo->username = Session::get('frontSession');
                    $photo->save();
                }
            }

            return redirect('/step/3')
                ->with('flash_message_success', 'Your Photo(s) has been added successfully.');
        }
        $user_id = Auth::User() ['id'];
        $user_photos = UsersPhoto::where('user_id', $user_id)->get();
        return view('users.step3')
            ->with(compact('user_photos'));

    }

    // delete photo after upload in form
    public function deletePhoto($photo)
    {
        $user_id = Auth::User() ['id'];
        UsersPhoto::where(['user_id' => $user_id, 'photo' => $photo])->delete();
        file::delete('img/frontend_images/photos/' . $photo);
        return redirect()->back()
            ->with('flash_message_success', 'Your photo has been delted');
    }

    public function defaultPhoto($photo){
        $user_id = Auth::User() ['id'];
        UsersPhoto::where('user_id',$user_id)->update(['default_photo'=> 'No']);
        UsersPhoto::where(['user_id'=>$user_id,'photo'=>$photo])->update(['default_photo'=>'Yes']);
        return redirect()->back()->with('flash_message_error','Default photo has been set successfully');
    }

    public function viewProfile($username){
        $usersCount = User::where('username',$username)->count();
        if($usersCount > 0){
            $user_detail = User::with('details')->with('photos')->where('username',$username)->first();
             $user_detail = json_decode(json_encode($user_detail));
        // echo "<pre>"; print_r($user_detail); die;
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $friend_id = User::getUserId($username);
            $friendCount = Friend::where(['user_id'=>$user_id,'friend_id'=>$friend_id])->count();
            if($friendCount>0){
                $friendDetails = Friend::where(['user_id' =>$user_id,'friend_id'=>$friend_id])->first();
                if($friendDetails->except == 1){
                    $friendReq = "Unfriend";
                }
                else {
                    $friendReq = "Friend Request Send";
                }
            }

            else{
                $friendReqCount = Friend::where(['friend_id'=>$user_id,'user_id'=>$friend_id])->count();
                if($friendReqCount > 0) {
                    $friendReq = Friend::where(['friend_id'=>$user_id,'user_id'=>$friend_id])->first();
                    if($friendReq->except == 1){
                        $friendReq = "Unfriend";
                    }else{
                        $friendReq = "Confirm Friend Request";

                    }
               }
                else{
                    $friendReq = "Add Friend";
                }

            }
        }
        else{
            $friendReq = "";
        }

        }
        else{
            abort(404);
        }
        // User Friends List
            $friend_id = User::getUserId($username);
            $friendsCount1 = Friend::where(['friend_id'=>$friend_id,'except'=>1])->count();
            $friend_ids1 = array();
            if($friendsCount1>0){
            $friend_ids1 = Friend::select('user_id')->where(['friend_id'=>$friend_id,'except'=>1])->get();
            $friend_ids1 = arr::flatten(json_decode(json_encode($friend_ids1),true));
            /*echo "<pre>"; print_r($friend_ids1);*/
            }
            $friendsCount2 = Friend::where(['user_id'=>$friend_id,'except'=>1])->count();
            $friend_ids2 = array();
            if($friendsCount2>0){
            $friend_ids2 = Friend::select('friend_id')->where(['user_id'=>$friend_id,'except'=>1])->get();
            $friend_ids2 = arr::flatten(json_decode(json_encode($friend_ids2),true));
            /*echo "<pre>"; print_r($friend_ids2); die;*/
            }
            $friends_ids = array();
            $friends_ids = array_merge($friend_ids1,$friend_ids2);
            // echo "<pre>"; print_r($friends_ids); die;


            $friendsList = User::with('details')->with('photos')->whereIn('id',$friends_ids)->orderBy('id','desc')->get();
            $friendsList = json_decode(json_encode($friendsList));
            // echo "<pre>"; print_r($friendsList); die;

            return view('users.profile')->with(compact('user_detail','friendReq','friendsList'));

    }

    // send msg
    public function contactProfile(Request $request,$username){
        $usersCount = User::where('username',$username)->count();
        if($usersCount > 0){
            $user_detail = User::with('details')->with('photos')->where('username',$username)->first();
             $user_detail = json_decode(json_encode($user_detail));
        // echo "<pre>"; print_r($user_detail); die;

        if($request->isMethod('post')){
            $data = $request->all();

        //  add response
           $response = new Response;
           $response->sender_id = Auth::user()->id;
           $response->receiver_id = $user_detail->id;
           $response->message = $data['message'];
           $response->save();
           return redirect()->back()->with('flash_message_success','Your message has been send successfully to this person.');

        }

        }
        else{
            abort(404);
        }
        return view('users.contactProfile')->with(compact('user_detail'));

    }

    //send friend request
    public function addFriend ($username) {
        $usersCount = User::where('username',$username)->count();
        if($usersCount > 0){
           $user_id = Auth::user()->id;
           $friend_id = User::getUserId($username);
           $friend = new Friend;
           $friend->user_id = $user_id;
           $friend->friend_id = $friend_id;
           $friend->save();
           return redirect()->back();

        }
        else{
            abort(404);
        }

    }

    //confirm friend request
    public function confirmFriendRequest($username){
        $user_id = Auth::user()->id;
        $friend_id = User::getUserId($username);
        $friendCount = Friend::where(['friend_id'=>$user_id,'user_id'=>$friend_id])->count();
        if($friendCount>0) {
            Friend::where(['friend_id'=>$user_id,'user_id'=>$friend_id])->update(['except'=>1]);
            return redirect()->back();
        }
        else{
            abort(404);
        }
    }

    //remove friend
    public function removeFriend($username) {
        $usersCount = User::where('username',$username)->count();
        if($usersCount > 0){
           $user_id = Auth::user()->id;
           $friend_id = User::getUserId($username);
           Friend::where(['user_id' =>$user_id, 'friend_id'=>$friend_id])->delete();
           return redirect()->back();
        }
        else{
            abort(404);
        }

    }

        // searching users
    public function searchProfile(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $searched_users = User::with('details')->with('photos')
            ->join('users_details','users_details.user_id','=','users.id')
            ->where('users_details.gender',$data['gender'])
            ->where('users_details.country',$data['country'])
            ->orderBy('users.id','Desc')->get();
            $searched_users = json_decode(json_encode($searched_users));
                echo "<pre>"; print_r($searched_users); die;
            // return view('users.search')->with(compact('searched_users'));
        }
    }
        //inbox
    public function responses(){
        $receiver_id = Auth::user()->id;
        $responses   = Response::where('receiver_id',$receiver_id)->orderBy('id','Desc')->get();
        return view('users.responses')->with(compact('responses'));
    }

    //show friend requests
    public function friendsRequest(){
        $user_id = Auth::user()->id;
        $friendsRequest = Friend::where(['friend_id'=>$user_id,'except'=>0])->get();
        $friendsRequest = json_decode(json_encode($friendsRequest));
        return view('users.friends_request')->with(compact('friendsRequest'));
    }

     //show All friends
     public function friends(){
        // $user_id = Auth::user()->id;
        // $friendsCount = Friend::where(['friend_id'=>$user_id,'except'=>1])->count();
        // if($friendsCount>0){
        //     $friends = Friend::where(['friend_id'=>$user_id,'except'=>1])->get();
        // }
        // else{
        //     $friends = Friend::where(['user_id'=>$user_id,'except'=>1])->get();
        // }
        // $friends = json_decode(json_encode($friends));

$friend_id = Auth::user()->id;
$friendsCount1 = Friend::where(['friend_id'=>$friend_id,'except'=>1])->count();
$friend_ids1 = array();
if($friendsCount1>0){
$friend_ids1 = Friend::select('user_id')->where(['friend_id'=>$friend_id,'except'=>1])->get();
$friend_ids1 = arr::flatten(json_decode(json_encode($friend_ids1),true));
/*echo "<pre>"; print_r($friend_ids1);*/
}
$friendsCount2 = Friend::where(['user_id'=>$friend_id,'except'=>1])->count();
$friend_ids2 = array();
if($friendsCount2>0){
$friend_ids2 = Friend::select('friend_id')->where(['user_id'=>$friend_id,'except'=>1])->get();
$friend_ids2 = arr::flatten(json_decode(json_encode($friend_ids2),true));
/*echo "<pre>"; print_r($friend_ids2); die;*/
}
$friends_ids = array();
$friends_ids = array_merge($friend_ids1,$friend_ids2);
// echo "<pre>"; print_r($friends_ids); die;


$friendsList = User::with('details')->with('photos')->whereIn('id',$friends_ids)->orderBy('id','desc')->get();
$friendsList = json_decode(json_encode($friendsList));
// echo "<pre>"; print_r($friendsList); die;

return view('users.friends')->with(compact('friendsList'));
}

    //accept friends Request
    public function acceptFriendRequest($sender_id){
        $receiver_id = Auth::user()->id;
        Friend::where(['user_id'=>$sender_id,'friend_id'=>$receiver_id])->update(['except'=>1]);
        return redirect()->back()->with('flash_message_success',"Request Accepted Successfully");
    }

    //reject friends Request
    public function rejectFriendRequest($sender_id){
        $receiver_id = Auth::user()->id;
        Friend::where(['user_id'=>$sender_id,'friend_id'=>$receiver_id])->delete();
        return redirect()->back()->with('flash_message_success',"Request Rejected");
    }

    public function sentMessages(){
        $sender_id = Auth::user()->id;
        $sent_msg = Response::where('sender_id', $sender_id)->orderBy('id','Desc')->get();
        // $responses = json_decode(json_encode($sent_messages));
        // echo "<pre>"; print_r($responses); die;
        return view('users.sent_messages')->with(compact('sent_msg'));
    }

    public function deleteResponse($id){
        Response::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Your message has been Deleted successfully');
    }



}//class

