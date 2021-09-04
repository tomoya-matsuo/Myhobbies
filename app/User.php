<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profile_image','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }
    
    //このユーザに関係するモデルの件数をロード
    public function loadRelationshipCounts()
    {
        $this->loadCount(['hobbies','followings','followers','favorites']);
    }
    
    //このユーザがフォロー中のユーザ
     public function followings()
    {
        return $this->belongsToMany(User::class,'user_follow','user_id','follow_id')->withTimestamps();
    }
    
    // このユーザをフォロー中のユーザ(Userモデルとの関係を定義)
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_follow','follow_id','user_id')->withTimestamps();
    }
    
    //　投稿をお気に入りするユーザ
    public function favorites()
    {
        return $this->belongsToMany(Hobby::class,'favorites','user_id','hobby_id')->withTimestamps();
    }
    
     public function favorite($hobbyId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favoriting($hobbyId);
        
        if ($exist) {
            // すでにお気に入りしていれば何もしない
             return false;
        } else {
            // お気に入りしていなければお気に入りする
            $this->favorites()->attach($hobbyId);
            return true;
        }
    }
    
    public function unfavorite($hobbyId)
     {
         // すでにお気に入りしているかの確認
         $exist = $this->is_favoriting($hobbyId);
         
         if ($exist) {
             // すでにお気に入りしていればお気に入りを外す
             $this->favorites()->detach($hobbyId);
             return true;
         } else {
             // お気に入りしていなければ何もしない
             return false;
         }
     }
     
      public function is_favoriting($hobbyId)
     {
         // お気に入り中の投稿の中に$hobbyIdのものが存在するか
         return $this->favorites()->where('hobby_id',$hobbyId)->exists();
     }
    

   public function follow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me) {
            // すでにフォローしていれば何もしない
            return false;
        } else {
            //未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
       public function unfollow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me) {
            // すでにフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            //未フォローであれば何もしない
            return false;
        }
    }
    
        public function is_following($userId)
    {
        // フォロー中のユーザの中に$userIdのものが存在するか
        return $this->followings()->where('follow_id',$userId)->exists();
    }
    
    public function feed_hobbies()
    {
        //このユーザがフォロー中のユーザのidを取得して配列にする
        $userIds = $this->followings()->pluck('users.id')->toArray();
        //このユーザのidもその配列に追加
        $userIds[] = $this->id;
        //それらのユーザが所有する投稿に絞り込む
        return Hobby::wherein('user_id',$userIds);
        
    }
}
