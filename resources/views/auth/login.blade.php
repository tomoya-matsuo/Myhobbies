@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h3>ログイン</h3>
    </div>
    @if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-2">{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    
    <div class="logo-img text-center">
        <img src="/img/logo.png">
    </div>

    <div class="row">
   
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-4 text-center">新しいユーザですか?? {!! link_to_route('signup.get', '新規登録') !!}</p>

    </div>
@endsection