@props([
    'title',
    'number' => null,
    'status' => null,
])

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="mb-1">

            {{ $title }}

        </h3>

        @if($number)

            <small class="text-muted">

                {{ $number }}

            </small>

        @endif

    </div>

    <div>

        @if($status)

            <x-status-badge
                :status="$status"
            />

        @endif

    </div>

</div>