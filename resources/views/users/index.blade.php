@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($users as $user)
                    <div class="card bg-dark">
                        <div class="index">    
                            <div class="card-header p-3 w-100 d-flex text-dark">
                                <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 mr-2 d-flex flex-column">
                                   <div>
                                       {{ $user->name }}
                                   </div>
                                    
                                </div>
                                
                                <div class="profile">
                                {{-- ユーザ詳細ページへのリンク --}}
                                <p>{!! link_to_route('users.show', 'プロフィール', ['user' => $user->id]) !!}</p>
                                </div>
                            </div>
                        <div></div>    
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection