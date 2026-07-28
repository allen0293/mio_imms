@extends('layouts.app')

@section('content')

<div class="container-fluid">

<x-page-header
title="Edit Supplier"
subtitle="Update supplier information">

<a href="{{ route('master-data.suppliers.index') }}"
class="btn btn-secondary">

Back

</a>

</x-page-header>

<x-card>

<form
action="{{ route('master-data.suppliers.update',$supplier) }}"
method="POST">

@csrf
@method('PUT')

@include('master-data.suppliers._form')

</form>

</x-card>

</div>

@endsection