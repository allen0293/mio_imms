<x-card title="Purchase Request Information">

<div class="row">

    <div class="col-md-6 mb-3">

        <strong>Request Type</strong>

        <br>

        {{ $purchaseRequest->request_type }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Department</strong>

        <br>

        {{ $purchaseRequest->department->department_name }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Requested By</strong>

        <br>

        {{ $purchaseRequest->requester->full_name }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Request Date</strong>

        <br>

        {{ $purchaseRequest->request_date->format('F d, Y') }}

    </div>

    <div class="col-md-6 mb-3">

        <strong>Needed Date</strong>

        <br>

        {{ optional($purchaseRequest->needed_date)->format('F d, Y') }}

    </div>

    <div class="col-md-12 mb-3">

        <strong>Purpose</strong>

        <br>

        {{ $purchaseRequest->purpose }}

    </div>

    @if($purchaseRequest->justification)

    <div class="col-md-12 mb-3">

        <strong>Justification</strong>

        <br>

        {{ $purchaseRequest->justification }}

    </div>

    @endif

    @if($purchaseRequest->remarks)

    <div class="col-md-12">

        <strong>Remarks</strong>

        <br>

        {{ $purchaseRequest->remarks }}

    </div>

    @endif

</div>

</x-card>