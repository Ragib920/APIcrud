<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

            // validation starts
            $rules = [
                'name' => 'required',
            ];
            $message = [
                'name.required'=>'Insert Company Name',
            ];

            $validator = Validator::make($data, $rules, $message);

            if($validator->fails())
            {
                return response()->json($validator->errors(),422);
            }
            // validation ends

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
