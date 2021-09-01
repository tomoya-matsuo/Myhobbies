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
                        <div class="media-body ml-1">趣味名: <b>{{ $hobby->title }}</b>
                            
                            <div class="text-muted small">Posted_by{!! link_to_route('users.show', $hobby->user->name, ['user' => $hobby->user->id]) !!}</div>

                        </div>
                        
                        <div class="text-muted small ml-3">
                            <div>投稿日</div>
                            <div><strong>{{ $hobby->created_at->diffForHumans() }}</strong></div>
                            
                            <span class="ml-auto">
                                <a href="{{route('hobbies.edit', $hobby)}}"><button class="btn btn-primary">編集</button></a>
                            </span>
                            
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
                @if (Auth::id() == $hobby->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['hobbies.destroy', $hobby->id], 'method' => 'delete','class' => 'text-right']) !!}
                    {!! Form::submit('投稿の削除', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif         
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- ページネーションのリンク --}}
{{ $hobbies->links() }}
@endsection
