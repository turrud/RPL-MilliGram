<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    protected $fillable = ['username','fullname','bio','avatar','email','type','business_address','business_website','business_contact','status','password'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
         return $this->hasMany('App\Models\Post');
    }
    public function following()
    {
        return $this->belongsToMany(
            User::class, 'follows', 'follower_id', 'following_id'
        )->withPivot('following_id')->withTimestamps();
    }
    public function follower()
    {
        return $this->belongsToMany(
            User::class, 'follows', 'following_id', 'follower_id'
        )->withPivot('follower_id')->withTimestamps();
    }
    public function is_followed()
    {
    //     // dd(Auth::user()->id);
    //     dd($this->follower->get());
    //     $count = 0;
        foreach($this->follower as $follower){
            // dd($follower);
            $p=0;
                foreach($follower as $f){
                    if($p==13){
                        if($f['id'] == Auth::user()->id){
                            return 1;
                        }
                        // dd($f['id']);
                        // dd($f);
                    }
                    $p++;
                }
        }
        return 0;
    //         $out = $follower;
    //         foreach($out as $t){

    //             try {
    //                 // vardump($t);
    //                 if($t->user_id == Auth::user()->id){

    //                     return 1;
    //                 }
    //             } catch (\Throwable $th) {
    //                 //throw $th;
    //             }

    //         }


        // return $this->follower->items->where('follower_id', Auth::user()->id)->count();
    }
    // public function followingsCount()
    // {
    //     return $this->following->count();
    // }
    // public function followersCount()
    // {
    //     return $this->follower->count();
    // }
}
