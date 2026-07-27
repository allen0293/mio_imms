@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Archived Employees"
        subtitle="Restore archived employee records">

        <a href="{{ route('master-data.employees.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back to Employees

        </a>

    </x-page-header>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>Employee No.</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Archived At</th>
                        <th width="120">Action</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($employees as $employee)

                    <tr>
                        <td><strong>{{ $employee->employee_number }}</strong></td>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->department?->department_name ?? '-' }}</td>
                        <td>{{ $employee->deleted_at?->format('F d, Y h:i A') }}</td>
                        <td>
                            <form action="{{ route('master-data.employees.restore', $employee->id) }}"
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
                        <td colspan="5" class="text-center text-muted py-4">
                            No archived employees found.
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