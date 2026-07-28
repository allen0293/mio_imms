@extends('layouts.app')

@section('content')

<div class="container-fluid">

<x-page-header
title="Edit Equipment Model"
subtitle="Update equipment model">

<a href="{{ route('master-data.equipment-models.index') }}"
class="btn btn-secondary">

Back

</a>

</x-page-header>

<x-card>

<form
action="{{ route('master-data.equipment-models.update',$equipmentModel) }}"
method="POST">

@csrf
@method('PUT')

@include('master-data.equipment-models._form')

</form>

</x-card>

</div>

@endsection