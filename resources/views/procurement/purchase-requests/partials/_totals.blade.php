<div class="d-flex justify-content-end mt-3">

    <table class="table table-borderless table-sm w-auto">

        <tbody>

            <tr>

                <th class="text-end pe-4">Total Estimated Amount:</th>

                <td class="text-end fw-bold" style="min-width: 150px;">

                    ₱ {{ number_format($purchaseRequest->items->sum('estimated_total_cost'), 2) }}

                </td>

            </tr>

        </tbody>

    </table>

</div>