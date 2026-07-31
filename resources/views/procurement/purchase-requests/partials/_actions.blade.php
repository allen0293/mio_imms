<x-card title="Actions">

    @if($purchaseRequest->canSubmit())

        <form
            method="POST"
            action="{{ route('procurement.purchase-requests.submit', $purchaseRequest) }}">

            @csrf

            <button
                class="btn btn-success w-100 mb-2">

                <i class="bi bi-send"></i>

                Submit

            </button>

        </form>

    @endif

    @if($purchaseRequest->canApprove())

        <form
            method="POST"
            action="{{ route('procurement.purchase-requests.approve', $purchaseRequest) }}">

            @csrf

            <button
                class="btn btn-primary w-100">

                <i class="bi bi-check-circle"></i>

                Approve

            </button>

        </form>

    @endif

</x-card>