@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Archived Equipment Brands"
        subtitle="Restore archived equipment brands">

        <a href="{{ route('master-data.equipment-brands.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back to Brands

        </a>

    </x-page-header>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Brand Code</th>

                        <th>Brand Name</th>

                        <th>Archived At</th>

                        <th width="120">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($brands as $brand)

                    <tr>

                        <td>

                            <strong>

                                {{ $brand->brand_code }}

                            </strong>

                        </td>

                        <td>

                            {{ $brand->brand_name }}

                        </td>

                        <td>

                            {{ $brand->deleted_at?->format('F d, Y h:i A') }}

                        </td>

                        <td>

                            <form
                                action="{{ route('master-data.equipment-brands.restore', $brand->id) }}"
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

                            No archived equipment brands found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $brands->links() }}

        </div>

    </x-card>

</div>

@endsection