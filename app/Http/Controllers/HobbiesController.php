<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HobbiesController extends Controller
{
    public function index()
    {
        $data = [];
        if(\Auth::check()) { //認証済みの場合
        // 認証済みユーザの取得
        $user = \Auth::user();
        $hobbies = $user->hobbies()->orderBy('created_at','desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'hobbies' => $hobbies,
            ];
        }
        
        //welcomeビューでそれらを表示
        return view('welcome',$data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image' => 'image|max:10240'
            ]);
        
        //認証済みユーザ(閲覧者)の投稿として作成
        $request->user()->hobbies()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image
            ]);
            
            //前のURLへリダイレクト
            return back();
    }
    
    public function destroy($id)
    {
        //idの値で投稿を検索して取得
        $hobby = \App\Hobby::findOrFail($id);
        
        //認証済みユーザ(閲覧者)がその投稿の所有者である場合は、投稿を削除
        if(\Auth::id() === $hobby->user_id) {
            $hobby->delete();
        }
        
        //前のURLへリダイレクトさせる
        return back();
    }
}
