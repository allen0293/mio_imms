@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Employees"
        subtitle="Manage all employees in the system">

        <a href="{{ route('master-data.employees.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            New Employee

        </a>

        <a href="{{ route('master-data.employees.trash') }}"
        class="btn btn-outline-secondary">

          <i class="bi bi-archive"></i>

          Archived

    </a>

    </x-page-header>

    {{-- Search --}}
    <x-card>

        <form method="GET" action="{{ route('master-data.employees.index') }}">

            <div class="row g-2 align-items-center">

                <div class="col-md-4">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        class="form-control"
                        placeholder="Search employee number, name, or position..."
                    >

                </div>

                <div class="col-auto">

                    <button class="btn btn-primary" type="submit">
                        Search
                    </button>

                </div>

                <div class="col-auto">

                    <a href="{{ route('master-data.employees.index') }}"
                       class="btn btn-outline-secondary">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </x-card>

    <div class="mt-4"></div>

    {{-- Table --}}
    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th width="80">Photo</th>
                        <th>Employee No.</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th width="220" class="text-center">Actions</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($employees as $employee)

                    <tr>

                        <td>
                            @if($employee->photo)
                                <img
                                    src="{{ asset('storage/'.$employee->photo) }}"
                                    alt="{{ $employee->full_name }}"
                                    class="rounded-circle"
                                    style="width:50px;height:50px;object-fit:cover;"
                                >
                            @else
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white"
                                     style="width:50px;height:50px;">
                                    <i class="bi bi-person"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <strong>{{ $employee->employee_number }}</strong>
                        </td>

                        <td>
                            {{ $employee->full_name }}
                        </td>

                        <td>
                            {{ $employee->department?->department_name ?? '-' }}
                        </td>

                        <td>
                            {{ $employee->position }}
                        </td>

                        <td>
                            @if($employee->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>

                        <td class="text-center">

                            <a href="{{ route('master-data.employees.show', $employee) }}"
                               class="btn btn-sm btn-info text-white">
                                View
                            </a>

                            <a href="{{ route('master-data.employees.edit', $employee) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form id="archive-form-{{ $employee->id }}"
                                action="{{ route('master-data.employees.destroy', $employee) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                 <button type="button"
                                      class="btn btn-sm btn-danger archive-btn"
                                        data-form="archive-form-{{ $employee->id }}"
                                      data-name="{{ $employee->full_name  }}"
                                      data-label="Employee">
                                  Archive
                              </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No employees found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $employees->links() }}
        </div>

    </x-card>

</div>

@endsection