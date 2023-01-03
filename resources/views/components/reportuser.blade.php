
<a style="text-decoration: none;" id="navbarDropdown" class="hover-img" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    <img style="position: relative; left: 6px;" src="images/BtnReport.svg">
</a>
<div class="dropdown-menu dropdown-menu-end pt-0 pb-0">
    <form method="POST" action="/report">
        @csrf
        <div class="form-group d-flex flex-column align-items-center">



            {{-- <a>{{$post->id}}</a> --}}
            <input type="hidden" name="reporter_id" value="{{$reporter->id}}" />
            <input type="hidden" name="user_id" value="{{$user->id}}" />
            <span class="pb-2 pt-0">
                <x-textareanobj placeholder="Description..." name="description" />
            </span>
                {{-- <x-submitbtn text="Report post!" class="btn btn-outline-danger btn-block" /> --}}
            <button type="submit" class="btn btn-outline-danger btn-block col-md-10">
                Report user!
            </button>
        </div>
    </form>
</div>
    {{-- <a class="dropdown-item">


    </a> --}}

    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
Report
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        <x-textareanobj label="Description" name="description" />

        <x-submitbtn text="Send Report!" />
    </form> --}}

