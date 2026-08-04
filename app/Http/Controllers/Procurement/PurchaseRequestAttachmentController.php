<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseRequestAttachmentController extends Controller
{
    public function store(Request $request, PurchaseRequest $purchaseRequest)
    {
        $request->validate([

            'attachment' => [
                'required',
                'file',
                'max:10240', // 10MB
                'mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png'
            ],

        ]);

        $file = $request->file('attachment');

        $path = $file->store(
            'purchase-requests',
            'public'
        );

        PurchaseRequestAttachment::create([

            'purchase_request_id' => $purchaseRequest->id,

            'file_name' => $file->getClientOriginalName(),

            'file_path' => $path,

            'file_type' => $file->getClientOriginalExtension(),

            'uploaded_by' => auth()->id(),

        ]);

        return back()->with(
            'success',
            'Attachment uploaded successfully.'
        );
    }

    public function destroy(PurchaseRequestAttachment $attachment)
    {
        Storage::disk('public')->delete(
            $attachment->file_path
        );

        $attachment->delete();

        return back()->with(
            'success',
            'Attachment deleted successfully.'
        );
    }
}