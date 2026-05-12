@props(['type' => 'file', 'name', 'label' => false, 'value' => null])

<div class="form-group">
    @if ($label)
        <label>{{ $label }}</label>
    @endif
    <div class="input-group">
        <div class="custom-file">
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
                placeholder="Enter {{ $label ?? $name }}" accept="image/*"
                {{ $attributes->class(['custom-file-input', 'is-invalid' => $errors->has($name)]) }}>
            <label class="custom-file-label" for="{{ $name }}">Choose image</label>
        </div>
    </div>
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <div id="image-preview" class="mt-2"
        style="{{ $value ? 'display:inline-block;' : 'display:none;' }} position: relative;">
        <img id="preview-img" src="{{ $value ? Storage::url($value) : '' }}" alt="Preview"
            style="max-height: 150px; border-radius: 8px; border: 1px solid #ddd; display: block;">
        <button type="button" id="remove-image"
            style="position: absolute; top: -8px; right: -8px;
                                               background: red; color: white; border: none;
                                               border-radius: 50%; width: 22px; height: 22px;
                                               font-size: 14px; line-height: 1; cursor: pointer;">
            &times;
        </button>
    </div>
</div>
