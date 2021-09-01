@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h1 class="mt4">投稿編集</h1>
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
            
            @if(session('message'))
                <div class = "alert alert-success">{{ session('message') }}</div>
            @endif
                
           {{ Form::model($hobby,['route' => ['hobbies.update',$hobby->id],'files' => true,'method' => 'put']) }}
                    @csrf

                <div class="form-group">
                    {{ Form::label('title','趣味名') }}
                    {{ Form::text('title',$hobby->title,['class' => 'form-control','id' =>"title",'placeholder'=>'趣味名']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('content','ポイント(趣味の特徴や魅力等を記入して下さい)') }}
                    
                    {{ Form::textarea('content',$hobby->content,['class' => 'form-control','id' => 'content','cols' => '30','rows' => '10','placeholder' => '']) }}
                </div>
                
                <div class="form-group">
                    <div>
                        @if($hobby->image)
                        <img src="{{ asset('storage/images/'.$hobby->image)}}" 
                        class="img-fluid mx-auto d-block" style="height:200px;">
                        @endif
                    </div>    
                    {{--画像の送信--}}
                    {{ Form::label('image','画像') }}
                    <div class="col-md-6">
                       {{ Form::file('image',['id' => 'image']) }}
                    </div>
                </div>

                <button type="submit" class="btn btn-success">投稿の編集</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection