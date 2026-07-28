@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-0">
                Departments
            </h2>

            <small class="text-muted">
                Manage all departments in the system.
            </small>

        </div>

       <div class="d-flex gap-2">
            <a
                href="{{ route('master-data.departments.create') }}"
                class="btn btn-primary">

                New Department

            </a>

             <a
                href="{{ route('master-data.departments.trash') }}"
                class="btn btn-outline-secondary">
                <i class="bi bi-archive"></i>
                Archived

            </a>

        </div>

    </div>

    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    {{-- Card --}}
    <div class="card shadow-sm">

        <div class="card-body">

            {{-- Search --}}
            <form method="GET"
                  class="row mb-3">

                <div class="col-md-4">

                    <input type="text"
                           name="search"
                           value="{{ $search }}"
                           class="form-control"
                           placeholder="Search department...">

                </div>

                <div class="col-auto">

                    <button class="btn btn-primary">

                        <i class="bi bi-search"></i>

                        Search

                    </button>

                </div>

                <div class="col-auto">

                    <a href="{{ route('master-data.departments.index') }}"
                       class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </form>
            <div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-light">

<tr>

<th>Code</th>

<th>Department</th>

<th>Office</th>

<th>Status</th>

<th>Created</th>

<th width="180">Actions</th>

</tr>

</thead>

<tbody>

@forelse($departments as $department)

<tr>

<td>

{{ $department->department_code }}

</td>

<td>

{{ $department->department_name }}

</td>

<td>

{{ $department->office_name }}

</td>

<td>

@if($department->is_active)

<x-status-badge
    :status="$department->is_active"/>

@else

<span class="badge bg-danger">

Inactive

</span>

@endif

</td>

<td>

{{ $department->created_at->format('M d, Y') }}

</td>

<td>

<a href="{{ route('master-data.departments.show',$department) }}"
class="btn btn-sm btn-info">

<i class="bi bi-eye"></i>

</a>

<a href="{{ route('master-data.departments.edit',$department) }}"
class="btn btn-sm btn-warning">

<i class="bi bi-pencil"></i>

</a>

<form
    id="archive-form-{{ $department->id }}"
    action="{{ route('master-data.departments.destroy', $department) }}"
    method="POST"
    class="d-inline">

    @csrf
    @method('DELETE')
    
    <button type="button"
        class="btn btn-sm btn-danger archive-btn"
        data-form="archive-form-{{ $department->id }}"
        data-name="{{ $department->department_name}}"
        data-label="Department">
    Archive
</button>
</form>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center text-muted">

No departments found.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>
<div class="mt-3">

{{ $departments->links() }}

</div>

        </div>

    </div>

</div>

@endsection