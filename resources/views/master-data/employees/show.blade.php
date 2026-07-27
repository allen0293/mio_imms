@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Employee Details"
        subtitle="View employee information">

        <a href="{{ route('master-data.employees.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <div class="row g-4">

        <div class="col-lg-4">

            <x-card>

                <div class="text-center">

                    @if($employee->photo)
                        <img
                            src="{{ asset('storage/' . $employee->photo) }}"
                            alt="{{ $employee->full_name }}"
                            class="rounded-circle mb-3"
                            style="width:140px;height:140px;object-fit:cover;"
                        >
                    @else
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white mx-auto mb-3"
                             style="width:140px;height:140px;">
                            <i class="bi bi-person" style="font-size:4rem;"></i>
                        </div>
                    @endif

                    <h5 class="mb-1">{{ $employee->full_name }}</h5>
                    <p class="text-muted mb-2">{{ $employee->position }}</p>

                    @if($employee->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif

                </div>

            </x-card>

        </div>

        <div class="col-lg-8">

            <x-card>

                <h5 class="mb-4">Employee Information</h5>

                <x-info-row label="Employee Number">
                    {{ $employee->employee_number }}
                </x-info-row>

                <x-info-row label="Full Name">
                    {{ $employee->full_name }}
                </x-info-row>

                <x-info-row label="Gender">
                    {{ $employee->gender ?? '-' }}
                </x-info-row>

                <x-info-row label="Birthdate">
                    {{ $employee->birthdate ? \Carbon\Carbon::parse($employee->birthdate)->format('F d, Y') : '-' }}
                </x-info-row>

                <x-info-row label="Position">
                    {{ $employee->position }}
                </x-info-row>

                <x-info-row label="Department">
                    {{ $employee->department?->department_name ?? '-' }}
                </x-info-row>

                <x-info-row label="Office Name">
                    {{ $employee->office_name ?? '-' }}
                </x-info-row>

                <x-info-row label="Email">
                    {{ $employee->email ?? '-' }}
                </x-info-row>

                <x-info-row label="Contact Number">
                    {{ $employee->contact_number ?? '-' }}
                </x-info-row>

                <x-info-row label="Status">
                    @if($employee->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </x-info-row>

            </x-card>

            <div class="mt-4">
                <x-audit-card
                    :createdBy="$employee->creator?->name ?? 'System'"
                    :createdAt="$employee->created_at->format('F d, Y h:i A')"
                    :updatedBy="$employee->updater?->name ?? 'System'"
                    :updatedAt="$employee->updated_at->format('F d, Y h:i A')"
                />
            </div>

            <x-action-bar>

                <a href="{{ route('master-data.employees.edit', $employee) }}"
                   class="btn btn-warning">

                    Edit

                </a>

                <a href="{{ route('master-data.employees.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </x-action-bar>

        </div>

    </div>

</div>

@endsection