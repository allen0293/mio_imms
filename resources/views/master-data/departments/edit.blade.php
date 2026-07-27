@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Edit Department"
        subtitle="Update department information">

        <a href="{{ route('master-data.departments.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <x-card>

        <form
            action="{{ route('master-data.departments.update',$department) }}"
            method="POST">

            @csrf

            @method('PUT')

            @include('master-data.departments._form')

        </form>

    </x-card>

</div>

@endsection