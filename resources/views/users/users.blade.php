@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
        <div class="container-fluid mt-20" style="margin-left:-10px;">
            <div class="row">
                <li class="media">
                    <img src="{{asset('storage/profile_image/'.($hobby->user->profile_image)??'user_default.jpg')}}"
                    class="rounded-circle" style="width:40px;height:40px;">
                    <div class="media-body">
                        <div>
                            {{ $user->name }}
                        </div>
                        <div>
                            {{--ユーザ詳細ページへのリンク--}}
                            <p>{!! link_to_route('users.show','プロフィール',['user' => $user->id]) !!}</p>
                            
                        </div>
                    </div>
                </li>
            </div>    
        </div>    
        @endforeach    
    </ul>
    {{--ページネーションのリンク--}}
    {{$users->links() }}
@endif    