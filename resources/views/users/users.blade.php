@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                {{--ユーザのメールアドレスを基にGravatarを取得して表示--}}
                <img src="{{ $user->profile_image }}" class="rounded-circle" width="100" height="100">
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
        @endforeach
    </ul>
    {{--ページネーションのリンク--}}
    {{$users->links() }}
@endif    