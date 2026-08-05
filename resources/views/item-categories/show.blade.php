@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="View Item Category"
        subtitle="Item Category Details">

        <a
            href="{{ route('item-categories.index') }}"
            class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <x-card title="Information">

        <table class="table">

            <tr>
                <th width="200">Category Code</th>
                <td>{{ $itemCategory->category_code }}</td>
            </tr>

            <tr>
                <th>Category Name</th>
                <td>{{ $itemCategory->category_name }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{{ $itemCategory->description }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    @if($itemCategory->is_active)

                        <span class="badge bg-success">

                            Active

                        </span>

                    @else

                        <span class="badge bg-danger">

                            Inactive

                        </span>

                    @endif

                </td>
            </tr>

        </table>

    </x-card>

</div>

@endsection