@if(Auth::user() && Auth::user()->username != $user->username)

    @if($user->isFollower(Auth::user()->id))
        <a href="{{route('unfollow',['user'=>$user->id])}}" class="btn btn-secondary">UnFollow</a>
    @else
        <a href="{{route('follow',['user'=>$user->id])}}" class="btn btn-primary">Follow</a>
    @endif
@endif