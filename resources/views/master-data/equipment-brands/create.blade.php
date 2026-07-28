@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Create Equipment Brand"
        subtitle="Add a new equipment manufacturer">

        <a href="{{ route('master-data.equipment-brands.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>
            Back

        </a>

    </x-page-header>

    <x-card>

        <form action="{{ route('master-data.equipment-brands.store') }}"
              method="POST">

            @include('master-data.equipment-brands._form')

        </form>

    </x-card>

</div>

@endsection