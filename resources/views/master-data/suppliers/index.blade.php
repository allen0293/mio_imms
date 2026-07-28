@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Suppliers"
        subtitle="Manage accredited suppliers and vendors">

        <div class="d-flex gap-2">

            <a href="{{ route('master-data.suppliers.trash') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-archive"></i>
                Archived
            </a>

            <a href="{{ route('master-data.suppliers.create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                New Supplier
            </a>

        </div>

    </x-page-header>

    <x-card>

        <form method="GET">

            <div class="row g-2">

                <div class="col-md-4">

                    <input type="text"
                           name="search"
                           class="form-control"
                           value="{{ $search }}"
                           placeholder="Search supplier...">

                </div>

                <div class="col-auto">

                    <button class="btn btn-primary">
                        Search
                    </button>

                </div>

                <div class="col-auto">

                    <a href="{{ route('master-data.suppliers.index') }}"
                       class="btn btn-outline-secondary">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </x-card>

    <div class="mt-4"></div>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                <tr>

                    <th>Code</th>
                    <th>Supplier</th>
                    <th>Contact Person</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th width="220">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($suppliers as $supplier)

                    <tr>

                        <td><strong>{{ $supplier->supplier_code }}</strong></td>

                        <td>{{ $supplier->supplier_name }}</td>

                        <td>{{ $supplier->contact_person ?: '-' }}</td>

                        <td>{{ $supplier->contact_number ?: '-' }}</td>

                        <td>{{ $supplier->email ?: '-' }}</td>

                        <td>

                            @if($supplier->is_active)

                                <span class="badge bg-success">Active</span>

                            @else

                                <span class="badge bg-secondary">Inactive</span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('master-data.suppliers.show',$supplier) }}"
                               class="btn btn-info btn-sm text-white">
                                View
                            </a>

                            <a href="{{ route('master-data.suppliers.edit',$supplier) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                id="archive-form-{{ $supplier->id }}"
                                action="{{ route('master-data.suppliers.destroy',$supplier) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm archive-btn"
                                    data-form="archive-form-{{ $supplier->id }}"
                                    data-name="{{ $supplier->supplier_name }}">

                                    Archive

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-4">

                            No suppliers found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $suppliers->links() }}

        </div>

    </x-card>

</div>

@endsection