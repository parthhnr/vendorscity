<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function index()
    {       
        $data['customer_data'] = DB::table('front_users')->orderBy("id","DESC")->get();     
        return view('admin.list_customer',$data);
    }
}