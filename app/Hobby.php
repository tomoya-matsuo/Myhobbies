<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image'];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
