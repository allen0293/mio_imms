<x-card title="Approval Timeline">

    @forelse($purchaseRequest->histories->sortBy('created_at') as $history)

        <div class="d-flex mb-4">

            <div class="me-3">

                <span
                    class="badge bg-primary rounded-circle p-2">

                    <i class="bi bi-check"></i>

                </span>

            </div>

            <div class="flex-grow-1">

                <strong>

                    {{ $history->action }}

                </strong>

                <br>

                <small class="text-muted">

                    {{ $history->description }}

                </small>

                <br>

                <small class="text-secondary">

                   {{ $history->created_at->format('M d, Y h:i A') }}

                    @if($history->performer)

                    <br>

                    <span class="text-primary">

                        {{ $history->performer->name }}

                    </span>

                    @endif

                </small>

            </div>

        </div>

    @empty

        <div class="text-center text-muted">

            No history available.

        </div>

    @endforelse

</x-card>