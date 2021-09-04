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
            {{--投稿一覧--}}
            
            @if (count($hobbies) ==0)
            <p class ="text-center">
                <b>お気に入りはまだありません。</b>
            </p>
            @endif
            
            @foreach ($hobbies as $hobby)
            <div class="container-fluid mt-20" style="margin-left:-10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="media flex-wrap w-100 align-items-center">
                                    <img src="{{asset('storage/profile_image/'.($user->profile_image??'user_default.jpg'))}}"
                                    class="rounded-circle" style="width:40px;height:40px;">
                                    
                                    <div class="media-body ml-3">趣味名: <b><a href = "{{ route('hobbies.show',$hobby) }}">{{ $hobby->title }}</a></b>
                                        
                                        <div class="text-muted small">Posted_by{!! link_to_route('users.show', $hobby->user->name, ['user' => $hobby->user->id]) !!}</div>
            
                                    </div>
                                    
                                    <div class="text-muted small ml-3">
                                        <div>投稿日</div>
                                        <div><strong>{{ $hobby->created_at->diffForHumans() }}</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($hobby->image)
                                <div class="text-center pb-3">
                                    <img src="{{ asset('storage/images/'.$hobby->image) }}"
                                    class="img-fluid mx-auto d-block" style="height:300px;">
                                </div>
                                @endif
                                <p ml-2><b>ポイント</b><br>{{ $hobby->content }}</p>
                            </div>
                            {{--お気に入り/お気にいり解除ボタン--}}
                            <div class ="text-right">
                            @include('favorites.favorite_button') 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- ページネーションのリンク --}}
            {{ $hobbies->links() }}
            @endsection
        </div>
    </div>    