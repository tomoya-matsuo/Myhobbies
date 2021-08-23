@extends('layouts.app')

@section('content')
 <div class="signup">
    <div class="text-center">
        <h1>新規登録</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name','氏名') !!}
                    {!! Form::text('name',null,['class' => 'form-control']) !!}
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
                
                {!! Form::submit('始める！',['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
  </div>    
@endsection    