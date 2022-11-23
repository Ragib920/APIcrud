<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;

class APIcrudController extends Controller
{
    public function CompanyListView(){
        $data= CompanyModel::get();
        return response()->json(['company' => $data],200);
    }

    public function ActiveCompanyListView(){
        $data= CompanyModel::where('is_active' , 1)->get();
        return response()->json(['company' => $data],200);
    }

    public function InsertCompany(Request $request){

        if($request->ismethod('post')){
            $data= $request->all();

            $company = new CompanyModel();
            $company->name = $data['name'];
            $company->company_logo = $data['company_logo'];
            $company->added_by = $data['added_by'];
            $company->is_active = $data['is_active'];
            $company->save();
            $message = 'Successfully Added';
            return response()->json(['message' => $message],201);
        }
    }

}
