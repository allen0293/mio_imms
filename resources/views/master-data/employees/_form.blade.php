@csrf

<div class="row g-3">

    <div class="col-md-4">
        <label class="form-label">Employee Number <span class="text-danger">*</span></label>
        <input type="text"
               name="employee_number"
               value="{{ old('employee_number', $employee->employee_number ?? '') }}"
               class="form-control @error('employee_number') is-invalid @enderror">
        @error('employee_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">First Name <span class="text-danger">*</span></label>
        <input type="text"
               name="first_name"
               value="{{ old('first_name', $employee->first_name ?? '') }}"
               class="form-control @error('first_name') is-invalid @enderror">
        @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Middle Name</label>
        <input type="text"
               name="middle_name"
               value="{{ old('middle_name', $employee->middle_name ?? '') }}"
               class="form-control @error('middle_name') is-invalid @enderror">
        @error('middle_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Last Name <span class="text-danger">*</span></label>
        <input type="text"
               name="last_name"
               value="{{ old('last_name', $employee->last_name ?? '') }}"
               class="form-control @error('last_name') is-invalid @enderror">
        @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-2">
        <label class="form-label">Extension</label>
        <input type="text"
               name="extension_name"
               value="{{ old('extension_name', $employee->extension_name ?? '') }}"
               class="form-control @error('extension_name') is-invalid @enderror">
        @error('extension_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-2">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">Select</option>
            <option value="Male" @selected(old('gender', $employee->gender ?? '') == 'Male')>Male</option>
            <option value="Female" @selected(old('gender', $employee->gender ?? '') == 'Female')>Female</option>
        </select>
        @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Birthdate</label>
        <input type="date"
               name="birthdate"
               value="{{ old('birthdate', $employee->birthdate ?? '') }}"
               class="form-control @error('birthdate') is-invalid @enderror">
        @error('birthdate')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Position <span class="text-danger">*</span></label>
        <input type="text"
               name="position"
               value="{{ old('position', $employee->position ?? '') }}"
               class="form-control @error('position') is-invalid @enderror">
        @error('position')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Department <span class="text-danger">*</span></label>
        <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}"
                    @selected(old('department_id', $employee->department_id ?? '') == $department->id)>
                    {{ $department->department_name }}
                </option>
            @endforeach
        </select>
        @error('department_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Office Name</label>
        <input type="text"
               name="office_name"
               value="{{ old('office_name', $employee->office_name ?? '') }}"
               class="form-control @error('office_name') is-invalid @enderror">
        @error('office_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email"
               name="email"
               value="{{ old('email', $employee->email ?? '') }}"
               class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Contact Number</label>
        <input type="text"
               name="contact_number"
               value="{{ old('contact_number', $employee->contact_number ?? '') }}"
               class="form-control @error('contact_number') is-invalid @enderror">
        @error('contact_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Photo</label>
        <input type="file"
               name="photo"
               class="form-control @error('photo') is-invalid @enderror">
        @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="is_active" class="form-select @error('is_active') is-invalid @enderror">
            <option value="1" @selected(old('is_active', $employee->is_active ?? 1) == 1)>Active</option>
            <option value="0" @selected(old('is_active', $employee->is_active ?? 1) == 0)>Inactive</option>
        </select>
        @error('is_active')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="d-flex justify-content-end gap-2 mt-4">

    <a href="{{ route('master-data.employees.index') }}"
       class="btn btn-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary">
        Save Employee
    </button>

</div>