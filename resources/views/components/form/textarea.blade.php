@props(['name', 'value' => '', 'label' => false])

<div class="form-group">
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <textarea name="{{ $name }}" id="{{ $name }}" placeholder="Enter {{ $label ?? $name }}"
        {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
