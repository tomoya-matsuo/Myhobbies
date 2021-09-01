<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hobby;

class HobbiesController extends Controller
{
    public function create()
    {
        return view('hobbies.form');
    }
    
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

    
    public function show() {
        return view('hobbies.form');
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image' => 'image|max:10240'
            ]);
            
        if (request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $request->image = $name;
            }   
    
        //認証済みユーザ(閲覧者)の投稿として作成
        $request->user()->hobbies()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            ]);
        
 
            
            //前のURLへリダイレクト
            return redirect('/')->with('message','投稿しました');
    }

    
    public function edit($id)
    {
        $hobby = \App\Hobby::findOrFail($id);
        
        if(\Auth::id() === $hobby->user_id);
        return view('hobbies.edit',compact('hobby'));
    }
    
     public function update(Request $request, $id)
    {
        //idの値で投稿を取得
        $hobby = \App\Hobby::findOrFail($id);
        
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image' => 'image|max:10240'
            ]);
            
        if (request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $request->image = $name;
            }     
    
            //更新
            $hobby->title = $request->title;
            $hobby->content = $request->content;
            $hobby->image = $request->image;
            $hobby->save();
        
 
            
            //前のURLへリダイレクト
            return redirect('/')->with('message','投稿を編集しました');
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
