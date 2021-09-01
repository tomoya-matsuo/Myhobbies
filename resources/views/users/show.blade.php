@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-info text-center">{{ $user->name }}</h3>
                </div>
                     <div class="p-3 d-flex flex-column">
                        <img src="{{ $user->profile_image }}" class="rounded-circle" width="100" height="100">
                    </div>
            </div>
            @include('user_follow.follow_button')
            
        </aside>
        
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- 投稿一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link text-dark{{ Request::routeIs('users.show') ? 'active' : '' }}">
                    投稿一覧
                     <span class="badge badge-secondary">{{ $user->hobbies_count }}</span>
                    </a>
                </li>    
                     
                {{-- フォロー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                        フォロー
                    <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                    </a>
                </li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                        フォロワー
                    <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                    </a>
                </li>
                {{--お気に入りタブ--}}
                <li class="nav-item"><a href="#" class="nav-link text-dark">お気に入り</a></li>
            </ul>

        </div>
    </div>
@endsection