@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Equipment Brands"
        subtitle="Manage equipment manufacturers">

        <div class="d-flex gap-2">

            <a href="{{ route('master-data.equipment-brands.trash') }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-archive"></i>

                Archived

            </a>

            <a href="{{ route('master-data.equipment-brands.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>

                New Brand

            </a>

        </div>

    </x-page-header>

    <x-card>

        <form method="GET">

            <div class="row">

                <div class="col-md-4">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        class="form-control"
                        placeholder="Search Brand...">

                </div>

                <div class="col-auto">

                    <button class="btn btn-primary">

                        Search

                    </button>

                </div>

            </div>

        </form>

    </x-card>

    <div class="mt-3"></div>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>Code</th>

                        <th>Brand</th>

                        <th>Description</th>

                        <th>Status</th>

                        <th width="220">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($brands as $brand)

                    <tr>

                        <td>{{ $brand->brand_code }}</td>

                        <td>{{ $brand->brand_name }}</td>

                        <td>{{ $brand->description }}</td>

                        <td>

                            @if($brand->is_active)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('master-data.equipment-brands.show',$brand) }}"
                               class="btn btn-info btn-sm text-white">

                                View

                            </a>

                            <a href="{{ route('master-data.equipment-brands.edit',$brand) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                id="archive-form-{{ $brand->id }}"
                                action="{{ route('master-data.equipment-brands.destroy', $brand) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')
                                
                                <button type="button"
                                        class="btn btn-sm btn-danger archive-btn"
                                        data-form="archive-form-{{ $brand->id }}"
                                        data-name="{{ $brand->brand_name}}"
                                        data-label="Brand">
                                    Archive
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No records found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{ $brands->links() }}

    </x-card>

</div>

@endsection