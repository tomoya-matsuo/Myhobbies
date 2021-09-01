<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img src="{{ $user->profile_image }}" class="rounded-circle" width="100" height="100">
    </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')