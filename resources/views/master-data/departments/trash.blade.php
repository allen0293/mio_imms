@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Archived Departments"
        subtitle="Restore archived departments">

        <a href="{{ route('master-data.departments.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back to Departments

        </a>

    </x-page-header>

    <x-card>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Code</th>

                        <th>Department</th>

                        <th>Office</th>

                        <th>Archived At</th>

                        <th width="150">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($departments as $department)

                    <tr>

                        <td>{{ $department->department_code }}</td>

                        <td>{{ $department->department_name }}</td>

                        <td>{{ $department->office_name }}</td>

                        <td>{{ $department->deleted_at->format('F d, Y h:i A') }}</td>

                        <td>

                            <form
                                action="{{ route('master-data.departments.restore',$department->id) }}"
                                method="POST">

                                @csrf

                                <button
                                    class="btn btn-success btn-sm">

                                    Restore

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No archived departments found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $departments->links() }}

        </div>

    </x-card>

</div>

@endsection