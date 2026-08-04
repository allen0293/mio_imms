<x-card title="Actions">

  @can('print', $purchaseRequest)

    <a
        href="{{ route('procurement.purchase-requests.print', $purchaseRequest) }}"
        target="_blank"
        class="btn btn-secondary w-100 mb-2">

        <i class="bi bi-printer"></i>

        Print

    </a>

    @endcan

    @can('submit', $purchaseRequest)

    <form
        action="{{ route('procurement.purchase-requests.submit', $purchaseRequest) }}"
        method="POST">

        @csrf

        <button
            type="submit"
            class="btn btn-success w-100 mb-2">

            <i class="bi bi-send"></i>

            Submit

        </button>

    </form>

    @endcan

    @can('approve', $purchaseRequest)

    <form
        action="{{ route('procurement.purchase-requests.approve', $purchaseRequest) }}"
        method="POST">

        @csrf

        <button
            type="submit"
            class="btn btn-primary w-100 mb-2">

            <i class="bi bi-check-circle"></i>

            Approve

        </button>

    </form>

    @endcan

    @can('update', $purchaseRequest)

    <a
        href="{{ route('procurement.purchase-requests.edit', $purchaseRequest) }}"
        class="btn btn-warning w-100 mb-2">

        <i class="bi bi-pencil"></i>

        Edit

    </a>

    @endcan


    @can('delete', $purchaseRequest)

<form
    action="{{ route('procurement.purchase-requests.destroy', $purchaseRequest) }}"
    method="POST">

    @csrf
    @method('DELETE')

    <button
        class="btn btn-danger w-100">

        Delete

    </button>

</form>

@endcan
</x-card>