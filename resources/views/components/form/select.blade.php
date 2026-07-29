@props([
    'label' => '',
    'name',
    'required' => false,
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

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        @required($required)

        {{ $attributes->merge([
            'class' => 'form-select' . ($errors->has($name) ? ' is-invalid' : '')
        ]) }}
    >

        {{ $slot }}

    </select>

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