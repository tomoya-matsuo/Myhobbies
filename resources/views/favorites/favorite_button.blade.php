@if (Auth::user()->is_favoriting($hobby->id))
        {{--お気に入り削除のフォーム--}}
        {!! Form::open(['route' => ['favorites.unfavorite',$hobby->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn", 'type' => 'submit']) !!}
        {!! Form::close() !!}    
@else
        {{--お気に入りボタンのフォーム--}}
        {!! Form::open(['route' => ['favorites.favorite',$hobby->id]]) !!}
            {!! Form::button('<i class="far fa-heart"></i>', ['class' => "btn", 'type' => 'submit']) !!}
        {!! Form::close() !!}    
@endif
