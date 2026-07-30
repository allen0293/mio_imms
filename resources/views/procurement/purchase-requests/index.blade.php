@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Purchase Requests"
        subtitle="Manage purchase requests">

        <a href="{{ route('procurement.purchase-requests.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            New Purchase Request

        </a>

    </x-page-header>

    <x-card>

        <div class="row mb-3">

            <div class="col-md-6">

                <form>

                    <div class="input-group">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search Purchase Request...">

                        <button class="btn btn-primary">

                            <i class="bi bi-search"></i>

                        </button>

                    </div>

                </form>

            </div>

            <div class="col-md-6 text-end">

                <a
                    href="{{ route('procurement.purchase-requests.trash') }}"
                    class="btn btn-outline-secondary">

                    <i class="bi bi-trash"></i>

                    Trash

                </a>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                <tr>

                    <th>PR Number</th>

                    <th>Date</th>

                    <th>Department</th>

                    <th>Requested By</th>

                    <th>Type</th>

                    <th>Status</th>

                    <th width="170">Actions</th>

                </tr>

                </thead>

                <tbody>

                @forelse($purchaseRequests as $purchaseRequest)

                    <tr>

                        <td>

                            <strong>

                                {{ $purchaseRequest->pr_number }}

                            </strong>

                        </td>

                        <td>

                            {{ $purchaseRequest->request_date?->format('M d, Y') }}

                        </td>

                        <td>

                            {{ $purchaseRequest->department->department_name }}

                        </td>

                        <td>

                            {{ $purchaseRequest->requester->full_name ?? '-' }}

                        </td>

                        <td>

                            <span class="badge bg-info">

                                {{ $purchaseRequest->request_type }}

                            </span>

                        </td>

                        <td>

                            @switch($purchaseRequest->status)

                                @case('Draft')

                                    <span class="badge bg-secondary">

                                        Draft

                                    </span>

                                    @break

                                @case('Submitted')

                                    <span class="badge bg-primary">

                                        Submitted

                                    </span>

                                    @break

                                @case('Approved')

                                    <span class="badge bg-success">

                                        Approved

                                    </span>

                                    @break

                                @case('Rejected')

                                    <span class="badge bg-danger">

                                        Rejected

                                    </span>

                                    @break

                                @default

                                    <span class="badge bg-warning text-dark">

                                        {{ $purchaseRequest->status }}

                                    </span>

                            @endswitch

                        </td>

                        <td>

                            <div class="btn-group btn-group-sm">

                                <a
                                    href="{{ route('procurement.purchase-requests.show',$purchaseRequest) }}"
                                    class="btn btn-outline-primary">

                                    <i class="bi bi-eye"></i>

                                </a>

                                <a
                                    href="{{ route('procurement.purchase-requests.edit',$purchaseRequest) }}"
                                    class="btn btn-outline-warning">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form
                                    action="{{ route('procurement.purchase-requests.destroy',$purchaseRequest) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('Archive this Purchase Request?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="text-center py-4">

                            No Purchase Requests found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $purchaseRequests->links() }}

        </div>

    </x-card>

</div>

@endsection