<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $id_list = $user->following()->pluck('follows.follower_id')->toArray();
        $id_list[] = $user->id;
        // dd($user);

        $posts = Post::with('user', 'likes')->withCount('likes')->whereIn('user_id', $id_list)->orderBy('created_at', 'desc')->get();
        return view('home', compact('posts', 'user'));
    }
    public function search (Request $request)
    {
        $user = Auth::user();
        $querySearch = $request->input('query');
        $posts = Post::with('user', 'likes')->withCount('likes')
            ->where('caption', 'like', '%' . $querySearch . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('home', compact('posts', 'querySearch', 'user'));
    }
}
