<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $suppliers = Supplier::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('supplier_code', 'like', "%{$search}%")
                      ->orWhere('supplier_name', 'like', "%{$search}%")
                      ->orWhere('contact_person', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'master-data.suppliers.index',
            compact('suppliers', 'search')
        );
    }

    public function create()
    {
        return view('master-data.suppliers.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        Supplier::create($request->validated());

        return redirect()
            ->route('master-data.suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    public function show(Supplier $supplier)
    {
        $supplier->load(['creator', 'updater']);

        return view(
            'master-data.suppliers.show',
            compact('supplier')
        );
    }

    public function edit(Supplier $supplier)
    {
        return view(
            'master-data.suppliers.edit',
            compact('supplier')
        );
    }

    public function update(
        UpdateSupplierRequest $request,
        Supplier $supplier
    ) {
        $supplier->update($request->validated());

        return redirect()
            ->route('master-data.suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('master-data.suppliers.index')
            ->with('success', 'Supplier archived successfully.');
    }

    public function trash()
    {
        $suppliers = Supplier::onlyTrashed()
            ->latest('deleted_at')
            ->paginate(10);

        return view(
            'master-data.suppliers.trash',
            compact('suppliers')
        );
    }

    public function restore($id)
    {
        Supplier::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect()
            ->route('master-data.suppliers.trash')
            ->with('success', 'Supplier restored successfully.');
    }
}