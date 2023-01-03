<div class="form-group d-flex flex-row">
    <label for="{{$label ?? $name}}" class="pt-0 col-md-auto col-form-label text-md-right"> {{$label ?? $name}} </label>
    <div class="me-auto pl-3">
        <input type="file" name="{{$name}}" id="{{$name}}" />
    </div>
    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            {{ $errors->first($name) }}                                                      "
        </span>
    @endif
</div>
