@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Equipment Categories"
        subtitle="Manage all equipment categories in the system">

        <div class="d-flex gap-2">

            <a href="{{ route('master-data.equipment-categories.trash') }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-archive"></i>

                Archived

            </a>

            <a href="{{ route('master-data.equipment-categories.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>

                New Category

            </a>

        </div>

    </x-page-header>

    <x-card>

        <form method="GET"
              action="{{ route('master-data.equipment-categories.index') }}">

            <div class="row g-2 align-items-center">

                <div class="col-md-4">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        class="form-control"
                        placeholder="Search category code or name..."
                    >

                </div>

                <div class="col-auto">

                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>

                </div>

                <div class="col-auto">

                    <a href="{{ route('master-data.equipment-categories.index') }}"
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
                        <th width="120">Code</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th width="100">Status</th>
                        <th width="220" class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($categories as $category)

                    <tr>
                        <td>
                            <strong>{{ $category->category_code }}</strong>
                        </td>

                        <td>
                            {{ $category->category_name }}
                        </td>

                        <td>
                            {{ $category->description ?: '-' }}
                        </td>

                        <td>
                            @if($category->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>

                        <td class="text-center">

                            <a href="{{ route('master-data.equipment-categories.show', $category) }}"
                               class="btn btn-sm btn-info text-white">
                                View
                            </a>

                            <a href="{{ route('master-data.equipment-categories.edit', $category) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form id="archive-form-{{ $category->id }}"
                                  action="{{ route('master-data.equipment-categories.destroy', $category) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="button"
                                      class="btn btn-sm btn-danger archive-btn"
                                      data-form="archive-form-{{ $category->id }}"
                                      data-name="{{ $category->category_name }}"
                                      data-label="Category">
                                  Archive
                              </button>
                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No equipment categories found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $categories->links() }}
        </div>

    </x-card>

</div>

@endsection