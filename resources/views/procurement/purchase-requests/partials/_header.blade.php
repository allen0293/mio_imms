<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="mb-1">

            Purchase Request

        </h2>

        <p class="text-muted mb-0">

            {{ $purchaseRequest->pr_number }}

        </p>

    </div>

    <div>

        <x-status-badge
            :status="$purchaseRequest->status"
        />

    </div>

</div>