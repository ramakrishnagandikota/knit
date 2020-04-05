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
use App\Models\Userprofile;
use App\Models\UserSettings;
use App\Models\TimelineImages;
use App\Models\Timeline;
use App\Models\Projectimages;
use Validator;
use File;
use Image;
use Session;
use Redirect;

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
    				->where('friends.user_id',Auth::user()->id)->select('friends.id','users.id as user_id','users.first_name','users.last_name','users.email','users.username','users.picture')->paginate(12);
    	
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
        $timeline_images = TimelineImages::where('user_id',Auth::user()->id)->get();
        return view('connect.profile.my-profile',compact('timeline_images'));
    }


    function user_profile(Request $request){
        $id = $request->id;
        try {
            $decrypted = decrypt($id);
            $user = User::where('id',$decrypted)->first();
            $timeline_images = Timeline::leftJoin('timeline_images','timeline_images.timeline_id','timeline.id')
                ->where('timeline_images.user_id',$user->id)
                ->where('timeline.privacy','!=','only-me')
                ->select('timeline_images.image_path')->get();
        } catch (DecryptException $e) {
            return view('notfound');
        }

        return view('connect.profile.userProfile',compact('user','timeline_images'));
    }

    function profile_addAboutme(Request $request){
        $array = array('aboutme' => $request->aboutme);
        if(Auth::user()->profile){
        $send = Auth::user()->profile->update($array);
        }else{
        $profile = new Userprofile;
        $profile->user_id = Auth::user()->id;
        $profile->aboutme = $request->aboutme;
        $send = $profile->save();
        }

        if($send){
            return response()->json(['success' => 'About me added successfully.']);
        }else{
            return response()->json(['error' => 'Unable to add, Try again after sometime.']);
        }
    }

    function profile_getSkillset(Request $request){
        
        return view('connect.profile.show-skillset');
    }

    function profile_editSkillset(Request $request){
        $master_list = MasterList::where('type','user_skill_set')->get();
        return view('connect.profile.edit-skillset',compact('master_list'));
    }

    function profile_addskillSet(Request $request){
        $ps = implode(',', $request->professional_skills);
        $array = array('professional_skills' => $ps,'as_a_knitter_i_am' => $request->as_a_knitter_i_am,'rate_yourself' => $request->rate_yourself);
        if(Auth::user()->profile){
        $send = Auth::user()->profile->where('user_id',Auth::user()->id)->update($array);
        }else{
        $profile = new Userprofile;
        $profile->user_id = Auth::user()->id;
        $profile->professional_skills = $ps;
        $profile->as_a_knitter_i_am = $request->as_a_knitter_i_am;
        $profile->rate_yourself = $request->rate_yourself;
        $send = $profile->save();
        }

        if($send){
            return response()->json(['success' => 'skill set me added successfully.']);
        }else{
            return response()->json(['error' => 'Unable to add, Try again after sometime.']);
        }
    }

    function profile_getInterest(Request $request){
        return view('connect.profile.show-interest');
    }

    function profile_editInterest(Request $request){
        return view('connect.profile.edit-interest');
    }

    function profile_addInterest(Request $request){

        $a = implode(',', $request->i_knit_for);
        $b = implode(',', $request->i_am_here_for);

        $array = array('i_knit_for' => $a,'i_am_here_for' => $b);
        if(Auth::user()->profile){
        $send = Auth::user()->profile->where('user_id',Auth::user()->id)->update($array);
        }else{
        $profile = new Userprofile;
        $profile->user_id = Auth::user()->id;
        $profile->i_knit_for = $a;
        $profile->i_am_here_for = $b;
        $send = $profile->save();
        }

        if($send){
            return response()->json(['success' => 'Interests added successfully.']);
        }else{
            return response()->json(['error' => 'Unable to add, Try again after sometime.']);
        }
    }

    function profile_getDetails(Request $request){
        return view('connect.profile.show-details');
    }

    function profile_editDetails(Request $request){
        return view('connect.profile.edit-details');
    }

    function profile_addDetails(Request $request){

        $validator = $request->validate([
                'first_name' => 'required|alpha|min:2|max:15',
                'last_name' => 'required|alpha|min:2|max:15',
                'mobile' => 'required|numeric'
            ]);

        $mobile = Auth::user()->settings->where('name','mobile_privacy')->count();
        $email = Auth::user()->settings->where('name','email_privacy')->count();
        $address = Auth::user()->settings->where('name','address_privacy')->count();
        $website = Auth::user()->settings->where('name','website_privacy')->count();

        //echo $request->mobile_privacy.' - '.$email.' - '.$address.' - '.$website;
        //exit;

        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $save = $user->save();

        $array = array('website' => $request->website);
        Auth::user()->profile->where('user_id',Auth::user()->id)->update($array);

        
        if($mobile){
            $mb = array('value' => $request->mobile_privacy);
            UserSettings::where('user_id',Auth::user()->id)->where('name','mobile_privacy')->update($mb);
        }else{
            $mb = array('user_id' => Auth::user()->id, 'name' => 'mobile_privacy' ,'value' => $request->mobile_privacy,'created_at' => Carbon::now());
            UserSettings::insert($mb);
        }

        
        if($email){
            $em = array('value' => $request->email_privacy);
            UserSettings::where('user_id',Auth::user()->id)->where('name','email_privacy')->update($em);
        }else{
            $em = array('user_id' => Auth::user()->id, 'name' => 'email_privacy' ,'value' => $request->email_privacy,'created_at' => Carbon::now());
            UserSettings::insert($em);
        }

        
        if($address){
            $add = array('value' => $request->address_privacy);
            UserSettings::where('user_id',Auth::user()->id)->where('name','address_privacy')->update($add);
        }else{
            $add = array('user_id' => Auth::user()->id, 'name' => 'address_privacy' ,'value' => $request->address_privacy,'created_at' => Carbon::now());
            UserSettings::insert($add);
        }

        
        if($website){
            $wb = array('value' => $request->website_privacy);
            UserSettings::where('user_id',Auth::user()->id)->where('name','website_privacy')->update($wb);
        }else{
            $wb = array('user_id' => Auth::user()->id, 'name' => 'website_privacy' ,'value' => $request->website_privacy,'created_at' => Carbon::now());
            UserSettings::insert($wb);
        }

        if($save){
            return response()->json(['success' => 'Profile added successfully.']);
        }else{
            return response()->json(['error' => 'Unable to add, Try again after sometime.']);
        } 
    }

    function user_gallery(){
        $timeline_images = TimelineImages::where('user_id',Auth::user()->id)->get();
        $project_images = Projectimages::where('user_id',Auth::user()->id)->get();
        return view('connect.connections.gallery',compact('timeline_images','project_images'));
    }

    function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function profile_picture(Request $request){
        $image = $request->file('file');
            $fname = $this->clean($image->getClientOriginalName()); 
            $filename = time().'-'.$fname;
            $ext = $image->getClientOriginalExtension();

         $s3 = \Storage::disk('s3');
        //exit;
        $filepath = 'knitfit/'.$filename;

        if($ext == 'pdf'){
            $pu = $s3->put('/'.$filepath, file_get_contents($image),'public');
        }else{
        $ext = $ext;
        $img = Image::make($image);
        $height = Image::make($image)->height();
        $width = Image::make($image)->width();
        $img->orientate();
        $img->resize($width, $height, function ($constraint) {
            //$constraint->aspectRatio();
        });
        $img->encode('jpg');
        $pu = $s3->put('/'.$filepath, $img->__toString(), 'public');
        }

       if($pu){
        $user = User::find(Auth::user()->id);
        $user->picture = 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath;
        $user->save();
        
         return response()->json(['path' => 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath,'ext' => $ext]);
     }else{
        echo 'error';
     }

    }

}
