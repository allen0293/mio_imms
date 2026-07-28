<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentCategoryRequest;
use App\Http\Requests\UpdateEquipmentCategoryRequest;
use App\Models\EquipmentCategory;
use Illuminate\Http\Request;

class EquipmentCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = EquipmentCategory::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('category_code', 'like', "%{$search}%")
                      ->orWhere('category_name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('master-data.equipment-categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('master-data.equipment-categories.create');
    }

    public function store(StoreEquipmentCategoryRequest $request)
    {
        EquipmentCategory::create($request->validated());

        return redirect()
            ->route('master-data.equipment-categories.index')
            ->with('success', 'Equipment category created successfully.');
    }

    public function show(EquipmentCategory $equipmentCategory)
    {
        $equipmentCategory->load(['creator', 'updater']);

        return view('master-data.equipment-categories.show', compact('equipmentCategory'));
    }

    public function edit(EquipmentCategory $equipmentCategory)
    {
        return view('master-data.equipment-categories.edit', compact('equipmentCategory'));
    }

    public function update(UpdateEquipmentCategoryRequest $request, EquipmentCategory $equipmentCategory)
    {
        $equipmentCategory->update($request->validated());

        return redirect()
            ->route('master-data.equipment-categories.index')
            ->with('success', 'Equipment category updated successfully.');
    }

    public function destroy(EquipmentCategory $equipmentCategory)
    {
        $equipmentCategory->delete();

        return redirect()
            ->route('master-data.equipment-categories.index')
            ->with('success', 'Equipment category archived successfully.');
    }

    public function trash()
    {
        $categories = EquipmentCategory::onlyTrashed()
            ->latest('deleted_at')
            ->paginate(10);

        return view('master-data.equipment-categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        $category = EquipmentCategory::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()
            ->route('master-data.equipment-categories.trash')
            ->with('success', 'Equipment category restored successfully.');
    }
}