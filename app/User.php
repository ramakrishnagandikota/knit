<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Models\Project;
use App\Models\Orders;
use App\Models\Booking_process;
use App\Models\UserMeasurements;
use Illuminate\Auth\MustVerifyEmail;
use Auth;
use App\Models\Subscription;
use App\Models\SubscriptionProperties;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
    return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

    public function email($email){
      return $this->where('email',$email);
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;   
    }

    public function hasRole($role){
        if($this->roles()->where('role_name',$role)->first()){
            return true;
        }
        return false;
    }

    public function hasAnySubscription($subscription){
        if(is_array($subscription)){
            foreach($subscription as $subscription){
                if($this->hasSubscription($subscription)){
                    return true;
                }
            }
        }else{
            if($this->hasSubscription($subscription)){
                return true;
            }
        }

        return false;   
    }

    public function hasSubscription($subscription){
        if($this->subscription()->where('name',$subscription)->first()){
            return true;
        }
        return false;
    }
	
	function subscription(){
		return $this->belongsToMany('App\Models\Subscription', 'user_subscriptions', 'user_id', 'subscription_id');
	}

    function get_subscription_details(){
        if($this->hasSubscription('Free') == true){
            $sub = 1;
        }else if($this->hasSubscription('Basic') == true){
            $sub = 2;
        }else{
            $sub = 3;
        }

        return $sub;
    }
    
    function feedback(){
        return $this->hasMany('App\Models\Feedback','user_id')->orderBy('id','desc');
    }

    function projects(){
      return $this->hasMany(Project::class);
    }

   function measurements(){
    return $this->hasMany(UserMeasurements::class);
   }

   function orders(){
    return $this->hasMany(Orders::class);
   }

   function bookings(){
    return $this->hasMany(Booking_process::class)->where('product_category',1);
   }
    
}
