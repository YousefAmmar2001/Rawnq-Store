@props(['type' => 'text', 'name', 'value' => '', 'label' => false])

<div class="form-group">
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="Enter {{ $label ?? $name }}"
        {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
