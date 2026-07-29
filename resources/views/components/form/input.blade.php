@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'readonly' => false,
    'disabled' => false,
    'icon' => null,
    'prefix' => null,
    'suffix' => null,
    'help' => null,
])

<div class="mb-3">

    @if($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}

            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <div class="input-group">

        @if($icon)
            <span class="input-group-text">
                <i class="bi {{ $icon }}"></i>
            </span>
        @endif

        @if($prefix)
            <span class="input-group-text">
                {{ $prefix }}
            </span>
        @endif

        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @required($required)
            @readonly($readonly)
            @disabled($disabled)

            {{ $attributes->merge([
                'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')
            ]) }}
        >

        @if($suffix)
            <span class="input-group-text">
                {{ $suffix }}
            </span>
        @endif

    </div>

    @if($help)
        <small class="text-muted">
            {{ $help }}
        </small>
    @endif

    @error($name)
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror

</div>