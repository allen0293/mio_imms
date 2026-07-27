@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Edit Category"
        subtitle="Update equipment category information">

        <a href="{{ route('master-data.equipment-categories.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <x-card>

        <form action="{{ route('master-data.equipment-categories.update', $equipmentCategory) }}"
              method="POST">

            @csrf
            @method('PUT')

            @include('master-data.equipment-categories._form')

        </form>

    </x-card>

</div>

@endsection