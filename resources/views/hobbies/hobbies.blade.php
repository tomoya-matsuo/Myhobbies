@extends('layouts.app')
@section('content')

@if(session('message'))
    <div class = "alert alert-success">{{ session('message') }}</div>
@endif

<p class="mb-4">こんにちは、{{ $user->name }}さん</p>
@foreach ($hobbies as $hobby)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <img src="{{asset('storage/profile_image/'.($hobby->user->profile_image)??'user_default.jpg')}}"
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
