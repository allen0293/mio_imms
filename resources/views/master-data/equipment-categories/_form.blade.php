@csrf

<div class="row g-3">

    <div class="col-md-4">
        <label class="form-label">Category Code <span class="text-danger">*</span></label>
        <input type="text"
               name="category_code"
               value="{{ old('category_code', $equipmentCategory->category_code ?? '') }}"
               class="form-control @error('category_code') is-invalid @enderror">
        @error('category_code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8">
        <label class="form-label">Category Name <span class="text-danger">*</span></label>
        <input type="text"
               name="category_name"
               value="{{ old('category_name', $equipmentCategory->category_name ?? '') }}"
               class="form-control @error('category_name') is-invalid @enderror">
        @error('category_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <label class="form-label">Description</label>
        <textarea name="description"
                  rows="4"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $equipmentCategory->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="is_active" class="form-select @error('is_active') is-invalid @enderror">
            <option value="1" @selected(old('is_active', $equipmentCategory->is_active ?? 1) == 1)>Active</option>
            <option value="0" @selected(old('is_active', $equipmentCategory->is_active ?? 1) == 0)>Inactive</option>
        </select>
        @error('is_active')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="d-flex justify-content-end gap-2 mt-4">

    <a href="{{ route('master-data.equipment-categories.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary">
        Save Category
    </button>

</div>