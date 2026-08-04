@extends('layouts.print')

@section('title')

Purchase Request

@endsection

@section('document-title')

PURCHASE REQUEST

@endsection

@section('content')

<table>

<tr>

<td width="20%">

PR Number

</td>

<td>

{{ $purchaseRequest->pr_number }}

</td>

<td width="20%">

Status

</td>

<td>

{{ $purchaseRequest->status }}

</td>

</tr>

<tr>

<td>

Department

</td>

<td>

{{ $purchaseRequest->department->department_name }}

</td>

<td>

Request Date

</td>

<td>

{{ $purchaseRequest->request_date->format('F d, Y') }}

</td>

</tr>

<tr>

<td>

Requested By

</td>

<td>

{{ $purchaseRequest->requester->full_name }}

</td>

<td>

Needed Date

</td>

<td>

{{ optional($purchaseRequest->needed_date)->format('F d, Y') }}

</td>

</tr>

</table>

<div class="mt-3">

<strong>

Purpose

</strong>

<br><br>

{{ $purchaseRequest->purpose }}

</div>

<div class="mt-3">

<table>

<thead>

<tr>

<th>#</th>

<th>Description</th>

<th>Qty</th>

<th>Unit Cost</th>

<th>Total</th>

</tr>

</thead>

<tbody>

@foreach($purchaseRequest->items as $item)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

{{ $item->equipmentModel->model_name }}

</td>

<td class="text-center">

{{ $item->quantity }}

</td>

<td class="text-right">

{{ number_format($item->estimated_unit_cost,2) }}

</td>

<td class="text-right">

{{ number_format($item->estimated_total_cost,2) }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="mt-3 text-right">

<strong>

Estimated Total :

₱ {{ number_format($purchaseRequest->estimated_amount,2) }}

</strong>

</div>

@include('components.print.signature')

@endsection