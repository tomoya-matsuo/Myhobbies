@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="col-8">
        {{--投稿一覧--}}
        @include('hobbies.hobbies')
    </div>
    @else    
    <div class="container">
        <div class="text-center pr-1 pt-5">
            <h1 class="display-4">見つけよう。<br>新しい自分。</h1>
             {{-- ユーザ登録ページへのリンク --}}
             {!! link_to_route('signup.get', '始める', [], ['class' => 'btn btn-lg btn-outline-dark']) !!}
        </div>    
       
       <div>
            <img src="{{ '/img/top.png' }}" class="img-fluid">
        </div>
    </div>    
    @endif    
@endsection