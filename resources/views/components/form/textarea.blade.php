@props([
    'label' => '',
    'name',
    'rows' => 4,
    'value' => '',
    'placeholder' => '',
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

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @required($required)

        {{ $attributes->merge([
            'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')
        ]) }}
    >{{ old($name, $value) }}</textarea>

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