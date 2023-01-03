
<a style="text-decoration: none;" id="navbarDropdown" class="hover-img" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    <img style="position: relative; left: 6px;" src="{{ asset('/images/BtnReport.svg')}}">
</a>
<div class="dropdown-menu dropdown-menu-end pt-0">
    <form method="POST" action="/report">
        @csrf
        <div class="card d-flex flex-column align-items-center border-light">



            <input type="hidden" name="reporter_id" value="{{$reporter->id}}" />
            <input type="hidden" name="post_id" value="{{$post->id}}" />
            <span class="pb-2 pt-0">
                <x-textareanobj placeholder="Description..." name="description" />
            </span>
            <button type="submit" class="btn btn-outline-danger btn-block col-md-9">
                Report post!
            </button>
        </div>
    </form>
</div>
