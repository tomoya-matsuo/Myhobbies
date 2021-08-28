<header class="mb-5">
    <nav class="navbar navbar-expand-sm navbar-light bg-info">
        {{-- トップページへのリンク --}}
        <div class="logo">
            <h1><a href="/">シュミコレ</a></h1>
        </div>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{--アバウトページへのリンク--}}
                        <li class="nav-item"><a href="about" class="nav-link text-light">シュミコレとは?</a></li>
                @if (Auth::check())
                  {{--ユーザ一覧ページへのリンク--}}
                     <li class="nav-item">{!! link_to_route('users.index', 'ユーザ一覧', [], ['class' => 'nav-link text-light']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light" data-toggle="dropdown">{{ Auth::user()->name }} さん</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{--投稿ページへのリンク--}}
                            <li class="dropdown-item">{!! link_to_route('hobbies.show', '投稿', ['hobby' => Auth::id()]) !!}</li>
                            {{--ユーザ詳細ページへのリンク--}}
                           <li class="dropdown-item">{!! link_to_route('users.show', 'プロフィール', ['user' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            {{--ログアウトへのリンク--}}
                            <li class="dropdown-item">{{ link_to_route('logout.get','ログアウト') }}</li>
                        </ul>
                    </li>
                @else    
                    {{-- ユーザ登録ページへのリンク --}}
                    <li>{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link text-light']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link text-light']) !!}</li>
                @endif    
            </ul>
        </div>
    </nav>
</header>