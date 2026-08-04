<x-card title="Attachments">

    @if($purchaseRequest->isEditable())

    <form
        action="{{ route('procurement.purchase-requests.attachments.store',$purchaseRequest) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <input
            type="file"
            name="attachment"
            class="form-control mb-3">

        <button
            class="btn btn-primary w-100">

            <i class="bi bi-upload"></i>

            Upload Attachment

        </button>

    </form>

    <hr>

    @endif

    @forelse($purchaseRequest->attachments as $attachment)

        <div class="d-flex justify-content-between align-items-center mb-2">

            <div>

                <i class="bi bi-paperclip"></i>

                {{ $attachment->file_name }}

            </div>

            <div>

                <a
                    href="{{ Storage::url($attachment->file_path) }}"
                    target="_blank"
                    class="btn btn-sm btn-outline-primary">

                    View

                </a>

                @if($purchaseRequest->isEditable())

                <form
                    action="{{ route('procurement.purchase-requests.attachments.destroy',$attachment) }}"
                    method="POST"
                    class="d-inline">

                    @csrf

                    @method('DELETE')

                    <button
                        class="btn btn-sm btn-danger">

                        Delete

                    </button>

                </form>

                @endif

            </div>

        </div>

    @empty

        <div class="text-muted">

            No attachments uploaded.

        </div>

    @endforelse

</x-card>