@csrf

<div class="row g-3">

    <div class="col-md-4">

        <x-form.input
            label="Brand Code"
            name="brand_code"
            :value="$equipmentBrand->brand_code ?? ''"
            placeholder="Enter brand code"
            required
        />

    </div>

    <div class="col-md-8">

        <x-form.input
            label="Brand Name"
            name="brand_name"
            :value="$equipmentBrand->brand_name ?? ''"
            placeholder="Enter brand name"
            required
        />

    </div>

    <div class="col-12">

        <x-form.textarea
            label="Description"
            name="description"
            :value="$equipmentBrand->description ?? ''"
            rows="4"
            placeholder="Enter description (optional)"
        />

    </div>

</div>

@if(isset($equipmentBrand) && $equipmentBrand->exists)

<div class="row mt-3">
    <div class="col-md-4">

        <x-form.select
            label="Status"
            name="is_active"
        >
            <option value="1" @selected(old('is_active', $equipmentBrand->is_active) == 1)>
                Active
            </option>

            <option value="0" @selected(old('is_active', $equipmentBrand->is_active) == 0)>
                Inactive
            </option>
        </x-form.select>

    </div>
</div>

@endif

<div class="mt-4 d-flex justify-content-end gap-2">

    <a href="{{ route('master-data.equipment-brands.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle"></i>
        Save Brand
    </button>

</div>