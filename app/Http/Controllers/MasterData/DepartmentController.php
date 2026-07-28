<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of departments.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $departments = Department::query()
           ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('department_code', 'like', "%{$search}%")
                    ->orWhere('department_name', 'like', "%{$search}%")
                    ->orWhere('office_name', 'like', "%{$search}%");

                });

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('master-data.departments.index', compact('departments', 'search'));
    }

    /**
     * Show the form for creating a new department.
     */
    public function create()
    {
        return view('master-data.departments.create');
    }

    /**
     * Store a newly created department.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());

        return redirect()
            ->route('master-data.departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified department.
     */
   public function show(Department $department)
        {
            $department->load([
                'creator',
                'updater',
            ]);

            return view(
                'master-data.departments.show',
                compact('department')
            );
        }

    /**
     * Show the form for editing the specified department.
     */
    public function edit(Department $department)
    {
        return view('master-data.departments.edit', compact('department'));
    }

    /**
     * Update the specified department.
     */
   public function update(UpdateDepartmentRequest $request, Department $department)
        {
            $department->update($request->validated());

            return redirect()
                ->route('master-data.departments.index')
                ->with('success', 'Department updated successfully.');
        }

    /**
     * Soft delete the specified department.
     */
  public function destroy(Department $department)
        {
            if ($department->employees()->exists()) {

                return back()->with(
                    'error',
                    'This department cannot be archived because employees are assigned to it.'
                );

            }

            $department->delete();

            return redirect()
                ->route('master-data.departments.index')
                ->with('success', 'Department archived successfully.');
        }

    public function restore($id)
    {
        $department = Department::withTrashed()->findOrFail($id);

        $department->restore();

        return redirect()
            ->route('master-data.departments.index')
            ->with('success', 'Department restored successfully.');
    }

        public function trash()
    {
        $departments = Department::onlyTrashed()
            ->latest('deleted_at')
            ->paginate(10);

        return view(
            'master-data.departments.trash',
            compact('departments')
        );
    }

    
}