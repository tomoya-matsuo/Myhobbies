@extends('layouts.app')
@section('content')
<p class="mb-4">こんにちは、{{ $user->name }}さん</p>
@foreach ($hobbies as $hobby)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-1">趣味名:{{ $hobby->title }}</div>
                            <div class="text-muted small">Posted_by{!! link_to_route('users.show', $hobby->user->name, ['user' => $hobby->user->id]) !!}
                        </div>
                        <div class="text-muted small ml-3">
                            <div>投稿日</div>
                            <div><strong>{{ $hobby->created_at->diffForHumans() }}</strong></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p ml-2>{{ $hobby->content }}</p>
                </div>
                @if (Auth::id() == $hobby->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['hobbies.destroy', $hobby->id], 'method' => 'delete']) !!}
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
