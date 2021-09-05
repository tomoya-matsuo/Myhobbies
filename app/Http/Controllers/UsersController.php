<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Hobby;

use Auth;

use Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    public function index()
    {
        //ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        //ユーザ一覧ビューでそれを表示
        return view('users.index',[
            'users' => $users,
            ]);
    }
    
        
    
    public function show($id)
    {
        //idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザの投稿一覧を作成日時の降順で取得
        $hobbies = $user->hobbies()->orderBy('created_at','desc')->paginate(10);
        
        //ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'hobbies' => $hobbies,
            ]);
    }

    
    public function followings($id){
        //idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);
        
        //フォロー一覧ビューでそれらを表示
        return view('users.followings',[
            'user' => $user,
            'users' => $followings,
            ]);
        
    }
    
        public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
        public function favorites($id)
     {
         $user = User::findOrFail($id);
         
         $user->loadRelationshipCounts();
         
         $hobbies = $user->favorites()->orderBy('created_at','desc')->paginate(10);
         
         return view('users.favorites',[
             'user' => $user,
             'hobbies' => $hobbies,
             ]);
     }
     
    public function edit(User $user)
    {
        $this->authorize('update', $user);           
        if($user = User::findOrFail($user->id)) {
         // テンプレート「user/edit.blade.php」を表示します。
        return view('users.edit', ['user' => $user]);
        }
    }
    
    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all() , [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $user = \Auth::user();
        $user->name = $request->name;
        
        $profile_image=request()->file('profile_image');
        if($profile_image){
        $profile_image=request()->file('profile_image')->getClientOriginalName();
        request()->file('profile_image')->storeAs('public/profile_image', $profile_image);  
        $user->profile_image = $profile_image;
        }
        
        $user->password = bcrypt($request->user_password);
        $user->save();

        return redirect('/'.$request->id);
    }     
    
}
