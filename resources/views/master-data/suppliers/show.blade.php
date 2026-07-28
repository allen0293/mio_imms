@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Equipment Model Details"
        subtitle="View equipment model information">

        <a href="{{ route('master-data.suppliers.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <div class="row g-4">

        <div class="col-lg-8">

            <x-card>

                <h5 class="mb-4">Supplier Information</h5>

                <x-info-row label="Supplier Code">
                    {{ $supplier->supplier_code }}
                </x-info-row>

                <x-info-row label="Supplier Name">
                    {{ $supplier->supplier_name }}
                </x-info-row>

                <x-info-row label="Contact Person">
                    {{ $supplier->contact_person ?: '-' }}      
                </x-info-row>

                <x-info-row label="Contact Number">
                    {{ $supplier->contact_number ?: '-' }}
                </x-info-row>

                <x-info-row label="Email Address">
                    {{ $supplier->email_address ?: '-' }}
                </x-info-row>

                <x-info-row label="TIN Number">
                    {{ $supplier->tin_number ?: '-' }}
                </x-info-row>

                <x-info-row label="Address">
                    {{ $supplier->address ?: '-' }}
                </x-info-row>

                <x-info-row label="Remarks">
                    {{ $supplier->remarks ?: '-' }}
                </x-info-row>
                <x-info-row label="Status">
                    <x-status-badge :status="$supplier->is_active" />   

            </x-card>

            <div class="mt-4">
                <x-audit-card
                    :createdBy="$supplier->creator?->name ?? 'System'"
                    :createdAt="$supplier->created_at->format('F d, Y h:i A')"
                    :updatedBy="$supplier->updater?->name ?? 'System'"
                    :updatedAt="$supplier->updated_at->format('F d, Y h:i A')"
                />
            </div>

            <x-action-bar>

                <a href="{{ route('master-data.suppliers.edit', $supplier) }}"
                   class="btn btn-warning">
                    Edit
                </a>

                <a href="{{ route('master-data.suppliers.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </x-action-bar>

        </div>

    </div>

</div>

@endsection