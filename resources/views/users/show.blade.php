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
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- ユーザ詳細タブ --}}
                <li class="nav-item"><a href="#" class="nav-link text-dark">投稿一覧</a></li>
                {{-- フォロー一覧タブ --}}
                <li class="nav-item"><a href="#" class="nav-link text-dark">フォロー</a></li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item"><a href="#" class="nav-link text-dark">フォロワー</a></li>
                {{--お気に入りタブ--}}
                <li class="nav-item"><a href="#" class="nav-link text-dark">お気に入り</a></li>
                
            </ul>
        </div>
    </div>
@endsection