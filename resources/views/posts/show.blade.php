@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 pr-0">
                <img class="img-thumbnail" src="{{$post->postPicture()}}" alt="{{$post->caption}}">
            </div>
            <div class="col-md-4 pl-0">
                <div class="card">
                    <div class="card-header">
                        <img src="{{$post->userProfilePicture()}}" alt="{{$post->user->username}}"
                             class="rounded-circle" height="60px">
                        <strong>{{$post->username()}}</strong>

                        @include('profiles.follow')

                    </div>
                    <div class="card-body">
                        <p>{{$post->caption}}</p>
                        <p>{{$post->description}}</p>

                        <a href="@guest # @endguest @auth {{route('p.like',['uid'=> Auth::user()->id,'pid'=>$post->id])}} @endauth" class="btn {{$liked ? 'btn-danger' : 'btn-light'}}">
                            <i class="fa fa-heart"></i> <strong></strong>
                        </a>

                        <hr/>
                        <div>
                            <h4>Comments</h4>
                            @if($post->comments()->count())

                                @foreach($post->comments as $commentObj)
                                    <p>
                                        <strong>{{$commentObj->user->username}}</strong>
                                    <p>{{$commentObj->comment}}</p>
                                    </p>
                                    <hr>
                                @endforeach
                            @else
                                <div class="alert alert-info">No comments yet!</div>
                            @endif
                        </div>
                        <div>
                            @auth
                            <form action="{{route('p.comment',['post'=>$post->id ])}}" method="post">
                                @csrf
                                <input type="text" name="comment" class="form-control" placeholder="Add comment"
                                       id="comment">
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection