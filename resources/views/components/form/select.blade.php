@props([
    'label' => false,
    'name',
    'options' => [],
    'selected' => false,
    'textField' => 'name',
    'valueField' => 'id',
])

<div class="form-group">
    <label>{{ $label }}</label>
    <select {{ $attributes->class(['form-control', 'select2']) }} name="{{ $name }}" style="width: 100%;">
        {{ $slot }}
        @foreach ($options as $item)
            <option value="{{ $item->$valueField }}" @selected(old($name, $selected) == $item->$valueField)>
                {{ $item->$textField }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
