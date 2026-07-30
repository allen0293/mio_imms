@props([
    'equipmentModels' => [],
])

<x-card title="Requested Items">

    <div class="mb-3">

        <button
            type="button"
            id="btnAddItem"
            class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Add Item

        </button>

    </div>

    <div class="table-responsive">

        <table class="table table-bordered align-middle">

            <thead class="table-light">

            <tr>

                <th width="22%">Equipment Model</th>

                <th>Description</th>

                <th width="8%">Qty</th>

                <th width="10%">UOM</th>

                <th width="12%">Unit Cost</th>

                <th width="12%">Line Total</th>

                <th width="6%"></th>

            </tr>

            </thead>

            <tbody id="itemsTableBody">

            </tbody>

        </table>

    </div>

</x-card>

<script>

window.equipmentModels = @json($equipmentModels);

</script>

@push('scripts')

<script src="{{ asset('js/transaction-table.js') }}"></script>

@endpush