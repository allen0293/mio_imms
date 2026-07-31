@extends('layouts.app')

@section('content')

<div class="container-fluid">

    @include('procurement.purchase-requests.partials._header')

    <div class="row">

        <div class="col-lg-8">

            @include('procurement.purchase-requests.partials._summary')

            @include('procurement.purchase-requests.partials._items')

        </div>

        <div class="col-lg-4">

            @include('procurement.purchase-requests.partials._actions')

            @include('procurement.purchase-requests.partials._totals')

            @include('procurement.purchase-requests.partials._timeline')

            @include('procurement.purchase-requests.partials._attachments')

        </div>

    </div>

</div>

@endsection