@props(['name', 'type' => 'text', 'placeholder'])

<div class="input-form input-form2 input_override">
    @error($name)
        <div class="val_error">
            {{ $message }}
        </div>
    @enderror
    <input {{ $attributes }} type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder ?? $name }}" @if (old($name) !== null) value="{{ old($name) }}" @endif>
</div>
