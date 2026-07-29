@csrf

<div class="row g-3">

    <div class="col-md-4">

        <x-form.input
            label="Employee Number"
            name="employee_number"
            :value="$employee->employee_number ?? ''"
            placeholder="Enter employee number"
            required
        />

    </div>

    <div class="col-md-4">

        <x-form.input
            label="First Name"
            name="first_name"
            :value="$employee->first_name ?? ''"
            placeholder="Enter first name"
            required
        />

    </div>

    <div class="col-md-4">

        <x-form.input
            label="Middle Name"
            name="middle_name"
            :value="$employee->middle_name ?? ''"
            placeholder="Enter middle name"
        />

    </div>

    <div class="col-md-4">

        <x-form.input
            label="Last Name"
            name="last_name"
            :value="$employee->last_name ?? ''"
            placeholder="Enter last name"
            required
        />

    </div>

    <div class="col-md-2">

        <x-form.input
            label="Extension"
            name="extension_name"
            :value="$employee->extension_name ?? ''"
            placeholder="e.g. Jr., III"
        />

    </div>

    <div class="col-md-2">

        <x-form.select
            label="Gender"
            name="gender"
        >
            <option value="">Select</option>
            <option value="Male" @selected(old('gender', $employee->gender ?? '') == 'Male')>Male</option>
            <option value="Female" @selected(old('gender', $employee->gender ?? '') == 'Female')>Female</option>
        </x-form.select>

    </div>

    <div class="col-md-4">

        <x-form.input
            label="Birthdate"
            name="birthdate"
            type="date"
            :value="$employee->birthdate ?? ''"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Position"
            name="position"
            :value="$employee->position ?? ''"
            placeholder="Enter position"
            required
        />

    </div>

    <div class="col-md-6">

        <x-form.select
            label="Department"
            name="department_id"
            required
        >
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}"
                    @selected(old('department_id', $employee->department_id ?? '') == $department->id)>
                    {{ $department->department_name }}
                </option>
            @endforeach
        </x-form.select>

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Office Name"
            name="office_name"
            :value="$employee->office_name ?? ''"
            placeholder="Enter office name"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Email"
            name="email"
            type="email"
            :value="$employee->email ?? ''"
            placeholder="Enter email"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Contact Number"
            name="contact_number"
            :value="$employee->contact_number ?? ''"
            placeholder="Enter contact number"
        />

    </div>

    <div class="col-md-6">

        <x-form.input
            label="Photo"
            name="photo"
            type="file"
        />

    </div>

</div>

@if(isset($employee) && $employee->exists)

<div class="row mt-3">
    <div class="col-md-4">

        <x-form.select
            label="Status"
            name="is_active"
            required
        >
            <option value="1" @selected(old('is_active', $employee->is_active) == 1)>
                Active
            </option>

            <option value="0" @selected(old('is_active', $employee->is_active) == 0)>
                Inactive
            </option>
        </x-form.select>

    </div>
</div>

@endif

<div class="d-flex justify-content-end gap-2 mt-4">

    <a href="{{ route('master-data.employees.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle"></i>
        Save Employee
    </button>

</div>