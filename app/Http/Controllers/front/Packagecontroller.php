<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use DB;
use App\Models\admin\Form_filed;


class Packagecontroller extends Controller
{
    
    public function package_lists(Request $request, $page_url=''){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        $subservices_data = DB::table('subservices')->where('page_url', $page_url)->first();
        $query = DB::table('packages');
        if($subservices_data != ''){

            if($subservices_data !=''){
                $query = $query->where('subservice_id', $subservices_data->id);
            }
            //  $pagination = DB::table('packages')->where('subservice_id', $subservices_data->id)->orderBy('id', 'desc')->paginate(2);

             if($request->get('filter_price_start') !== null && $request->get('filter_price_end') !== null)
             {
                 $filter_price_start = $request->get('filter_price_start');
                 $filter_price_end = $request->get('filter_price_end');         
      
                 if ($filter_price_start > 0 && $filter_price_end > 0) 
                 {
                  
                      $query = $query->whereBetween('price',[$filter_price_start,$filter_price_end]);
                     
                 }
             }
            //   $pagination = $query->orderBy('id', 'DESC')->paginate(2)->withQueryString();
             
            // $data['package_data'] = $pagination;
            // $data['package_pagination'] = $pagination;
            // $data['package_count'] = $pagination->total();
            // $data['subservice_data'] = DB::table('subservices')->get();


            $pagination = $query->orderBy('id', 'DESC')->get();             
            $data['package_data'] = $pagination;
            $data['package_pagination'] = $pagination;
            // $data['package_count'] = $pagination->total();
            $data['subservice_data'] = DB::table('subservices')->get();
 
            $data['max_price'] = DB::table('packages')->max('price'); 
            $data['filter_price_start'] = $request->get('filter_price_start');
            $data['filter_price_end'] = $request->get('filter_price_end');

           
            
        }else{
            $data['package_data'] = '';
            $data['package_count'] = 0;        
        } 
       
        return view('front.package_lists',$data);
    }

    public function package_detail($page_url=''){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        $packages_data = DB::table('packages')->where('page_url', $page_url)->first();

        if($packages_data != ''){
            $data['package_detail'] =$packages_data;
        }else{
            $data['package_detail'] ="";
        }

        // echo "<pre>";print_r($data);echo "</pre>";exit;     

        return view('front.package_detail',$data);
    }

    public function enquiry(Request $request,$id){
        
        $service= DB::table('packages')->where('id',$id)->first();
        
        
        $form_field_data= DB::table('services')->where('id',$service->service_id)->first();        
        $tags = explode(',', $form_field_data->form_fields);
        $data['result1'] = DB::table('form_fileds')->whereIn('id',$tags)->orderBy('set_order')->get()->toArray();
        $data['formFields'] = DB::table('form_fileds')->get()->toArray();

       
        
        $data['package_id'] =$id;
        $data['service_id'] = $service->service_id;
        $data['subservice_id'] = $service->subservice_id; 
        $data['packagecategory_id'] = $service->packagecategory_id; 
        
        
        

        // echo "<pre>";print_r($data['form_fields_data']);echo "</pre>";exit;



        return view('front.enquiry',$data);

    }
    public function package_inquiry(Request $request){

        $currentDate = now();
        $subscription_vendor_data= DB::table('subscription')->where('services',$request->service_id)
                                             ->whereRaw('FIND_IN_SET(?, sub_service)', [$request->subservice_id])
                                             ->where('enddate', '>=', $currentDate)
                                             ->get();
 
         //echo "<pre>";print_r($subscription_vendor_data);echo "</pre>";exit;
 
         $vendor_id_array = array();
         
         if($subscription_vendor_data != '' && !empty($subscription_vendor_data)){
             
             foreach($subscription_vendor_data as $subscription_vendor_val){
                 $vendor_id_array[] = $subscription_vendor_val->vendor_id;
                 
             }
         }
 
         foreach($vendor_id_array as $vendor_id_array_data){
 
             $vendor_data= DB::table('users')->where('id',$vendor_id_array_data)->first();
 
            //   echo "<pre>";print_r($vendor_data);echo "</pre>";exit;
              
             if($vendor_data && $vendor_data->is_active == 0){
                // echo "<pre>";print_r($vendor_data->email);echo "</pre>";exit;
                 $data = '<!doctype html> 
                 <html>
                 <head>
                     <meta charset="utf-8">
                     <title>Enquiry Details</title>
                     <style>
                         .logo {
                             text-align: center;
                             width: 100%;
                         }
                         .wrapper {
                             width: 100%;
                             max-width:500px;
                             margin:auto;
                             font-size:14px;
                             line-height:24px;
                             font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;
                             color:#555;
                         }
                         .wrapper div {
                             height: auto;
                             float: left;
                             margin-bottom: 15px;
                             width:100%;
                         }
                         .text-center {
                             text-align: center;
                         }
                         .email-wrapper {
                             padding:5px;
                             border:1px solid #ccc;
                             width:100%;
                         }
             
                         .big {
                             text-align: center;
                             font-size: 26px;
                             color: #e31e24;
                             font-weight: bold;
                             margin-bottom: 0 !important;
                             text-transform: uppercase;
                             line-height: 34px;
                         }
             
                         .welcome {
                             font-size: 17px;
                             font-weight: bold;
                         }
                         .footer {
                             text-align: center;
                             color: #999;
                             font-size: 13px;
                         }
             
                     </style>
                 </head>
                 <body>
                     <div class="wrapper" >
                         <div class="logo" style="float: inherit;">
                         <img src="'.asset("public/site/images/VC-LONG-COLOR.png").'" style="width: 30%;float: inherit;" >
                         </div>
                         <div class="email-wrapper" >
                             <table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">          
                                 <tr>
                                     <td>
                                         <table width="100%" border="2" cellspacing="0" cellpadding="5">   
                                             <tr>
                                                 <td ><br>Dear '.$vendor_data->name.',</td>
                                             </tr>
                                             <tr>
                                                 <td > 
                                                 You recently requested a password reset. To change your password,<br>
                                                 click <a href="">here</a> or paste the following link into your browser:
                                                The link will expire in 24 hours, so be sure to use it right away.
                                                 </td> 
                                             </tr>
                                             <tr>
                                                 <td><br><br>Regards,<br>VendorsCity Team </td>
                                             </tr>
                                         </table>
                                     </td>
                                 </tr>
                             </table>
                         </div>
                     </div>
                 </body>
             </html>';
             $subject = "Enquiry Details";
             $to = $vendor_data->email;
             Mail::send([], [], function($message) use($data, $to, $subject) {
                 $message->to($to,'VendorsCity');
                 $message->subject($subject);
                 $message->from('mayudin.hnrtechnologies@gmail.com','VendorsCity');
                 $message->html($data);
             });
         }
         
 }
        
        $data['name']=$request->name;
        $data['pakage_id']=$request->pakage_id;
        $data['service_id']=$request->service_id;
        $data['subservice_id']=$request->subservice_id;
        $data['packagecategory_id']=$request->packagecategory_id;
        $data['email']=$request->email;
        $data['mobile']=$request->mobile;
        $data['added_date'] = date('Y-m-d');


        $package_inquiry=DB::table('packages_enquiry',)->insertGetId($data);
        
         if ($request->form_field_id != '' && count($request->form_field_id) > 0) {
           
                foreach($request->form_field_id as $key => $values) {

                    if ($request->form_field_id[$key] != '') {
                        
                        $data1['package_inquiry_id'] = $package_inquiry;

                         $data1['form_field_id'] = $request->form_field_id[$key];
                         $data1['formfield_value'] = $request->formfield_value[$key];
                        
                         DB::table('more_formfields_details')->insert($data1);
                    }
                }    
            }
        
            if ($request->form_field_radio_id != '' && count($request->form_field_radio_id) > 0) {
           
                foreach($request->form_field_radio_id as $key1 => $values1) {

                    $radioVal = $request->form_field_radio_id[$key1];

                    if ($request->form_field_radio_id[$key1] != '') {

                        $data2['package_inquiry_id'] = $package_inquiry;
                        
                         $data2['form_field_id'] = $request->form_field_radio_id[$key1];
                         $data2['formfield_value'] = $request['formfield_radio_'.$radioVal];
                        

                         DB::table('more_formfields_details')->insert($data2);
                    }
                }    
            }
            
            if ($request->form_field_checkbox_id != '' && count($request->form_field_checkbox_id) > 0) {
           
                foreach($request->form_field_checkbox_id as $key1 => $values1) {                    
                   
                    $ckeckboxVal = $request->form_field_checkbox_id[$key1];                    
                    
                    if ($request->form_field_checkbox_id[$key1] != '') {

                        $data3['package_inquiry_id'] = $package_inquiry;
                        
                         $data3['form_field_id'] = $request->form_field_checkbox_id[$key1];
                         $data3['formfield_value'] = $request['formfield_checkbox_'.$ckeckboxVal];
                         
                         

                        // $data3['formfield_value'] = $request['formfield_checkbox_'.$key1];
                       if($data3['formfield_value'] !=''){

                        $data3['formfield_value'] = implode(",", $data3['formfield_value']);
                        
                       }else{
                        $data3['formfield_value'] = null;
                       }
                        


                        // echo "<pre>";print_r($data123);echo "</pre>";exit;

                         DB::table('more_formfields_details')->insert($data3);
                    }
                }    
            }

            if ($request->form_field_mul_dropdown_id != '' && count($request->form_field_mul_dropdown_id) > 0) {
           
                foreach($request->form_field_mul_dropdown_id as $key1 => $values1) {                    
                   
                    $Multiple_drop_down_Val = $request->form_field_mul_dropdown_id[$key1];                    
                    
                    if ($request->form_field_mul_dropdown_id[$key1] != '') {

                        $data4['package_inquiry_id'] = $package_inquiry;
                        
                         $data4['form_field_id'] = $request->form_field_mul_dropdown_id[$key1];
                         $data4['formfield_value'] = $request['formfield_mul_dropdown_'.$Multiple_drop_down_Val];
                         
                         

                        // $data3['formfield_value'] = $request['formfield_checkbox_'.$key1];
                       if($data4['formfield_value'] !=''){

                        $data4['formfield_value'] = implode(",", $data4['formfield_value']);
                        
                       }else{
                        $data4['formfield_value'] = null;
                       }
                        


                        // echo "<pre>";print_r($data123);echo "</pre>";exit;

                         DB::table('more_formfields_details')->insert($data4);
                    }
                }    
            }

            



        return redirect()->route('enquiry', ['id' => $data['pakage_id']])->with('L_strsucessMessage', 'Enquiry Form Submitted Successfully');

    }
    
}