<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


use DB;

class Vendorinquirycontroller extends Controller
{
    //
    public function index()

    {

       $data['all_data'] = DB::table('leads')
                            ->where('accept_reject','1')
                            ->orderBy('id', 'desc') // Order by the 'id' column in descending order
                            ->get();

                            // $vendor_data = Auth::user();  

        // echo"<pre>";print_r($data);echo"</pre>";exit;       

       return view('admin.list_vendor_inquiry',$data);

    }

    function accept_vendor_inquiry(Request $request){
        //echo "here";exit;
        // echo"<pre>";
        // print_r($request->input());
        // echo"</pre>";exit;

        $inquiryId = $request->input('inquiry_id');
        $vendorId = $request->input('vendor_id');  
        
        $package_data = DB::table('packages_enquiry')->where('id', $inquiryId)->first();

        $package_count = $package_data->count + 1;
        
        DB::table('packages_enquiry')
        ->where('id', $inquiryId)
        ->update([
            'count' => $package_count, 
        ]);

        $data['packages_inquiry_id']=$inquiryId;
        $data['vendor_id'] = $vendorId;
        $data['added_date'] = date('Y-m-d');

        DB::table('package_inquiry_accepted')->insert($data);



        // $countIsAccept = DB::table('packages_enquiry')        
        //                     ->where('is_accept', 1)
        //                     ->count();
        //                     echo $countIsAccept;exit;

    // Redirect or do something else after the update
    return redirect()->route('vendorinquiry.index')->with('success', 'Inquiry Accept Successfully');
    }

    
}