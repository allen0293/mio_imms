@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Equipment Model Details"
        subtitle="View equipment model information">

        <a href="{{ route('master-data.equipment-models.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <div class="row g-4">

        <div class="col-lg-8">

            <x-card>

                <h5 class="mb-4">Equipment Model Information</h5>

                <x-info-row label="Model Code">
                    {{ $equipmentModel->model_code }}
                </x-info-row>

                <x-info-row label="Model Name">
                    {{ $equipmentModel->model_name }}
                </x-info-row>

                <x-info-row label="Category">
                    {{ $equipmentModel->category->category_name ?? '-' }}
                </x-info-row>

                <x-info-row label="Brand">
                    {{ $equipmentModel->brand->brand_name ?? '-' }}
                </x-info-row>

                <x-info-row label="Manufacturer Part Number">
                    {{ $equipmentModel->manufacturer_part_number ?: '-' }}
                </x-info-row>

                <x-info-row label="Description">
                    {{ $equipmentModel->description ?: '-' }}
                </x-info-row>

                <x-info-row label="Status">
                    <x-status-badge :status="$equipmentModel->is_active" />
                </x-info-row>

            </x-card>

            <div class="mt-4">
                <x-audit-card
                    :createdBy="$equipmentModel->creator?->name ?? 'System'"
                    :createdAt="$equipmentModel->created_at->format('F d, Y h:i A')"
                    :updatedBy="$equipmentModel->updater?->name ?? 'System'"
                    :updatedAt="$equipmentModel->updated_at->format('F d, Y h:i A')"
                />
            </div>

            <x-action-bar>

                <a href="{{ route('master-data.equipment-models.edit', $equipmentModel) }}"
                   class="btn btn-warning">
                    Edit
                </a>

                <a href="{{ route('master-data.equipment-models.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </x-action-bar>

        </div>

    </div>

</div>

@endsection