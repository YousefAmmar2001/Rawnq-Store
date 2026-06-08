@props([
    'label' => false,
    'name',
    'options' => [],
    'selected' => null,
])

<div class="form-group">
    <label>{{ $label }}</label>
    <select {{ $attributes->class(['form-control', 'select2']) }} name="{{ $name }}" style="width: 100%;">
        {{ $slot }}
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @selected(old($name, $selected) == $value)>
                {{ $text }}
            </option>
        @endforeach
    </select>
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
