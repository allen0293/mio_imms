<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequestRequest;
use App\Http\Requests\UpdatePurchaseRequestRequest;
use App\Models\PurchaseRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EquipmentModel;
use App\Services\PurchaseRequestService;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function __construct(
        protected PurchaseRequestService $purchaseRequestService
    ) {}

    /**
     * Display Purchase Requests
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $purchaseRequests = PurchaseRequest::with([
                'department',
                'requester'
            ])
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('pr_number', 'like', "%{$search}%")
                        ->orWhere('purpose', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");

                });

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'procurement.purchase-requests.index',
            compact('purchaseRequests', 'search')
        );
    }

    /**
     * Create Page
     */
    public function create()
    {
        $departments = Department::orderBy('department_name')->get();

        $employees = Employee::where('is_active', true)
            ->orderBy('last_name')
            ->get();

        $equipmentModels = EquipmentModel::with([
                'category',
                'brand'
            ])
            ->orderBy('model_name')
            ->get();

        return view(
            'procurement.purchase-requests.create',
            compact(
                'departments',
                'employees',
                'equipmentModels'
            )
        );
    }

    /**
     * Store Purchase Request
     */
    public function store(StorePurchaseRequestRequest $request)
    {
        $purchaseRequest = $this->purchaseRequestService
            ->create($request->validated());

        return redirect()
            ->route(
                'procurement.purchase-requests.show',
                $purchaseRequest
            )
            ->with(
                'success',
                'Purchase Request created successfully.'
            );
    }

    /**
     * Show Purchase Request
     */
    public function show(PurchaseRequest $purchaseRequest)
    {
        $purchaseRequest->load([
            'department',
            'requester',
            'items.equipmentModel.brand',
            'items.equipmentModel.category',
            'approvals.approver',
            'histories.performer',
            'attachments.uploader'
        ]);

        return view(
            'procurement.purchase-requests.show',
            compact('purchaseRequest')
        );
    }

    /**
     * Edit Purchase Request
     */
    public function edit(PurchaseRequest $purchaseRequest)
    {
        if (! $purchaseRequest->isEditable()) {

            return back()->with(
                'error',
                'Only Draft Purchase Requests can be edited.'
            );

        }

        $departments = Department::orderBy('department_name')->get();

        $employees = Employee::where('is_active', true)
            ->orderBy('last_name')
            ->get();

        $equipmentModels = EquipmentModel::orderBy('model_name')->get();

        $purchaseRequest->load('items');

        return view(
            'procurement.purchase-requests.edit',
            compact(
                'purchaseRequest',
                'departments',
                'employees',
                'equipmentModels'
            )
        );
    }

    /**
     * Update Purchase Request
     */
    public function update(
        UpdatePurchaseRequestRequest $request,
        PurchaseRequest $purchaseRequest
    ) {
        $this->purchaseRequestService->update(
            $purchaseRequest,
            $request->validated()
        );

        return redirect()
            ->route(
                'procurement.purchase-requests.show',
                $purchaseRequest
            )
            ->with(
                'success',
                'Purchase Request updated successfully.'
            );
    }

    /**
     * Archive Purchase Request
     */
    public function destroy(PurchaseRequest $purchaseRequest)
    {
        $purchaseRequest->delete();

        return redirect()
            ->route('procurement.purchase-requests.index')
            ->with(
                'success',
                'Purchase Request archived successfully.'
            );
    }

    /**
     * Archived Purchase Requests
     */
    public function trash()
    {
        $purchaseRequests = PurchaseRequest::onlyTrashed()
            ->latest('deleted_at')
            ->paginate(10);

        return view(
            'procurement.purchase-requests.trash',
            compact('purchaseRequests')
        );
    }

    /**
     * Restore Purchase Request
     */
    public function restore($id)
    {
        PurchaseRequest::withTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect()
            ->route('procurement.purchase-requests.trash')
            ->with(
                'success',
                'Purchase Request restored successfully.'
            );
    }


    /**
 * Submit Purchase Request
 */
public function submit(PurchaseRequest $purchaseRequest)
{
    return back()->with(
        'success',
        'Submit feature coming next.'
    );
}

    /**
     * Approve Purchase Request
     */
    public function approve(PurchaseRequest $purchaseRequest)
    {
        return back()->with(
            'success',
            'Approve feature coming next.'
        );
    }

    /**
     * Reject Purchase Request
     */
    public function reject(PurchaseRequest $purchaseRequest)
    {
        return back()->with(
            'success',
            'Reject feature coming next.'
        );
    }

    /**
     * Cancel Purchase Request
     */
    public function cancel(PurchaseRequest $purchaseRequest)
    {
        return back()->with(
            'success',
            'Cancel feature coming next.'
        );
    }

    /**
     * Print Purchase Request
     */
    public function print(PurchaseRequest $purchaseRequest)
    {
        return view(
            'procurement.purchase-requests.print',
            compact('purchaseRequest')
        );
    }
}