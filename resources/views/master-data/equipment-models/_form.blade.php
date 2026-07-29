@csrf

<div class="row g-3">

    <div class="col-md-4">

        <x-form.input
            label="Model Code"
            name="model_code"
            :value="$equipmentModel->model_code ?? ''"
            placeholder="Enter model code"
        />

    </div>

    <div class="col-md-8">

        <x-form.input
            label="Model Name"
            name="model_name"
            :value="$equipmentModel->model_name ?? ''"
            placeholder="Enter model name"
        />

    </div>

    <div class="col-md-6">

        <x-form.select
            label="Equipment Category"
            name="equipment_category_id"
        >
            <option value="">Select Category</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('equipment_category_id', $equipmentModel->equipment_category_id ?? '') == $category->id)>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </x-form.select>

    </div>

    <div class="col-md-6">

        <x-form.select
            label="Equipment Brand"
            name="equipment_brand_id"
        >
            <option value="">Select Brand</option>

            @foreach($brands as $brand)
                <option value="{{ $brand->id }}"
                    @selected(old('equipment_brand_id', $equipmentModel->equipment_brand_id ?? '') == $brand->id)>
                    {{ $brand->brand_name }}
                </option>
            @endforeach
        </x-form.select>

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Manufacturer Part Number"
            name="manufacturer_part_number"
            :value="$equipmentModel->manufacturer_part_number ?? ''"
            placeholder="Enter part number"
        />

    </div>

    <div class="col-12">

        <x-form.textarea
            label="Description"
            name="description"
            :value="$equipmentModel->description ?? ''"
            rows="4"
            placeholder="Enter description (optional)"
        />

    </div>

</div>

@if(isset($equipmentModel) && $equipmentModel->exists)

<div class="row mt-3">
    <div class="col-md-6">

        <x-form.select
            label="Status"
            name="is_active"
        >
            <option value="1" @selected(old('is_active', $equipmentModel->is_active) == 1)>
                Active
            </option>

            <option value="0" @selected(old('is_active', $equipmentModel->is_active) == 0)>
                Inactive
            </option>
        </x-form.select>

    </div>
</div>

@endif

<div class="mt-4 d-flex justify-content-end gap-2">

    <a href="{{ route('master-data.equipment-models.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle"></i>
        Save Equipment Model
    </button>

</div>