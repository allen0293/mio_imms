@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Edit Employee"
        subtitle="Update employee information">

        <a href="{{ route('master-data.employees.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <x-card>

        <form action="{{ route('master-data.employees.update', $employee) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            @include('master-data.employees._form')

        </form>

    </x-card>

</div>

@endsection