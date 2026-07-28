<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentModelRequest;
use App\Http\Requests\UpdateEquipmentModelRequest;
use App\Models\EquipmentBrand;
use App\Models\EquipmentCategory;
use App\Models\EquipmentModel;
use Illuminate\Http\Request;

class EquipmentModelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $models = EquipmentModel::with(['category', 'brand'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('model_code', 'like', "%{$search}%")
                      ->orWhere('model_name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'master-data.equipment-models.index',
            compact('models', 'search')
        );
    }

    public function create()
    {
        $categories = EquipmentCategory::where('is_active', true)
            ->orderBy('category_name')
            ->get();

        $brands = EquipmentBrand::where('is_active', true)
            ->orderBy('brand_name')
            ->get();

        return view(
            'master-data.equipment-models.create',
            compact('categories', 'brands')
        );
    }

    public function store(StoreEquipmentModelRequest $request)
    {
        EquipmentModel::create($request->validated());

        return redirect()
            ->route('master-data.equipment-models.index')
            ->with('success', 'Equipment Model created successfully.');
    }

    public function show(EquipmentModel $equipmentModel)
    {
        $equipmentModel->load([
            'category',
            'brand',
            'creator',
            'updater'
        ]);

        return view(
            'master-data.equipment-models.show',
            compact('equipmentModel')
        );
    }

    public function edit(EquipmentModel $equipmentModel)
    {
        $categories = EquipmentCategory::where('is_active', true)
            ->orderBy('category_name')
            ->get();

        $brands = EquipmentBrand::where('is_active', true)
            ->orderBy('brand_name')
            ->get();

        return view(
            'master-data.equipment-models.edit',
            compact(
                'equipmentModel',
                'categories',
                'brands'
            )
        );
    }

    public function update(
        UpdateEquipmentModelRequest $request,
        EquipmentModel $equipmentModel
    ) {
        $equipmentModel->update($request->validated());

        return redirect()
            ->route('master-data.equipment-models.index')
            ->with('success', 'Equipment Model updated successfully.');
    }

    public function destroy(EquipmentModel $equipmentModel)
    {
        $equipmentModel->delete();

        return redirect()
            ->route('master-data.equipment-models.index')
            ->with('success', 'Equipment Model archived successfully.');
    }

    public function trash()
    {
        $models = EquipmentModel::onlyTrashed()
            ->with(['category', 'brand'])
            ->latest('deleted_at')
            ->paginate(10);

        return view(
            'master-data.equipment-models.trash',
            compact('models')
        );
    }

    public function restore($id)
    {
        EquipmentModel::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect()
            ->route('master-data.equipment-models.trash')
            ->with('success', 'Equipment Model restored successfully.');
    }
}