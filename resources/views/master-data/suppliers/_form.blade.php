@csrf

<div class="row g-3">

    <div class="col-md-4">

        <x-form.input
            label="Supplier Code"
            name="supplier_code"
            :value="$supplier->supplier_code ?? ''"
            placeholder="Enter supplier code"
        />

    </div>

    <div class="col-md-8">

        <x-form.input
            label="Supplier Name"
            name="supplier_name"
            :value="$supplier->supplier_name ?? ''"
            placeholder="Enter supplier name"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Contact Person"
            name="contact_person"
            :value="$supplier->contact_person ?? ''"
            placeholder="Enter contact person"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Contact Number"
            name="contact_number"
            :value="$supplier->contact_number ?? ''"
            placeholder="Enter contact number"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Email"
            name="email"
            type="email"
            :value="$supplier->email ?? ''"
            placeholder="Enter email"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="TIN Number"
            name="tin_number"
            :value="$supplier->tin_number ?? ''"
            placeholder="Enter TIN number"
        />

    </div>

    <div class="col-12">

        <x-form.textarea
            label="Address"
            name="address"
            :value="$supplier->address ?? ''"
            rows="3"
            placeholder="Enter address"
        />

    </div>

    <div class="col-12">

        <x-form.textarea
            label="Remarks"
            name="remarks"
            :value="$supplier->remarks ?? ''"
            rows="3"
            placeholder="Enter remarks (optional)"
        />

    </div>

</div>

@if(isset($supplier) && $supplier->exists)

<div class="row mt-3">
    <div class="col-md-4">

        <x-form.select
            label="Status"
            name="is_active"
        >
            <option value="1" @selected(old('is_active', $supplier->is_active) == 1)>
                Active
            </option>

            <option value="0" @selected(old('is_active', $supplier->is_active) == 0)>
                Inactive
            </option>
        </x-form.select>

    </div>
</div>

@endif

<div class="mt-4 d-flex justify-content-end gap-2">

    <a href="{{ route('master-data.suppliers.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle"></i>
        Save Supplier
    </button>

</div>