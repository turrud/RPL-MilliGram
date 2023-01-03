@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Report </div>
                <div class="card-body">
                    <form method="POST" action="/post/{{$post->id}}">
                        @csrf
                        @method('PUT')

                        <img src="{{asset('images/posts/' . $post->image)}}" alt="{{$post->caption}}" width="200px" height="200px">
                        <x-textarea label="Description" name="description" :object="$post"  />

                        <x-submitbtn text="Send Report!" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




