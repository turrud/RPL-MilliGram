<?php

namespace App\http\Controllers;

use Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'caption' => 'max: 250',
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $imageName = $user->image;
        if($request->image) {
            $image_img = $request->image;
            $imageName = $user->username . '-' . time() . '.' . $image_img->extension();
            $image_img->move(public_path('images/posts'), $imageName);
        }
        $user->posts()->create([
            'caption' => $request->caption,
            'image' => $imageName
        ]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        // $posts = Post::with('user', 'likes')->withCount('likes')->whereIn('user_id', $id_list)->orderBy('created_at', 'desc')->get();
        $post = Post::with('user', 'likes')->withCount('likes')->findOrFail($id);
        return view('post.show', compact('post','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = Auth::user();
        $post = Post::findOrFail($id);

        $request->validate([
            'caption' => 'max: 250',
        ]);
        if($request->status != null){
            $post->update([
                'status' => $request->status
            ]);
        }
        if($request->caption != null){
            $post->update([
                'caption' => $request->caption,
            ]);
        }
        if($user->type=='admin'){
            return redirect('/post/'.$id);
        }else{
            return redirect('/home');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
