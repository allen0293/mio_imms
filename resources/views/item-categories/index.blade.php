@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Item Categories"
        subtitle="Manage Procurement Item Categories">

        <a
            href="{{ route('item-categories.create') }}"
            class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            New Item Category

        </a>

    </x-page-header>

    <x-card>

        <table class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th>Code</th>

                    <th>Name</th>

                    <th>Status</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                    <tr>

                        <td>{{ $category->category_code }}</td>

                        <td>{{ $category->category_name }}</td>

                        <td>

                            @if($category->is_active)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route('item-categories.show',$category) }}"
                                class="btn btn-info btn-sm">

                                View

                            </a>

                            <a
                                href="{{ route('item-categories.edit',$category) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            No records found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        {{ $categories->links() }}

    </x-card>

</div>

@endsection