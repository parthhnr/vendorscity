<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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

        //echo"<pre>";print_r($data);echo"</pre>";exit;       

       return view('admin.list_vendor_inquiry',$data);

    }

    function accept_vendor_inquiry(Request $request){
        //echo "here";exit;

        $inquiryId = $request->input('inquiry_id');
        $vendorId = $request->input('vendor_id');

        DB::table('packages_enquiry')
        ->where('id', $inquiryId)
        ->update([
            'accept_vendor_id' => $vendorId, // Replace 'field1' with the actual field name
            'is_accept' => 1, // Replace 'field2' with the actual field name
        ]);

    // Redirect or do something else after the update
    return redirect()->route('vendorinquiry.index')->with('success', 'Inquiry Accept Successfully');
    }

    
}
