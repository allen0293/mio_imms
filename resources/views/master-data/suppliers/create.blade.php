@extends('layouts.app')

@section('content')

<div class="container-fluid">

<x-page-header
title="Create Supplier"
subtitle="Register a new supplier">

<a href="{{ route('master-data.suppliers.index') }}"
class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Back

</a>

</x-page-header>

<x-card>

<form action="{{ route('master-data.suppliers.store') }}"
method="POST">
@csrf
@include('master-data.suppliers._form')

</form>

</x-card>

</div>

@endsection