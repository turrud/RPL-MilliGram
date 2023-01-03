@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            @forelse ($posts as $post)
            @if (($post->status=='available' && $post->user->status=='available') || Auth::user()->type=='admin')
            <div class="card" style="width: 482px;" >
                <div class="card-header pl-3 d-flex flex-row">
                    <span>
                        <x-avatar :user="$post->user" :w="35" :h="35" link="{{'@' . Auth::user()->username}}" />
                        <a style="position: relative; left: 2.5px;" class="text-dark font-weight-bold pl-1" href="/{{'@'.$post->user->username}}">
                            {{$post->user->username}}
                        </a>
                        @if ($post->user->type == 'business')
                            <span class="pl-2 text-muted">
                                Business
                            </span>
                        @endif
                    </span>
                    @if (Auth::user()->id == $post->user->id)
                    <span class="p-1 ms-auto">
                        <a href="/post/{{$post->id}}/edit">Edit</a>
                    </span>
                    @elseif (Auth::user()->type == 'admin')
                    <span class="p-1 ms-auto">
                        {{'id : '.$post->id}}
                    </span>
                    @else
                    <span class="p-1 ms-auto">
                        <x-reportpost :post="$post" :reporter="$user" />
                    </span>
                    @endif
                </div>
                <x-post :post="$post" />
            </div>
            <br>
            @endif
            @empty
                <p> Tidak ditemukan. </p>
            @endforelse
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
