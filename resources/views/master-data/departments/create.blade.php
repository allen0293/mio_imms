@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Create Department"
        subtitle="Add a new department">

        <a href="{{ route('master-data.departments.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </x-page-header>

    <x-card>

        <form
            action="{{ route('master-data.departments.store') }}"
            method="POST">

            @include('master-data.departments._form')

        </form>

    </x-card>

</div>

@endsection