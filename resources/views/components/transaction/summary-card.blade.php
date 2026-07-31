@props([

    'purchaseRequest',

])

<x-card title="Purchase Request Information">

<div class="row">

    <div class="col-md-6 mb-3">

        <strong>PR Number</strong>

        <br>

        {{ $purchaseRequest->pr_number }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Request Date</strong>

        <br>

        {{ $purchaseRequest->request_date }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Department</strong>

        <br>

        {{ $purchaseRequest->department->department_name }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Requested By</strong>

        <br>

        {{ $purchaseRequest->employee->full_name }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Needed Date</strong>

        <br>

        {{ $purchaseRequest->needed_date }}

    </div>

    <div class="col-md-12">

        <strong>Purpose</strong>

        <br>

        {{ $purchaseRequest->purpose }}

    </div>

    @if($purchaseRequest->justification)

    <div class="col-md-12 mt-3">

        <strong>Justification</strong>

        <br>

        {{ $purchaseRequest->justification }}

    </div>

    @endif

    @if($purchaseRequest->remarks)

    <div class="col-md-12 mt-3">

        <strong>Remarks</strong>

        <br>

        {{ $purchaseRequest->remarks }}

    </div>

    @endif

</div>

</x-card>