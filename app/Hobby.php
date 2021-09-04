<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
        ];
    
    //この投稿を所有するユーザ    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // 投稿をお気に入りされているユーザ
    public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','micropost_id','user_id')->withTimestamps();
    }
}
