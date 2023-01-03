@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"> Edit Caption </div>
            <img class="card-img-bot" style="width: 100%; height: 100%;" src="{{asset('images/posts/' . $post->image)}}" alt="{{$post->caption}}" width="200px" height="200px">
            <div class="card-body pl-0 pr-0">
                <form method="POST" action="/post/{{$post->id}}">
                    @csrf
                    @method('PUT')

                    <div style="padding-right: 13%">
                    <x-textareamid label="Caption" name="caption" :object="$post" style="width: 100%; max-width: 100%;" />
                    </div>

                    <x-submitbtn text="Update Post!" />
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection




