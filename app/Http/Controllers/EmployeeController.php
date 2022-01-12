<?php

namespace App\Http\Controllers;

use App\Events\EmployeeRegistered;
use App\Http\Requests\EmployeeRequest;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('designation')->get();
        return view('pages.employee.list', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations = Designation::all();
        return view('pages.employee.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {

        $password = Str::random(8);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($password);
        $employee->designation_id = $request->designation;

        if($request->hasFile('photo')) {
            $fileName = time().'_'. $request->file('photo')->getClientOriginalName();
            $photoPath = $request->file('photo')->storeAs(
                'employees', $fileName, 'public'
            );
            $employee->photo = $photoPath;
        }
        $employee->save();

        if($employee) {
            EmployeeRegistered::dispatch($employee, $password);
        }

        return back()->with('success', 'Employee created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $designations = Designation::all();
        return view('pages.employee.edit', compact('employee', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->designation_id = $request->designation;

        if($request->hasFile('photo')) {
            Storage::disk('public')->delete($employee->photo);
            $fileName = time().'_'. $request->file('photo')->getClientOriginalName();
            $photoPath = $request->file('photo')->storeAs(
                'employees', $fileName, 'public'
            );
            $employee->photo = $photoPath;
        }
        $employee->save();

        return back()->with('success', 'Employee updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('delete', 'Employee deleted successfully');
    }
}
