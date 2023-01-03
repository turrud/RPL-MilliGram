<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['description','post_id','user_id','reporter_id','status'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
