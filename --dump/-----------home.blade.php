@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                
                <div class="card-header"><h3>Feed @isset($querySearch) "{{$querySearch}}" @endisset</h3></div>
                
                <div class="card-body">
                    
                    @forelse ($posts as $post)
                        
                    <x-post :post="$post" />        
                        
                    <br>
                
                    
                    @empty
                        <p> Tidak ditemukan. </p>
                    @endforelse
                    {{-- <x-avatar :user="$user" />
                    <h1>{{$user->username}} - {{$user->fullname}}</h1>
                    <p>{{$user->bio}}</p> --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    {{-- <br>
                    {{ __('You are logged in!') }} --}}
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
