@extends('layouts.app')

@section('title', 'Create Department')

@section('content')

<x-page-header
    title="Create Department"
    subtitle="Add a new department."
/>

<x-card>

    <form
        action="{{ route('master-data.departments.store') }}"
        method="POST"
    >

        @csrf

        @include('master-data.departments._form')

    </form>

</x-card>

@endsection