<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Resources\CompanyResource;

use App\Http\Resources\CompanyCollection;

use App\Models\Company;

class CompanyController extends Controller
{
    public function getAllCompany() {
        
        return new CompanyCollection(Company::all());

    }
    public function getIdCompany($id) {
        
        return new CompanyResource(Company::findOrFail($id));

    }
}
