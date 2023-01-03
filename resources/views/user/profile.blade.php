@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto" style="width: 62.9%">
            <div class="card">
                <div class="card-header pb-1 d-flex flex-row">
                    <span>
                        <h5>{{'@'.$user->username}}</h5>
                    </span>
                    <span class="ms-auto pr-1">
                        @if (Auth::user()->id == $user->id)
                        @elseif (Auth::user()->type == 'admin')
                        <form method="POST" action="/ban">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}" />
                            @if ($user->status=='available')
                            <input type="hidden" name="status" value="banned" />
                            <button type="submit" class="btn btn-danger btn-sm">Ban this user!</button>
                            @else
                            <input type="hidden" name="status" value="available" />
                            <button type="submit" class="btn btn-warning btn-sm">Unban this user!</button>
                            @endif
                        </form>
                        @else
                            @if ($user->status=='available')
                            <x-reportuser :user="$user" :reporter="Auth::user()"/>
                            @endif
                        @endif
                    </span>
                </div>
                @if ($user->status=='available' || Auth::user()->type=='admin')
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <span>
                            <x-avatar class="" :user="$user" />
                        </span>
                        <span class="pl-3 me-auto">
                            <h3>{{$user->fullname}}</h3>
                            <p>{{$user->bio}}</p>
                            @if (Auth::user()->type == 'admin')
                            @elseif (Auth::user()->id == $user->id)
                                <a class="btn btn-outline-primary" href="/user/edit">Edit Profile</a>
                            @else
                                <button class="btn btn-outline-primary" onclick="follow({{$user->id}}, this)">
                                    {{ ($user->is_followed() ? 'Unfollow' : 'Follow' ) }}
                                </button>
                            @endif
                        </span>
                        @if ($user->type != 'admin')
                        <span class="ms-auto d-flex flex-row">
                            <div class="d-flex flex-column text-md-center pr-4">
                                <span class="text-dark font-weight-bold">Followings</span>
                                <span>{{$followingsCount ?? '0'}}</span>
                            </div>
                            <div class="d-flex flex-column text-md-center">
                                <span class="text-dark font-weight-bold">Followers</span>
                                <span class="total_count" id="user-followerscount-{{$user->id}}"> {{$followersCount ?? '0'}} </span>
                            </div>
                        </span>
                        @endif
                    </div>
                    @if ($user->type =="business")
                    <div class="pt-3 d-flex flex-column">
                        <button class="btn btn-outline-dark btn-block" onclick="website()">Business Website</button>
                    </div>
                    <div class="d-flex align-items-end">
                            <button class="btn btn-outline-dark btn-block" onclick="address()">Business Address</button>
                            <button class="btn btn-outline-dark btn-block" onclick="contact()">Business Contacts</button>
                    </div>
                    @endif
                    <script>
                        function website(){
                            var web = {!! json_encode($user->business_website) !!};
                            prompt("Copy to clipboard: Ctrl+C, Enter", web);
                        }
                        function address(){
                            var adr = {!! json_encode($user->business_address) !!};
                            prompt("Copy to clipboard: Ctrl+C, Enter", adr);
                        }
                        function contact(){
                            var con = {!! json_encode($user->business_contact) !!};
                            prompt("Copy to clipboard: Ctrl+C, Enter", con);
                        }
                        function follow(id, el) {
                            let followersCount = 0
                            followersCount = document.getElementById('user-followerscount-' + id)

                            fetch('/follow/' + id)
                                .then(response => response.json())
                                .then(data => {
                                    let currentCount = 0

                                    if (data.status == 'FOLLOW'){
                                        currentCount = parseInt(followersCount.innerHTML) + 1
                                        el.innerText = 'Unfollow'
                                    } else {
                                        currentCount = parseInt(followersCount.innerHTML) - 1
                                        el.innerText = 'Follow'
                                    }
                                    followersCount.innerHTML = currentCount
                                });
                        }
                    </script>
                </div>
                <div class="card-footer bg-transparent pl-0 pr-0 pt-0 pb-1">
                    <div class="d-inline-flex flex-wrap flex-row">
                    @foreach ($user->posts->reverse() as $post)
                    @if ($post->status=='available' || Auth::user()->type=='admin')
                                <a href="post/{{$post->id}}">
                                    <img class="card-img-bot pl-1 pt-1" style="width: 200px; height: 200px;" src="{{asset('images/posts/' . $post->image)}}" alt="{{$post->caption}}" width="200px" height="200px"/>
                                </a>
                    @endif
                    @endforeach
                </div>
                </div>
                @else
                <div class="card-body">
                This user is banned.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
