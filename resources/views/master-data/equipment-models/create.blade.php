@extends('layouts.app')

@section('content')

<div class="container-fluid">

<x-page-header
title="Create Equipment Model"
subtitle="Add a standardized equipment model">

<a href="{{ route('master-data.equipment-models.index') }}"
class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Back

</a>

</x-page-header>

<x-card>

<form
action="{{ route('master-data.equipment-models.store') }}"
method="POST">

@include('master-data.equipment-models._form')

</form>

</x-card>

</div>

@endsection