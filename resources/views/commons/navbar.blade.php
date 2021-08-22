<header class="mb-5">
    <nav class="navbar navbar-expand-sm navbar-light">
        {{-- トップページへのリンク --}}
        <div class="logo">
        <a class="navbar-brand text-light" href="/">シュミコレ</a>
        </div>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{--アバウトページへのリンク--}}
                <li class="nav-item"><a href="about" class="nav-link text-light">シュミコレとは?</a></li>
                {{-- ユーザ登録ページへのリンク --}}
               <li>{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link text-light']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li class="nav-item"><a href="#" class="nav-link text-light">ログイン</a></li>
            </ul>
        </div>
    </nav>
</header>