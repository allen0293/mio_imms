<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $employees = Employee::with('department')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('employee_number', 'like', "%{$search}%")
                      ->orWhere('first_name', 'like', "%{$search}%")
                      ->orWhere('middle_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('position', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('master-data.employees.index', compact('employees', 'search'));
    }

    public function create()
    {
        $departments = Department::where('is_active', true)->orderBy('department_name')->get();

        return view('master-data.employees.create', compact('departments'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        Employee::create($data);

        return redirect()
            ->route('master-data.employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
           $employee->load(['department', 'creator', 'updater']);

            return view('master-data.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
         $departments = Department::where('is_active', true)
        ->orderBy('department_name')
        ->get();

        return view('master-data.employees.edit', compact('employee', 'departments'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $employee->update($data);

        return redirect()
            ->route('master-data.employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()
            ->route('master-data.employees.index')
            ->with('success', 'Employee archived successfully.');
    }


    public function trash()
    {
        $employees = Employee::onlyTrashed()
            ->with('department')
            ->latest('deleted_at')
            ->paginate(10);

        return view('master-data.employees.trash', compact('employees'));
    }

    public function restore($id)
{
    $employee = Employee::onlyTrashed()->findOrFail($id);

    $employee->restore();

    return redirect()
        ->route('master-data.employees.trash')
        ->with('success', 'Employee restored successfully.');
}
}