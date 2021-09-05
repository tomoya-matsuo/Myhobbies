@extends('layouts.app')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        
        <img src="{{asset('storage/profile_image/'.($hobby->user->profile_image??'user_default.jpg'))}}"
        class="rounded-circle" style="width:40px;height:40px;">
        <div class="text-muted small mr-3"> 
            {{$hobby->user->name}}
        </div>
        <h4>{{$hobby->title}}</h4>
    </div>
    <div class="card-body">
        <p class="card-text">
            {{$hobby->content}}
        </p>
        @if ($hobby->image)
        <img src="{{asset('storage/images/'.$hobby->image)}}" 
        class="img-fluid mx-auto d-block" style="height:300px;">
        @endif
    </div>
    <div class="card-footer">
        @if (Auth::id() == $hobby->user_id)
        <div class="btn-group btn-group-sm">
            <span class="ml-auto">
                <a href="{{route('hobbies.edit', $hobby)}}"><button class="btn btn-primary">編集</button></a>
            </span>
            {{-- 投稿削除ボタンのフォーム --}}
            {!! Form::open(['route' => ['hobbies.destroy', $hobby->id], 'method' => 'delete']) !!}
            {!! Form::submit('投稿の削除', ['class' => 'btn btn-danger btn-sm mt-1 ml-2']) !!}
            {!! Form::close() !!}
        </div>    
        @endif
        <span class="mr-2 mt-2 float-right">
            投稿日時 {{$hobby->created_at->diffForHumans()}}
        </span>
        {{--お気に入り/お気にいり解除ボタン--}}
        <div class ="text-left">
        @include('favorites.favorite_button')
        </div>              
    </div>
</div>

@endsection