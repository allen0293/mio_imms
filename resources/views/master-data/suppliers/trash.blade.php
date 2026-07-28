@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Archived Suppliers"
        subtitle="Restore archived suppliers">

        <a href="{{ route('master-data.suppliers.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back to Suppliers

        </a>

    </x-page-header>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Supplier Code</th>

                        <th>Supplier Name</th>

                        <th>Archived At</th>

                        <th width="120">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($suppliers as $supplier)

                    <tr>

                        <td>

                            <strong>

                                {{ $supplier->supplier_code }}

                            </strong>

                        </td>

                        <td>

                            {{ $supplier->supplier_name }}

                        </td>

                        <td>

                            {{ $supplier->deleted_at?->format('F d, Y h:i A') }}

                        </td>

                        <td>

                            <form
                                action="{{ route('master-data.suppliers.restore', $supplier->id) }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-success btn-sm">

                                    <i class="bi bi-arrow-counterclockwise"></i>

                                    Restore

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center text-muted py-4">

                            No archived suppliers found.

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