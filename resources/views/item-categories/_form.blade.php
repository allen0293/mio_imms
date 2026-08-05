<x-card title="Item Category Information">

    <div class="row">

        <div class="col-md-4">

            <x-form.input
                label="Category Code"
                name="category_code"
                :value="old('category_code', $itemCategory->category_code ?? '')"
                required
            />

        </div>

        <div class="col-md-8">

            <x-form.input
                label="Category Name"
                name="category_name"
                :value="old('category_name', $itemCategory->category_name ?? '')"
                required
            />

        </div>

    </div>

    <x-form.textarea
        label="Description"
        name="description"
        rows="4"
    >{{ old('description', $itemCategory->description ?? '') }}</x-form.textarea>

    <div class="form-check mt-3">

        <input
            class="form-check-input"
            type="checkbox"
            name="is_active"
            value="1"
            id="is_active"
            {{ old('is_active', $itemCategory->is_active ?? true) ? 'checked' : '' }}>

        <label class="form-check-label" for="is_active">

            Active

        </label>

    </div>

</x-card>

<div class="text-end mt-3">

    <button
        class="btn btn-primary"
        type="submit">

        <i class="bi bi-save"></i>

        Save

    </button>

</div>