<div class="form-group d-flex flex-row">
    <label for="{{$name}}" class="col-md-auto col-form-label text-md-left"> {{$label}} </label>

    <div class="me-auto pl-1">
<textarea class="textarea" name="{{$name}}" id="{{$name}}">
@isset(($object->{$name})){{ old($name) ? old($name) : $object->{$name} }}
@else{{old($name)}}@endisset
</textarea>

        @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            {{ $errors->first($name) }}
        </span>
        @endif
    </div>
</div>
