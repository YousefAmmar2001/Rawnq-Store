@props(['options', 'name', 'checked'])

<div class="form-group">
    <label>{{ $slot }}</label>
    @foreach ($options as $value => $text)
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="{{ $name . '_' . $value }}" name="{{ $name }}"
                value="{{ $value }}" @checked(old($name, $checked) == $value)>
            <label for="{{ $name . '_' . $value }}" class="custom-control-label">{{ $text }}</label>
        </div>
    @endforeach
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
