@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="row mb-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">

                                    <a href="{{route('profile',['user'=>$post->user->username])}}" class="text-dark" style="text-decoration: none;">
                                        <img src="{{$post->userProfilePicture()}}" alt="{{$post->user->username}}"
                                             class="rounded-circle" height="60px">
                                        <strong>{{$post->username()}}</strong>
                                    </a>
                                </div>

                                <a href="{{route('p.show',['p'=>$post->id])}}" >
                                    <img src="{{$post->postPicture()}}" alt="{{$post->caption}}" class="img-thumbnail">
                                </a>
                                <div class="card-body">
                                    <strong>{{$post->caption}}</strong>
                                    <p>{{$post->description}}</p>

                                    <a href="@guest # @endguest @auth {{route('p.like',['uid'=> Auth::user()->id,'pid'=>$post->id])}} @endauth"
                                       class="btn
{{--                                                {{$post->liked() ? "btn-danger" : "btn-light"}}--}}
                                               ">
                                        <i class="fa fa-heart"></i> <strong>{{$post->likes()}}</strong>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{$posts->links()}}
                @endforeach
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <img src="{{Auth::user()->profile->profilePicture()}}" alt="{{Auth::user()->username}}"
                             class="rounded-circle" height="60px">
                        <strong>{{Auth::user()->username}}</strong>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
