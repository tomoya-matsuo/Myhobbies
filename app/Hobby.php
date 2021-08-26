<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image'];
        
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
