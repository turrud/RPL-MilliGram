<div class="row mb-3">
    <label for="{{$name}}" class="col-md-4 col-form-label text-md-right"> {{$label}} </label>

    <div class="col-md-6">
        <input id="{{$name}}" type="{{$type ?? 'text'}}" pattern="{{$pattern ?? '.*'}}" placeholder="{{$placeholder ?? ''}}" class="form-control @error($name) is-invalid @enderror"
                name="{{$name}}"
                @isset(($object->{$name})) value="{{ old($name) ? old($name) : $object->{$name} }}"
                @else value="{{ old($name) }}" @endisset
                autocomplete="{{$name}}" autofocus>

        @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
                {{ $errors->first($name) }}
        </span>
        @endif
    </div>
</div>
