@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Archived Equipment Models"
        subtitle="Restore archived equipment models">

        <a href="{{ route('master-data.equipment-models.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back to Equipment Models

        </a>

    </x-page-header>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>Code</th>
                        <th>Model Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Archived At</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($models as $model)
                    <tr>
                        <td><strong>{{ $model->model_code }}</strong></td>
                        <td>{{ $model->model_name }}</td>
                        <td>{{ $model->category->category_name ?? '-' }}</td>
                        <td>{{ $model->brand->brand_name ?? '-' }}</td>
                        <td>{{ $model->deleted_at?->format('F d, Y h:i A') }}</td>
                        <td>
                            <form action="{{ route('master-data.equipment-models.restore', $model->id) }}"
                                  method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    Restore
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No archived equipment models found.
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