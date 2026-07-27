@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-action-bar>

        <a
            href="{{ route('master-data.departments.edit',$department) }}"
            class="btn btn-warning">

            Edit

        </a>

        <a
            href="{{ route('master-data.departments.index') }}"
            class="btn btn-secondary">

            Back

        </a>

    </x-action-bar>
    <x-card>

        <h5 class="mb-4">

            Department Information

        </h5>

        <x-info-row label="Department Code">

            {{ $department->department_code }}

        </x-info-row>

        <x-info-row label="Department Name">

            {{ $department->department_name }}

        </x-info-row>

        <x-info-row label="Office">

            {{ $department->office_name }}

        </x-info-row>

        <x-info-row label="Description">

            {{ $department->description ?: '-' }}

        </x-info-row>

        <x-info-row label="Status">

            <x-status-badge :status="$department->is_active"/>

        </x-info-row>

    </x-card>

   <x-audit-card

        :createdBy="$department->creator?->name ?? 'System'"

        :createdAt="$department->created_at->format('F d, Y h:i A')"

        :updatedBy="$department->updater?->name ?? 'System'"

        :updatedAt="$department->updated_at->format('F d, Y h:i A')"

    />

</div>

@endsection