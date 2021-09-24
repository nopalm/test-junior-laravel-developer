<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmployeesStoreRequest;

use App\Models\Employees;

use App\Models\Company;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::with('companies')->latest()->paginate(5);
        return view('admin.employees.index',compact('employees'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::latest()->get();
        return view('admin.employees.add',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesStoreRequest $request)
    {
        Employees::create($request->validated());
        return redirect()->route('employees.index')->with('add','Success Add Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employee)
    {
        $company = Company::latest()->get();
        return view('admin.employees.edit',compact('employee','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeesStoreRequest  $request
     * @param  int  $id
     * @return \App\Http\Requests\EmployeesStoreRequest
     */
    public function update(EmployeesStoreRequest $request,Employees $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('edit','Success Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('delete','Success Delete Data');
    }
}
