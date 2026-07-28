@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Equipment Brand Details"
        subtitle="View equipment brand information">

        <a href="{{ route('master-data.equipment-brands.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <div class="row g-4">

        <div class="col-lg-8">

            <x-card>

                <h5 class="mb-4">
                    Brand Information
                </h5>

                <x-info-row label="Brand Code">
                    {{ $equipmentBrand->brand_code }}
                </x-info-row>

                <x-info-row label="Brand Name">
                    {{ $equipmentBrand->brand_name }}
                </x-info-row>

                <x-info-row label="Description">
                    {{ $equipmentBrand->description ?: '-' }}
                </x-info-row>

                <x-info-row label="Status">

                    @if($equipmentBrand->is_active)

                        <span class="badge bg-success">
                            Active
                        </span>

                    @else

                        <span class="badge bg-secondary">
                            Inactive
                        </span>

                    @endif

                </x-info-row>

            </x-card>

            <div class="mt-4">

                <x-audit-card
                    :createdBy="$equipmentBrand->creator?->name ?? 'System'"
                    :createdAt="$equipmentBrand->created_at->format('F d, Y h:i A')"
                    :updatedBy="$equipmentBrand->updater?->name ?? 'System'"
                    :updatedAt="$equipmentBrand->updated_at->format('F d, Y h:i A')"
                />

            </div>

            <x-action-bar>

                <a href="{{ route('master-data.equipment-brands.edit', $equipmentBrand) }}"
                   class="btn btn-warning">

                    Edit

                </a>

                <a href="{{ route('master-data.equipment-brands.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </x-action-bar>

        </div>

    </div>

</div>

@endsection