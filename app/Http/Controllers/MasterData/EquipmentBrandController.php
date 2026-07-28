<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentBrandRequest;
use App\Http\Requests\UpdateEquipmentBrandRequest;
use App\Models\EquipmentBrand;
use Illuminate\Http\Request;

class EquipmentBrandController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $brands = EquipmentBrand::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('brand_code', 'like', "%{$search}%")
                      ->orWhere('brand_name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('master-data.equipment-brands.index', compact(
            'brands',
            'search'
        ));
    }

    public function create()
    {
        return view('master-data.equipment-brands.create');
    }

    public function store(StoreEquipmentBrandRequest $request)
    {
        EquipmentBrand::create($request->validated());

        return redirect()
            ->route('master-data.equipment-brands.index')
            ->with('success', 'Equipment Brand created successfully.');
    }

    public function show(EquipmentBrand $equipmentBrand)
    {
        $equipmentBrand->load('creator', 'updater');

        return view(
            'master-data.equipment-brands.show',
            compact('equipmentBrand')
        );
    }

    public function edit(EquipmentBrand $equipmentBrand)
    {
        return view(
            'master-data.equipment-brands.edit',
            compact('equipmentBrand')
        );
    }

    public function update(
        UpdateEquipmentBrandRequest $request,
        EquipmentBrand $equipmentBrand
    ) {
        $equipmentBrand->update($request->validated());

        return redirect()
            ->route('master-data.equipment-brands.index')
            ->with('success', 'Equipment Brand updated successfully.');
    }

    public function destroy(EquipmentBrand $equipmentBrand)
    {
        $equipmentBrand->delete();

        return redirect()
            ->route('master-data.equipment-brands.index')
            ->with('success', 'Equipment Brand archived successfully.');
    }

    public function trash()
    {
        $brands = EquipmentBrand::onlyTrashed()
            ->latest('deleted_at')
            ->paginate(10);

        return view(
            'master-data.equipment-brands.trash',
            compact('brands')
        );
    }

    public function restore($id)
    {
        EquipmentBrand::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect()
            ->route('master-data.equipment-brands.trash')
            ->with('success', 'Equipment Brand restored successfully.');
    }
}