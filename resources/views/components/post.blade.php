<img class="card-img-bot" style="width: 100%; height: 100%;" src="{{asset('images/posts/' . $post->image)}}" alt="{{$post->caption}}"
        width="1080px" height="1080px" ondblclick="like({{$post->id}})"/>
    <div class="card-footer pl-3 pr-3 bg-transparent d-inline-flex flex-column">
        <div class="">
            <span class="total_count" id="post-likescount-{{$post->id}}"> {{$post->likes_count}} </span>
            <a style="text-decoration: none;" href="#" class="text-dark" onclick="like({{$post->id}})" id="post-btn-{{$post->id}}">
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

