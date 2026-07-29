<div class="row">

    <div class="col-md-4">

        <x-form.input
            label="Department Code"
            name="department_code"
            :value="$department->department_code ?? ''"
            placeholder="Enter department code"
            required
        />

    </div>

    <div class="col-md-8">

      <x-form.input
            label="Department Name"
            name="department_name"
            :value="$department->department_name ?? ''"
            placeholder="Enter department name"
            required
        />

    </div>

</div>

<div class="row">

    <div class="col-md-12">

      <x-form.input
            label="Office Name"
            name="office_name"
            :value="$department->office_name ?? ''"
            placeholder="Enter office name"
            required
        />

    </div>

</div>

<div class="row">

    <div class="col-md-12">

        <x-form.textarea
            label="Description"
            name="description"
            :value="$department->description ?? ''"
            rows="3"
            placeholder="Enter description (optional)"
        />

    </div>

</div>

@if(isset($department) && $department->exists)

<div class="row">
    <div class="col-md-6">

        <x-form.select
            label="Status"
            name="is_active"
            required
        >
            <option value="1" @selected(old('is_active', $department->is_active) == 1)>
                Active
            </option>

            <option value="0" @selected(old('is_active', $department->is_active) == 0)>
                Inactive
            </option>
        </x-form.select>

    </div>
</div>

@endif

<div class="d-flex justify-content-end mt-4">

    <a
        href="{{ route('master-data.departments.index') }}"
        class="btn btn-secondary me-2"
    >
        <i class="bi bi-arrow-left"></i>
        Back
    </a>

    <button
        type="submit"
        class="btn btn-primary"
    >
        <i class="bi bi-check-circle"></i>

        {{ isset($department) && $department->exists ? 'Update Department' : 'Save Department' }}

    </button>

</div>