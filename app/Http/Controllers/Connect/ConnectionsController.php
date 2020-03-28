<?php

namespace App\Http\Controllers\Connect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Friends;
use App\Models\Friendrequest;
use App\Models\MasterList;
use App\Models\Follow;
use App\Traits\FriendRequestableTrait;
use App\Notifications\FriendRequestNotification;
use App\Traits\FriendRequestAcceptableTrait;
use App\Notifications\FriendRequestAcceptNotification;
use Carbon\Carbon;
use DB;
use App\Traits\FollowTrait;
use App\Notifications\FollowNotification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ConnectionsController extends Controller
{
	function __construct(){
		$this->middleware(['auth','roles','subscription']);
	}

    function index(Request $request){
    	$search = $request->get('search');
    	if($search){
    		$friends = Friends::leftJoin('users','users.id','friends.friend_id')
    				->where('friends.user_id',Auth::user()->id)
    				->where('users.first_name', 'LIKE', "%{$search}%") 
				    ->orWhere('users.last_name', 'LIKE', "%{$search}%")
				    ->where('friends.friend_id','!=',Auth::user()->id) 
				    ->select('friends.id','users.id as user_id','users.enc_id','users.username','users.first_name','users.last_name','users.email','users.picture')->paginate(12);
    	}else{
    		$friends = Friends::leftJoin('users','users.id','friends.friend_id')
    				->where('friends.user_id',Auth::user()->id)->select('friends.id','users.id as user_id','users.first_name','users.last_name','users.email','users.picture')->paginate(12);
    	
    	}
    	$skills = MasterList::where('type','skills')->get();
    	$skill_level = MasterList::where('type','skill_level')->get();
    	return view('connect.connections.index',compact('friends','skills','skill_level','search'));
    }

    function find_connections(Request $request){

    	$search = $request->get('search');
    	if($search){
    		$users = User::query()
   ->where('first_name', 'LIKE', "%{$search}%") 
   ->orWhere('last_name', 'LIKE', "%{$search}%") 
   ->where('id','!=',Auth::user()->id)
   ->paginate(12);
    	}else{
    		$users = '';
    	}
    	$skills = MasterList::where('type','skills')->get();
    	$skill_level = MasterList::where('type','skill_level')->get();
    	return view('connect.connections.find-connections',compact('search','users','skills','skill_level'));
    }

    function sendFriendRequest(Request $request,User $friendrequest){
    	$user_id = Auth::user()->id;
    	$friend_id = $request->friend_id;
    	$check = Friendrequest::where('user_id',$user_id)->where('friend_id',$friend_id)->count();
    	if($check == 1){
    		return response()->json(['error' => 'You have already sent request to this user.']);
    		exit;
    	}
    	$user = User::find($friend_id);

    	$friendrequest = User::where('id',$friend_id)->first();
    	
        $send = $friendrequest->sendFriendRequest($friend_id);
    	$user->notify(new FriendRequestNotification($friendrequest));

    	if($send){
    		return response()->json(['success' => 'Your friend request has sent.']);
    	}else{
    		return response()->json(['error' => 'Unable to send request at this time.Try again after some time.']);
    	}
    }

    function cancelFriendRequest(Request $request){
    	$user_id = Auth::user()->id;
    	$friend_id = $request->friend_id;
    	$check = Friendrequest::where('user_id',$user_id)->where('friend_id',$friend_id)->count();
    	if($check == 1){
    		$del = Friendrequest::where('user_id',$user_id)->where('friend_id',$friend_id)->delete();
    		if($del){
    			return response()->json(['success' => 'Successfully removed friend request.']);
    		}else{
    			return response()->json(['error' => 'Unable to remove friend request.']);
    		}
    		
    	}else{
    		return response()->json(['error' => 'No friend request found for this user.']);
    	}
    }

    function removeFriend(Request $request){
    	$user_id = Auth::user()->id;
    	$friend_id = $request->friend_id;

    	$del1 = Friends::where('user_id',Auth::user()->id)->where('friend_id',$friend_id)->delete();
    	$del2 = Friends::where('user_id',$friend_id)->where('friend_id',Auth::user()->id)->delete();

    	if($del1 && $del2){
    	return response()->json(['success' => 'User removed from friends list.']);
    	}else{
    	return response()->json(['error' => 'Unable to remove user.']);
    	}
    }


    function acceptRequest(Request $request,User $friendRequestAccept){
    	$fid = $request->friend_id;
        $uid = Auth::user()->id;

        $friend_req = DB::table('friend_request')->where('user_id',$fid)->where('friend_id',$uid)->delete();

        $friendRequestAccept = User::where('id',$fid)->first();
        $fr = $friendRequestAccept->acceptRequest($request);
        $friendRequestAccept->notify(new FriendRequestAcceptNotification($friendRequestAccept));
        
         if($fr){
            return response()->json(['success' => 'Request accepted, user added to friend list.']);
        }else{
            return response()->json(['error' => 'Unable to accept request.']);
        }
    }

    function follow_user(Request $request,User $follow){
        $user_id = Auth::user()->id;
        $follow_user_id = $request->follow_user_id;

        $check = Follow::where('user_id',$user_id)->where('follow_user_id',$follow_user_id)->count();
        if($check > 0){
            return response()->json(['error' => 'You are already following this user.']);
        }

        $follow = User::where('id',$follow_user_id)->first();
        $send = $follow->sendFollowRequest($request);
        $follow->notify(new FollowNotification($follow));
        if($send){
            return response()->json(['success' => 'You are successfully following the user.']);
        }else{
            return response()->json(['error' => 'Unable to send follow request.']);
        }
    }

    function unfollow_user(Request $request){
        $user_id = Auth::user()->id;
        $follow_user_id = $request->follow_user_id;

        $check = Follow::where('user_id',$user_id)->where('follow_user_id',$follow_user_id)->count();
        if($check > 0){
            $del = Follow::where('user_id',$user_id)->where('follow_user_id',$follow_user_id)->delete();

        if($del){
            return response()->json(['success' => 'Unfollowing User. You may not receive notifications from this user.']);
        }else{
        return response()->json(['error' => 'Unable to send unfollow request.']);
        }
        }else{
        return response()->json(['error' => 'You are not following this user.']);
        }
    }


    function markAsRead(){
        $user = User::find(Auth::user()->id);
        $user->unreadNotifications->markAsRead();
    }

    function my_profile(Request $request){
        return view('connect.profile.my-profile');
    }


    function user_profile(Request $request){
        $id = $request->id;
        try {
            $decrypted = decrypt($id);
            $user = User::find($decrypted);
        } catch (DecryptException $e) {
            return view('notfound');
        }
        
        return view('connect.profile.userProfile',compact('user'));
    }

    function profile_addAboutme(Request $request){
        $array = array('aboutme' => $request->aboutme);
        $send = Auth::user()->profile->update($array);
        if($send){
            return response()->json(['success' => 'About me added successfully.']);
        }else{
            return response()->json(['error' => 'Unable to add, Try again after sometime.']);
        }
    }

    function profile_getSkillset(){
        return view('connect.profile.show-skillset');
    }

    function profile_editSkillset(){
        return view('connect.profile.edit-skillset');
    }
    
}
