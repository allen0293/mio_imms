@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Archived Categories"
        subtitle="Restore archived equipment categories">

        <a href="{{ route('master-data.equipment-categories.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back to Categories

        </a>

    </x-page-header>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>Code</th>
                        <th>Category Name</th>
                        <th>Archived At</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td><strong>{{ $category->category_code }}</strong></td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->deleted_at?->format('F d, Y h:i A') }}</td>
                        <td>
                            <form action="{{ route('master-data.equipment-categories.restore', $category->id) }}"
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
                        <td colspan="4" class="text-center text-muted py-4">
                            No archived categories found.
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