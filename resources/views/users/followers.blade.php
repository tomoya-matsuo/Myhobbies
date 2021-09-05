@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- ユーザ一覧 --}}
            
            @if (count($users) ==0)
            <p class ="text-center">
                <b>フォロワーはまだいません。</b>
            </p>      
            @else
            <div class="card-header p-3 w-100 text-dark">
                <ul class="list-unstyled">
                    @foreach ($users as $user)
                    <div class="card bg-dark">
                        <div class="index">    
                            <div class="card-header p-3 w-100 d-flex text-dark">
                                <img src="{{asset('storage/profile_image/'.$user->profile_image)}}"
                                class="rounded-circle" style="width:40px;height:40px;">
                                
                                <div class="ml-2 mr-2 d-flex flex-column">
                                   <div>
                                       {{ $user->name }}
                                   </div>
                                    
                                </div>
                                
                                <div class="profile">
                                {{-- ユーザ詳細ページへのリンク --}}
                                <p>{!! link_to_route('users.show', 'プロフィール', ['user' => $user->id]) !!}</p>
                                </div>
                            </div>
                        </div>    
                    </div>    
                    @endforeach    
                </ul>
                {{--ページネーションのリンク--}}
                {{$users->links() }}
            @endif   
        </div>
    </div>
@endsection