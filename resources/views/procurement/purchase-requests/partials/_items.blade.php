<x-card title="Requested Items">

    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light">

                <tr>

                    <th width="5%">#</th>

                    <th>Category</th>

                    <th>Brand</th>

                    <th>Equipment Model</th>

                    <th class="text-center" width="8%">Qty</th>

                    <th class="text-end" width="12%">Unit Cost</th>

                    <th class="text-end" width="12%">Total Cost</th>

                    <th>Remarks</th>

                </tr>

            </thead>

            <tbody>

                @forelse($purchaseRequest->items as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->equipmentModel->category->category_name ?? '-' }}
                        </td>

                        <td>
                            {{ $item->equipmentModel->brand->brand_name ?? '-' }}
                        </td>

                        <td>

                            <strong>

                                {{ $item->equipmentModel->model_name }}

                            </strong>

                        </td>

                        <td class="text-center">

                            {{ number_format($item->quantity) }}

                        </td>

                        <td class="text-end">

                            ₱ {{ number_format($item->estimated_unit_cost,2) }}

                        </td>

                        <td class="text-end fw-bold">

                            ₱ {{ number_format($item->estimated_total_cost,2) }}

                        </td>

                        <td>

                            {{ $item->remarks ?: '-' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center text-muted py-4">

                            No requested items found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-card>