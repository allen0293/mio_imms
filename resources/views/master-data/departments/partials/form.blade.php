<div class="mb-3">
    <label class="form-label">Department Code</label>
    <input type="text"
           name="department_code"
           class="form-control @error('department_code') is-invalid @enderror"
           value="{{ old('department_code', $department->department_code ?? '') }}">

    @error('department_code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Department Name</label>

    <input type="text"
           name="department_name"
           class="form-control @error('department_name') is-invalid @enderror"
           value="{{ old('department_name', $department->department_name ?? '') }}">

    @error('department_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">

    <label class="form-label">Office Name</label>

    <input type="text"
           name="office_name"
           class="form-control"
           value="{{ old('office_name', $department->office_name ?? '') }}">

</div>

<div class="mb-3">

    <label class="form-label">Description</label>

    <textarea name="description"
              class="form-control"
              rows="4">{{ old('description', $department->description ?? '') }}</textarea>

</div>

<div class="text-end">

    <button class="btn btn-primary">

        Save Department

    </button>

</div>