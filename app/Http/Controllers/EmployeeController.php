<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable',
        ]);

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::with('company')->findOrFail($id);
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

}
