@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Add Post</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('p.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="caption">Caption:</label>
                    <input type="text" id="caption" name="caption" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea type="text" id="caption" name="description" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="picture">Picture:</label>
                    <input type="file" name="picture" id="picture" class="form-control-file">
                </div>
                <button class="btn btn-primary btn-lg">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
