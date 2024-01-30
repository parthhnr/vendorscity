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
        // print_r($request->all());
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
        $data['accept_reject'] = 0;
        $data['added_date'] = date('Y-m-d');

        DB::table('package_inquiry_accepted')->insert($data);



        // $countIsAccept = DB::table('packages_enquiry')        
        //                     ->where('is_accept', 1)
        //                     ->count();
        //                     echo $countIsAccept;exit;

    // Redirect or do something else after the update
    return redirect()->route('vendorinquiry.index')->with('success', 'Inquiry Accept Successfully');
    }

    public function enquiry_details($enquiry_id)
    {
        // echo $enquiry_id;exit;

        $data['packages_enquiry']=DB::table('more_formfields_details')->where('package_inquiry_id',$enquiry_id)->get();

        // echo"<pre>";
        //     print_r($data['packages_enquiry']);
        // echo"</pre>";exit;

       

        return view('admin.list_enquiry_accpet_reject',$data);
    }

    public function add_reject_reason(Request $request) {
    //    echo"<pre>";
    //    print_r($request->post());
    //    echo"</pre>";exit;

    if($request->reject_reason != "Other" && $request->reject_reason_text ==""){
        $data['reject_reason'] = $request->reject_reason;
    }
    
    if($request->reject_reason == "Other" && $request->reject_reason_text !=""){
        $data['reject_reason']=$request->reject_reason_text;
    }
    
    $data['packages_inquiry_id']=$request->inquiry_id;
    $data['vendor_id']=$request->vendor_id;
    $data['accept_reject'] = 1;
    $data['added_date'] = date('Y-m-d');
        
    DB::table('package_inquiry_accepted')->insert($data);
    return redirect()->route('vendorinquiry.index')->with('success', 'Form Submited Successfully');

    }

    
}