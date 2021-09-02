<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザ詳細タブ --}}
    <li class="nav-item">
        <a href="{{ route('hobbies.mypost', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.mypost') ? 'active' : '' }}">
            投稿一覧
            <span class="badge badge-secondary">{{ $user->hobbies_count }}</span>
        </a>
    </li>
    {{-- フォロー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            フォロー
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- フォロワー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            フォロワー
            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
        </a>
    </li>
</ul>