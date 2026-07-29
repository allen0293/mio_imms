@csrf

<div class="row g-3">

    <div class="col-md-4">

        <x-form.input
            label="Category Code"
            name="category_code"
            :value="$equipmentCategory->category_code ?? ''"
            placeholder="Enter category code"
            required
        />

    </div>

    <div class="col-md-8">

        <x-form.input
            label="Category Name"
            name="category_name"
            :value="$equipmentCategory->category_name ?? ''"
            placeholder="Enter category name"
            required
        />

    </div>

    <div class="col-md-12">

        <x-form.textarea
            label="Description"
            name="description"
            :value="$equipmentCategory->description ?? ''"
            rows="4"
            placeholder="Enter description (optional)"
        />

    </div>

</div>

@if(isset($equipmentCategory) && $equipmentCategory->exists)

<div class="row mt-3">
    <div class="col-md-4">

        <x-form.select
            label="Status"
            name="is_active"
        >
            <option value="1" @selected(old('is_active', $equipmentCategory->is_active) == 1)>
                Active
            </option>

            <option value="0" @selected(old('is_active', $equipmentCategory->is_active) == 0)>
                Inactive
            </option>
        </x-form.select>

    </div>
</div>

@endif

<div class="d-flex justify-content-end gap-2 mt-4">

    <a href="{{ route('master-data.equipment-categories.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle"></i>
        Save Category
    </button>

</div>