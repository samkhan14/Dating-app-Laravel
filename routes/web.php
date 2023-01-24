<?php


//Front Routes
 Route::get('/','IndexController@index');
Route::any('/register','UsersController@register');



// Route::get('/dynamic_dependent','DynamicDependentController@index');
Route::any('/login','UsersController@login');
Route::any('/logout','UsersController@logout');



Route::group(['middleware' => ['frontlogin']], function () {

	Route::get('/chat/{username}', 'ChatMessageController@userChatbox');
	Route::post('/chat/send-message','ChatMessageController@sendMessage');
	Route::post('/chat/isTyping','ChatMessageController@isTyping');
	Route::post('/chat/isnottyping','ChatMessageController@isNotTyping');
	Route::post('/chat/retrieveChatMessages','ChatMessageController@retrieveChatMessages');
	Route::post('/chat/retrieveTypingStatus','ChatMessageController@retrieveTypingStatus');

    Route::get('/dashboard','UsersController@dashboard');
	Route::any('/step/2','UsersController@step2');
	Route::any('/step/3','UsersController@step3');
	Route::any('/review','UsersController@review');
	Route::any('/responses','UsersController@responses');
	Route::get('/delete-response/{id}','UsersController@deleteResponse');
	Route::any('/sent-messages','UsersController@sentMessages'); 
	Route::get('/delete-photo/{photo}','UsersController@deletePhoto');
	Route::get('/default-photo/{photo}','UsersController@defaultPhoto');
	Route::match(['get', 'post'], '/contact/{username}', 'UsersController@contactProfile');
	Route::match(['get', 'post'], '/add-friend/{username}', 'UsersController@addFriend');
	Route::match(['get', 'post'], '/remove-friend/{username}', 'UsersController@removeFriend');
	Route::match(['get', 'post'], '/friends-requests','UsersController@friendsRequest');
	Route::match(['get', 'post'], '/accept-frnd-req/{id}', 'UsersController@acceptFriendRequest');
	Route::match(['get', 'post'], '/confirm-frnd-req/{id}', 'UsersController@confirmFriendRequest');
	Route::get('/reject-frnd-req/{id}', 'UsersController@rejectFriendRequest');
	Route::get('/friends','UsersController@friends');

});



Route::match(['get','post'],'/admin','AdminController@login');

Route::get('/admin/logout','AdminController@logout');

Route::any('/profile/search','UsersController@searchProfile');
Route::get('/profile/{username}','UsersController@viewProfile');

Route::group(['middleware' => ['adminlogin']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

	// user side route

	Route::get('admin/view-user','UsersController@viewUsers');
	Route::post('admin/update-user-status','UsersController@updateUserStatus');
	Route::post('admin/update-photo-status','UsersController@updatePhotoStatus');
});

Route::any('/check-email','UsersController@checkEmail');
Route::get('/check-username','UsersController@checkUsername');



