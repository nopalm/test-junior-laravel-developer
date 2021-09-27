<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CompanyStoreRequest;

use App\Models\Company;

use Mail;

use App\Mail\CreateNewCompany;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::latest()->paginate(5);
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        
        $company = Company::create($request->validated());

        if ($request->hasFile('logo')) {

            $file = $request->file('logo')->store('img_logo','public');
            $company->logo = $file;
            
        }

        $company->save();

        Mail::to($request->user())->send(new CreateNewCompany($company));
        
        return redirect()->route('company.index')->with('add','Success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyStoreRequest $request, Company $company)
    {
        $company->update($request->validated());

        if ($request->hasFile('logo')) {     

            if ($company->logo && file_exists(storage_path('app/public/' . $company->logo))) {         
                \Storage::delete('public/'.$company->logo);   
            }    

        $file = $request->file('logo')->store('img_logo', 'public');     
        $company->logo = $file; 

       }  
       
        $company->update();
        
        return redirect()->route('company.index')->with('edit','Success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->logo && file_exists(storage_path('app/public/' . $company->logo))) {         
            \Storage::delete('public/'.$company->logo);   
        }

        $company->delete();

        return redirect()->route('company.index')->with('delete','Success delete data');
    }
}
