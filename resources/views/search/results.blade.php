@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#people" role="button" aria-expanded="false" aria-controls="people">
                        People
                    </a>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#posts" aria-expanded="false" aria-controls="posts">
                        Posts
                    </button>
                </p>
                <div class="row">
                    <div class="col">
                        <div class="collapse show" id="people">
                            <div class="card card-body">
                                @foreach($profiles as $profile)
                                    <div class="media">
                                        <a href="{{route('profile', ['user'=>$profile->user->username])}}">
                                        <img src="{{$profile->profilePicture()}}" class="img-thumbnail rounded-circle" alt="{{$profile->title}}" width="100px">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{route('profile', ['user'=>$profile->user->username])}}">
                                                <h5 class="mt-0">{{$profile->title}}</h5>
                                            </a>
                                            {{$profile->bio}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="collapse" id="posts">
                            <div class="card card-body">
                                @foreach($posts as $post)
                                    <div class="media">
                                        <a href="{{route('p.show', ['p'=>$post->id])}}">
                                            <img  src="{{$post->postPicture()}}" class="img-thumbnail rounded-circle" alt="{{$post->caption}}" width="100px">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{route('p.show', ['p'=>$post->id])}}">
                                                <h5 class="mt-0">{{$post->caption}}</h5>
                                            </a>
                                            {{$post->description}}
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection