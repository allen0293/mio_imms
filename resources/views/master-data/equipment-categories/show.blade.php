@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Category Details"
        subtitle="View equipment category information">

        <a href="{{ route('master-data.equipment-categories.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <div class="row g-4">

        <div class="col-lg-8">

            <x-card>

                <h5 class="mb-4">Category Information</h5>

                <x-info-row label="Category Code">
                    {{ $equipmentCategory->category_code }}
                </x-info-row>

                <x-info-row label="Category Name">
                    {{ $equipmentCategory->category_name }}
                </x-info-row>

                <x-info-row label="Description">
                    {{ $equipmentCategory->description ?: '-' }}
                </x-info-row>

                <x-info-row label="Status">
                    <x-status-badge :status="$equipmentCategory->is_active" />
                </x-info-row>

            </x-card>

            <div class="mt-4">
                <x-audit-card
                    :createdBy="$equipmentCategory->creator?->name ?? 'System'"
                    :createdAt="$equipmentCategory->created_at->format('F d, Y h:i A')"
                    :updatedBy="$equipmentCategory->updater?->name ?? 'System'"
                    :updatedAt="$equipmentCategory->updated_at->format('F d, Y h:i A')"
                />
            </div>

            <x-action-bar>

                <a href="{{ route('master-data.equipment-categories.edit', $equipmentCategory) }}"
                   class="btn btn-warning">
                    Edit
                </a>

                <a href="{{ route('master-data.equipment-categories.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </x-action-bar>

        </div>

    </div>

</div>

@endsection