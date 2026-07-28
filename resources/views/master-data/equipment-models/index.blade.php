@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Equipment Models"
        subtitle="Manage standardized equipment models">

        <div class="d-flex gap-2">

            <a href="{{ route('master-data.equipment-models.trash') }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-archive"></i>
                Archived

            </a>

            <a href="{{ route('master-data.equipment-models.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>
                New Model

            </a>

        </div>

    </x-page-header>

    <x-card>

        <form method="GET">

            <div class="row g-2">

                <div class="col-md-4">

                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search model...">

                </div>

                <div class="col-auto">

                    <button class="btn btn-primary">

                        Search

                    </button>

                </div>

                <div class="col-auto">

                    <a href="{{ route('master-data.equipment-models.index') }}"
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

                    <th>Category</th>

                    <th>Brand</th>

                    <th>Model</th>

                    <th>Manufacturer P/N</th>

                    <th>Status</th>

                    <th width="220">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($models as $model)

                    <tr>

                        <td>
                            <strong>{{ $model->model_code }}</strong>
                        </td>

                        <td>
                            {{ $model->category->category_name }}
                        </td>

                        <td>
                            {{ $model->brand->brand_name }}
                        </td>

                        <td>
                            {{ $model->model_name }}
                        </td>

                        <td>
                            {{ $model->manufacturer_part_number ?: '-' }}
                        </td>

                        <td>

                            @if($model->is_active)

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

                            <a href="{{ route('master-data.equipment-models.show',$model) }}"
                               class="btn btn-info btn-sm text-white">

                                View

                            </a>

                            <a href="{{ route('master-data.equipment-models.edit',$model) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                id="archive-form-{{ $model->id }}"
                                action="{{ route('master-data.equipment-models.destroy',$model) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm archive-btn"
                                    data-form="archive-form-{{ $model->id }}"
                                    data-name="{{ $model->model_name }}">

                                    Archive

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-4">

                            No equipment models found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $models->links() }}

        </div>

    </x-card>

</div>

@endsection