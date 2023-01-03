@extends('layouts.app')

@if (($post->status=='available'&&$post->user->status=='available') || Auth::user()->type=='admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex flex-row">
                <span style="position: relative; top: 2px;">
                    <x-avatar :user="$post->user" :w="35" :h="35" link="profile" />
                    <a style="position: relative; left: 2.5px;" class="text-dark font-weight-bold" href="/{{'@'.$post->user->username}}">
                        {{$post->user->username}}
                    </a>
                </span>
                @if (Auth::user()->id == $post->user->id)
                <span class="p-1 ms-auto">
                    <a href="/post/{{$post->id}}/edit">Edit</a>
                </span>
                @elseif (Auth::user()->type == 'admin')
                <span class="p-1 ms-auto">
                <form method="POST" action="/post/{{$post->id}}">
                    @csrf
                    @method('PUT')
                    @if ($post->status=='available')
                    <input type="hidden" name="status" value="banned" />
                    <button type="submit" class="btn btn-danger btn-sm">Ban this post!</button>
                    @else
                    <input type="hidden" name="status" value="available" />
                    <button type="submit" class="btn btn-warning btn-sm">Unban this post!</button>
                    @endif
                </form>
                </span>
                @else
                <span class="p-1 ms-auto">
                    <x-reportpost :post="$post" :reporter="$user" />
                </span>
                @endif


            </div>
                    <img style="margin: auto; width: 100%; height: 100%;" class="card-img-bot" src="{{asset('images/posts/' . $post->image)}}" alt="{{$post->caption}}" width="670px" height="670px" ondblclick="like({{$post->id}})">
            <div class="card-footer pl-3 pr-3 bg-transparent d-inline-flex flex-column">
                <div class="">
                    <span class="total_count" id="post-likescount-{{$post->id}}"> {{$post->likes_count}} </span>
                    <a style="text-decoration: none;" href="javascript:void(0);" class="text-dark" onclick="like({{$post->id}})" id="post-btn-{{$post->id}}">
                        {{ ($post->is_liked() ? 'unlike' : 'like' ) }}
                    </a>
                </div>
                <div>
                    <a class="text-dark font-weight-bold" href="/{{'@'.$post->user->username}}">{{$post->user->username}}</a>
                    <span class="captions"> {{$post->caption}} </span>
                </div>
                <div>
                    <small>
                        <span style="text-transform: uppercase; font-size: 0.85em;" class="text-muted">
                            {{$post->created_at->diffForHumans()}}
                        </span>
                    </small>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll(".captions").forEach(function(el){
    let renderedText = el.innerHTML.replace(/#(\w+)/g, "<a href='/search?query=%23$1'>#$1</a>");
    el.innerHTML = renderedText
})
    function like(id) {
        let likesCount = 0
        const el = document.getElementById('post-btn-' + id)
        likesCount = document.getElementById('post-likescount-' + id)

        fetch('/like/' + id)
            .then(response => response.json())
            .then(data => {
                let currentCount = 0

                if (data.status == 'LIKE'){
                    currentCount = parseInt(likesCount.innerHTML) + 1
                    el.innerText = 'unlike'
                } else {
                    currentCount = parseInt(likesCount.innerHTML) - 1
                    el.innerText = 'like'
                }
                likesCount.innerHTML = currentCount
            });
    }
    </script>
@endsection
@endif
