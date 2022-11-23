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
}
