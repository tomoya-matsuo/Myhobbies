@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h1 class="mt4">新規投稿</h1>
            @if (count($errors) > 0)
                <ul class="alert alert-danger" role="alert">
                    
                    @foreach ($errors->all() as $error)
                        <li class="ml-2">{{ $error }}</li>
                    @endforeach
                    
                    @if(empty($errors->first('image')))
                        <li class="ml-2">画像ファイルがある場合は、再度選択してください。</li>
                    @endif
                    
                </ul>    
            @endif        
            

                
            {{ Form::open(['route' => 'hobbies.store','files' => true]) }}
                    @csrf

                <div class="form-group">
                    {{ Form::text('title','',['class' => 'form-control','id' =>"title",'placeholder'=>'趣味名']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('content','ポイント(趣味の特徴や魅力等を記入して下さい)') }}
                    
                    {{ Form::textarea('content','',['class' => 'form-control','id' => 'content','cols' => '30','rows' => '10','placeholder' => '']) }}
                </div>

                <div class="form-group">
         
                    {{ Form::label('image','画像') }}
                    <div class="col-md-6">
                        {{ Form::file('image',['id' => 'image']) }}
                    </div>
                </div>

                <button type="submit" class="btn btn-success">投稿</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection