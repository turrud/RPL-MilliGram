<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['caption','image'];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    // public function likes()
    // {
    //     return $this->hasMany('App\Models\Like');
    // }

    // public function is_liked()
    // {
    //     return $this->likes->where('user_id', Auth::user()->id)->count();
    // }
}