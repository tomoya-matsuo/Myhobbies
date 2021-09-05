@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h3>アカウント編集</h3>
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
            
            {!! Form::model($user,['route' => 'users.update','files' => true,'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name','ニックネーム') !!}
                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('profile_image','プロフィール画像(任意)') !!}
                    {!! Form::file('profile_image',['id' => 'profile_image']) !!}
                </div>                

                <div class="form-group">
                    {!! Form::label('email','メールアドレス') !!}
                    {!! Form::email('email',null,['class' => 'form-control']) !!}
                </div>   
                
                <div class="form-group">
                    {!! Form::label('password','パスワード') !!}
                    {!! Form::password('password',['class' => 'form-control']) !!}
                </div>        
                
                <div class="form-group">
                    {!! Form::label('password_confirmation','パスワードの再確認') !!}
                    {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
                </div>     
                
                {!! Form::submit('編集の更新',['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
   
@endsection    