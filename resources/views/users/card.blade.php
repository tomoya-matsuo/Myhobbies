<div class="card">
    <div class="card-header text-center">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class ="row">
        <div class="card-body">
            <img src="{{asset('storage/profile_image/'.$user->profile_image)}}"
                            class="rounded-circle" style="width:150px;height:150px;">
        </div>
    </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')