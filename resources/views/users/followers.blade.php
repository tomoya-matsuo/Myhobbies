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
            @endif
            
            <div class="card-header p-3 w-100 d-flex text-dark">
                @include('users.users')
            </div>    
        </div>
    </div>
@endsection