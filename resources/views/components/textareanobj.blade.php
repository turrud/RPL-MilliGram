
    <label for="{{$name}}" class="d-flex justify-content-center col-form-label text-md-right"> {{$label ?? ""}} </label>

    <div class="col-md-6">
<textarea placeholder="{{$placeholder ?? ""}}" class="textarea d-flex justify-content-center" name="{{$name}}" id="{{$name}}">
</textarea>

        @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            {{ $errors->first($name) }}
        </span>
        @endif
    </div>
