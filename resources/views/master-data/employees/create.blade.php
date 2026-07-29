@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Create Employee"
        subtitle="Add a new employee record">

        <a href="{{ route('master-data.employees.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <x-card>

        <form action="{{ route('master-data.employees.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @include('master-data.employees._form')

        </form>

    </x-card>

</div>

@endsection