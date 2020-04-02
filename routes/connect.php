<?php 

Route::group(['middleware' => 'web','prefix' => 'connect'], function () {
	/* Timeline controller */
	Route::get('/','Connect\TimelineController@index');
	Route::get('getData/{id}','Connect\TimelineController@show_more');

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
	Route::post('addskillSet','Connect\ConnectionsController@profile_addskillSet');
	Route::get('getInterest','Connect\ConnectionsController@profile_getInterest');
	Route::get('editInterest','Connect\ConnectionsController@profile_editInterest');
	Route::post('addInterest','Connect\ConnectionsController@profile_addInterest');

	Route::get('getDetails','Connect\ConnectionsController@profile_getDetails');
	Route::get('editDetails','Connect\ConnectionsController@profile_editDetails');
	Route::post('addDetails','Connect\ConnectionsController@profile_addDetails');

	Route::post('addPost','Connect\TimelineController@timeline_addDetails');
	Route::post('updatePost','Connect\TimelineController@timeline_updateDetails');
	Route::post('addLike','Connect\TimelineController@timeline_addLike');
	Route::post('unLikePost','Connect\TimelineController@timeline_unLikePost');
	Route::post('deletePost','Connect\TimelineController@timeline_deletePost');
	Route::post('addComment','Connect\TimelineController@timeline_addComment');
	Route::post('UpdateComment','Connect\TimelineController@timeline_UpdateComment');
	Route::post('savePrivacy','Connect\TimelineController@timeline_savePrivacy');

	Route::get('showAddPost','Connect\TimelineController@showAddPost');
	Route::get('editAddPost/{id}','Connect\TimelineController@editAddPost');

	Route::post('imageUpload','Connect\TimelineController@imageUpload');
	Route::get('users','Connect\TimelineController@users');
	Route::get('gallery','Connect\ConnectionsController@user_gallery');
	Route::post('profile-picture','Connect\ConnectionsController@profile_picture');
	/* Connections controller */
	
});