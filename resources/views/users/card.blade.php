<div class="card">
    <div class="card-header text-center">
        <h3 class="card-title">{{ $user->name }}</h3>
        @if ($user->id == Auth::user()->id)
            <a href="{{route('users.edit', auth()->user()->id)}}" 
            class="btn btn-outline-info common-btn edit-profile-btn {{url()->current()==route('users.edit', auth()->user()->id)?'active':''}}">
            <i class="fas fa-cog mr-2"></i><span>プロフィール編集</span>   
            </a>
        @endif       
    </div>
        <div class="media flex-wrap w-100 align-items-center">  
            <div class="card-body text-center">
                <img src="{{asset('storage/profile_image/'.$user->profile_image)}}"
                class="rounded-circle img-fluid m-auto" style="width:180px;height:180px;">
            </div>
        </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')