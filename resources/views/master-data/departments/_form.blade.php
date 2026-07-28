@csrf

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Department Code <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="department_code"
            class="form-control @error('department_code') is-invalid @enderror"
            value="{{ old('department_code', $department->department_code ?? '') }}"
        >

        @error('department_code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Department Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="department_name"
            class="form-control @error('department_name') is-invalid @enderror"
            value="{{ old('department_name', $department->department_name ?? '') }}"
        >

        @error('department_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<div class="mb-3">

    <label class="form-label">
        Office Name <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        name="office_name"
        class="form-control @error('office_name') is-invalid @enderror"
        value="{{ old('office_name', $department->office_name ?? '') }}"
    >

    @error('office_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="mb-3">

    <label class="form-label">
        Description
    </label>

    <textarea
        name="description"
        rows="4"
        class="form-control"
    >{{ old('description', $department->description ?? '') }}</textarea>

</div>

<div class="mb-3">

    <label class="form-label">
        Status
    </label>

    <select
        name="is_active"
        class="form-select"
    >

        <option value="1"
            {{ old('is_active', $department->is_active ?? 1) == 1 ? 'selected' : '' }}>
            Active
        </option>

        <option value="0"
            {{ old('is_active', $department->is_active ?? 1) == 0 ? 'selected' : '' }}>
            Inactive
        </option>

    </select>

</div>

<div class="d-flex justify-content-end gap-2">

    <a href="{{ route('master-data.departments.index') }}"
       class="btn btn-secondary">

        Cancel

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        Save Department

    </button>

</div>