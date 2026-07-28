@extends('layouts.app')

@section('content')

<div class="container-fluid">

<x-page-header
    title="Edit Equipment Brand"
    subtitle="Update brand information">

    <a href="{{ route('master-data.equipment-brands.index') }}"
       class="btn btn-secondary">

        Back

    </a>

</x-page-header>

<x-card>

<form
action="{{ route('master-data.equipment-brands.update',$equipmentBrand) }}"
method="POST">

@csrf
@method('PUT')

@include('master-data.equipment-brands._form')

</form>

</x-card>

</div>

@endsection