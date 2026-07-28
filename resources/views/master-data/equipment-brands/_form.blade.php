@csrf

<div class="row g-3">

    <div class="col-md-4">

        <label class="form-label">
            Brand Code
        </label>

        <input
            type="text"
            name="brand_code"
            value="{{ old('brand_code', $equipmentBrand->brand_code ?? '') }}"
            class="form-control @error('brand_code') is-invalid @enderror">

        @error('brand_code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

    <div class="col-md-8">

        <label class="form-label">
            Brand Name
        </label>

        <input
            type="text"
            name="brand_name"
            value="{{ old('brand_name', $equipmentBrand->brand_name ?? '') }}"
            class="form-control @error('brand_name') is-invalid @enderror">

        @error('brand_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

    <div class="col-12">

        <label class="form-label">
            Description
        </label>

        <textarea
            name="description"
            rows="4"
            class="form-control">{{ old('description', $equipmentBrand->description ?? '') }}</textarea>

    </div>

    <div class="col-md-4">

        <label class="form-label">
            Status
        </label>

        <select
            name="is_active"
            class="form-select">

            <option value="1"
                @selected(old('is_active', $equipmentBrand->is_active ?? 1)==1)>
                Active
            </option>

            <option value="0"
                @selected(old('is_active', $equipmentBrand->is_active ?? 1)==0)>
                Inactive
            </option>

        </select>

    </div>

</div>

<div class="mt-4 d-flex justify-content-end gap-2">

    <a href="{{ route('master-data.equipment-brands.index') }}"
       class="btn btn-secondary">

        Cancel

    </a>

    <button class="btn btn-primary">

        Save Brand

    </button>

</div>