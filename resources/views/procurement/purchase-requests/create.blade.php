@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <x-page-header
        title="Create Purchase Request"
        subtitle="Create a new purchase request">

        <a href="{{ route('procurement.purchase-requests.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </x-page-header>

    <form
        action="{{ route('procurement.purchase-requests.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('procurement.purchase-requests._form')

    </form>

</div>

@endsection