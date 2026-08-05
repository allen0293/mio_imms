@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Edit Item Category"
        subtitle="Update item category">

        <a
            href="{{ route('item-categories.index') }}"
            class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <form
        action="{{ route('item-categories.update',$itemCategory) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('item-categories._form')

    </form>

</div>

@endsection