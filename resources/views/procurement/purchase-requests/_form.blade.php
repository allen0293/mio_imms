<x-card title="Purchase Request Information">

<div class="row">

    <div class="col-md-4">

        <x-form.select
            label="Request Type"
            name="request_type"
            required>

            <option value="">Select Type</option>

            <option value="Asset">Asset</option>

            <option value="Consumable">Consumable</option>

            <option value="Service">Service</option>

        </x-form.select>

    </div>

    <div class="col-md-4">

        <x-form.input
            type="date"
            label="Needed Date"
            name="needed_date"
        />

    </div>

    <div class="col-md-4">

        <x-form.input
            label="PR Number"
            name="pr_number"
            value="Auto Generated"
            readonly
        />

    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <x-form.select
            label="Department"
            name="department_id"
            required>

            <option value="">Select Department</option>

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}">

                    {{ $department->department_name }}

                </option>

            @endforeach

        </x-form.select>

    </div>

    <div class="col-md-6">

        <x-form.select
            label="Requested By"
            name="requested_by"
            required>

            <option value="">Select Employee</option>

            @foreach($employees as $employee)

                <option
                    value="{{ $employee->id }}">

                    {{ $employee->full_name }}

                </option>

            @endforeach

        </x-form.select>

    </div>

</div>

<x-form.textarea
    label="Purpose"
    name="purpose"
    rows="3"
    required
/>

<x-form.textarea
    label="Justification"
    name="justification"
    rows="3"
/>

<x-form.textarea
    label="Remarks"
    name="remarks"
    rows="2"
/>

</x-card>

<x-transaction.items-table
    :equipmentModels="$equipmentModels"
/>

<x-transaction.total-card />

