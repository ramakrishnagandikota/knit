<?php 

Route::group(['middleware' => 'web','prefix' => 'connect'], function () {
	/* Timeline controller */
	Route::get('/','Connect\TimelineController@index');

	/* Timeline Controller */

	/* Connections controller */
	Route::get('my-connections','Connect\ConnectionsController@index');
	Route::get('find-connections','Connect\ConnectionsController@find_connections');
	Route::post('sendFriendRequest','Connect\ConnectionsController@sendFriendRequest');
	Route::post('cancelFriendRequest','Connect\ConnectionsController@cancelFriendRequest');
	Route::post('removeFriend','Connect\ConnectionsController@removeFriend');
	Route::post('acceptRequest','Connect\ConnectionsController@acceptRequest');

	Route::post('follow','Connect\ConnectionsController@follow_user');
	Route::post('unfollow','Connect\ConnectionsController@unfollow_user');
	Route::get('markAsRead','Connect\ConnectionsController@markAsRead');

	Route::get('profile/{username}/{id}','Connect\ConnectionsController@user_profile');
	Route::get('myprofile','Connect\ConnectionsController@my_profile');
	Route::post('addAboutme','Connect\ConnectionsController@profile_addAboutme');
	Route::get('getSkillset','Connect\ConnectionsController@profile_getSkillset');
	Route::get('editSkillset','Connect\ConnectionsController@profile_editSkillset');
	/* Connections controller */
	
});