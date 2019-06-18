<div class="row">
    <div class="col-md-4">
        <div class="mt-6 ml-6">
            <img class="rounded-circle" src=" {{$user->profile->profilePicture()}}"
                 alt="{{$user->profile->title}}" style="width: 250px;height: 250px;">
        </div>
    </div>
    <div class="col-md-8">
        <div class="row mt-4">
            <div class="col">
                <h2>
                    {{$user->username}}
                    @include('profiles.follow')
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>{{$user->profile->title}}</p>
                <p>{{$user->profile->bio}}</p>
                <p><a href="{{$user->profile->url}}" target="_blank">{{$user->profile->url}}</a></p>
            </div>

        </div>
    </div>
</div>