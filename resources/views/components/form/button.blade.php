@props(['type' => 'submit', 'label'])

<button type="{{ $type }}" {{ $attributes->class(['btn', 'btn-primary']) }}>{{ $label }}</button>
