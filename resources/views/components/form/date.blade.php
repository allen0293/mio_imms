@props([
    'label' => '',
    'name',
    'value' => '',
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

    <input
        type="date"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @required($required)

        {{ $attributes->merge([
            'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')
        ]) }}
    >

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