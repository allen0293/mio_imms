<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemCategoryRequest;
use App\Http\Requests\UpdateItemCategoryRequest;
use App\Models\ItemCategory;

class ItemCategoryController extends Controller
{
    public function index()
    {
        $categories = ItemCategory::latest()->paginate(15);

        return view(
            'item-categories.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view('item-categories.create');
    }

    public function store(StoreItemCategoryRequest $request)
    {
        ItemCategory::create([

            'category_code' => $request->category_code,

            'category_name' => $request->category_name,

            'description' => $request->description,

            'is_active' => $request->boolean('is_active'),

        ]);

        return redirect()
            ->route('item-categories.index')
            ->with(
                'success',
                'Item Category created successfully.'
            );
    }

    public function show(ItemCategory $itemCategory)
    {
        return view(
            'item-categories.show',
            compact('itemCategory')
        );
    }

    public function edit(ItemCategory $itemCategory)
    {
        return view(
            'item-categories.edit',
            compact('itemCategory')
        );
    }

    public function update(
        UpdateItemCategoryRequest $request,
        ItemCategory $itemCategory
    ) {

        $itemCategory->update([

            'category_code' => $request->category_code,

            'category_name' => $request->category_name,

            'description' => $request->description,

            'is_active' => $request->boolean('is_active'),

        ]);

        return redirect()
            ->route('item-categories.index')
            ->with(
                'success',
                'Item Category updated successfully.'
            );
    }

    public function destroy(ItemCategory $itemCategory)
    {
        $itemCategory->delete();

        return redirect()
            ->route('item-categories.index')
            ->with(
                'success',
                'Item Category deleted successfully.'
            );
    }
}