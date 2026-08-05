@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Create Item Category"
        subtitle="Add a new procurement item category">

        <a
            href="{{ route('item-categories.index') }}"
            class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <form
        action="{{ route('item-categories.store') }}"
        method="POST">

        @csrf

        @include('item-categories._form')

    </form>

</div>

@endsection