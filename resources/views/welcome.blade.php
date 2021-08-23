@extends('layouts.app')

@section('content')
    @if (Auth::check())
        ようこそ、{{ Auth::user()->name }}さん。
    @else    
        <div class="text-center pr-1 pt-5">
            <h1 class="display-4">見つけよう。<br>新しい自分。</h1>
             {{-- ユーザ登録ページへのリンク --}}
             {!! link_to_route('signup.get', '始める', [], ['class' => 'btn btn-lg btn-outline-dark']) !!}
        </div>    
       
       <div>
            <img src="{{ '/img/top.png' }}" class="img-fluid">
        </div>
    @endif    
@endsection