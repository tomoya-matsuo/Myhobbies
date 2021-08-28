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
            
            @if(session('message'))
                <div class = "alert alert-success">{{ session('message') }}</div>
            @endif
                
            <form method="post" action="{{route('hobbies.store')}}" enctype="multipart/form-data">
                    @csrf

                <div class="form-group">
                    <label for="title">件名</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="趣味名">
                </div>

                <div class="form-group">
                    <label for="content">本文</label>
                    <textarea type="text" name="content" class="form-control" id="body" cols="30" rows="10">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">画像 </label>
                    <div class="col-md-6">
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">投稿</button>
            </form>
        </div>
    </div>
</div>
@endsection