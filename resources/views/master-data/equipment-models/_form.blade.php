@csrf

<div class="row g-3">

    <div class="col-md-4">
        <label class="form-label">Model Code</label>
        <input type="text"
               name="model_code"
               class="form-control @error('model_code') is-invalid @enderror"
               value="{{ old('model_code', $equipmentModel->model_code ?? '') }}">
        @error('model_code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8">
        <label class="form-label">Model Name</label>
        <input type="text"
               name="model_name"
               class="form-control @error('model_name') is-invalid @enderror"
               value="{{ old('model_name', $equipmentModel->model_name ?? '') }}">
        @error('model_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Equipment Category</label>

        <select name="equipment_category_id"
                class="form-select @error('equipment_category_id') is-invalid @enderror">

            <option value="">Select Category</option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}"
                    @selected(old('equipment_category_id', $equipmentModel->equipment_category_id ?? '') == $category->id)>

                    {{ $category->category_name }}

                </option>

            @endforeach

        </select>

        @error('equipment_category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Equipment Brand</label>

        <select name="equipment_brand_id"
                class="form-select @error('equipment_brand_id') is-invalid @enderror">

            <option value="">Select Brand</option>

            @foreach($brands as $brand)

                <option value="{{ $brand->id }}"
                    @selected(old('equipment_brand_id', $equipmentModel->equipment_brand_id ?? '') == $brand->id)>

                    {{ $brand->brand_name }}

                </option>

            @endforeach

        </select>

        @error('equipment_brand_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Manufacturer Part Number</label>

        <input type="text"
               name="manufacturer_part_number"
               class="form-control"
               value="{{ old('manufacturer_part_number', $equipmentModel->manufacturer_part_number ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Status</label>

        <select name="is_active" class="form-select">

            <option value="1"
                @selected(old('is_active', $equipmentModel->is_active ?? 1)==1)>
                Active
            </option>

            <option value="0"
                @selected(old('is_active', $equipmentModel->is_active ?? 1)==0)>
                Inactive
            </option>

        </select>
    </div>

    <div class="col-12">

        <label class="form-label">Description</label>

        <textarea name="description"
                  rows="4"
                  class="form-control">{{ old('description', $equipmentModel->description ?? '') }}</textarea>

    </div>

</div>

<div class="mt-4 d-flex justify-content-end gap-2">

    <a href="{{ route('master-data.equipment-models.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button class="btn btn-primary">
        Save Equipment Model
    </button>

</div>