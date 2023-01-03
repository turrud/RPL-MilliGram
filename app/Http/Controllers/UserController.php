<?php

namespace App\http\Controllers;


use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::with('posts')->where('username', $username)->first();
        if(!$user) abort(404);

        foreach(User::withCount('following')->where('username','=',$username)->get() as $following){
            $followingsCount = $following->following_count;
        }
        foreach(User::withCount('follower')->where('username','=',$username)->get() as $follower){
            $followersCount = $follower->follower_count;
        }

        return view('user.profile', compact('user','followingsCount','followersCount'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|alpha_dash|min:3|max:15|unique:users,username,'.$user->id,
            'fullname' => 'max:30',
            'bio' => 'max:144',
            'avatar' => 'image|mimes:jpeg,jpg,png',
            'business_address' => 'max:144',
            'business_website' => 'max:144'
        ]);

        $imageName = $user->avatar;
        if($request->avatar) {
            $avatar_img = $request->avatar;
            $imageName = $user->username . '-' . time() . '.' . $avatar_img->extension();
            $avatar_img->move(public_path('images/avatar'), $imageName);
        }

        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'bio' => $request->bio,
            'avatar' => $imageName,
            'business_address' => $request->business_address,
            'business_website' => $request->business_website
        ]);

        return redirect('/@'.$user->username);
    }
    public function updateType(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'type' => $request->type
        ]);
        return redirect('/user/edit');
    }
    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->update([
            'status' => $request->status
        ]);
        return redirect('/@'.$user->username);
    }
    public function follow($following_id)
    {
        $user = Auth::user();
        if($user->following->contains($following_id)){
            $user->following()->detach($following_id);
            $message = ['status' => 'UNFOLLOW'];
        }else{
            $user->following()->attach($following_id);
            $message = ['status' => 'FOLLOW'];
        }

        return response()->json($message);
    }
}

