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
        //  echo"<pre>";
        // print_r($subservices_data);
        // echo"</pre>";
        // exit;

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
			 
			 $package_cat_ids  =  $request->get('package_cat');
			   if($package_cat_ids !== null && $request->get('package_cat') !== null){

					$query = $query->whereIn('packagecategory_id', $package_cat_ids);
					$data['package_cat_ids'] = implode(",",$package_cat_ids);
				   
			   }else {
					 $data['package_cat_ids'] = $package_cat_ids = "";
				}
		
            //   $pagination = $query->orderBy('id', 'DESC')->paginate(2)->withQueryString();
             
            // $data['package_data'] = $pagination;
            // $data['package_pagination'] = $pagination;
            // $data['package_count'] = $pagination->total();
            // $data['subservice_data'] = DB::table('subservices')->get();


            $pagination = $query->orderBy('id', 'DESC')->get();             
            $data['package_data'] = $pagination;
            $data['package_pagination'] = $pagination;
            $data['package_count'] = $pagination->count();
            $data['subservice_data'] = DB::table('subservices')->get();
			$data['package_category'] = DB::table('package_categories')->get();
 
            $data['max_price'] = DB::table('packages')->max('price'); 
            $data['filter_price_start'] = $request->get('filter_price_start');
            $data['filter_price_end'] = $request->get('filter_price_end');

           
            
        }else{
            $data['package_data'] = '';
            $data['package_count'] = 0;        
        } 

        $data['serach_var'] ="";
		
		//echo"<pre>";print_r($data);echo"</pre>";exit;
       
        return view('front.package_lists',$data);
    }

    public function package_detail($page_url=''){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        $packages_data = DB::table('packages')->where('page_url', $page_url)->first();

        echo "<pre>";print_r($packages_data);echo "</pre>";exit; 

        if($packages_data != ''){
            $data['package_detail'] =$packages_data;
        }else{
            $data['package_detail'] ="";
        }

        // echo "<pre>";print_r($data);echo "</pre>";exit;     

        return view('front.package_detail',$data);
    }

    public function enquiry(Request $request,$id,$service_id){

        //echo $id;exit;
        
        $service= DB::table('packages')->where('id',$id)->first();
        

        if($service_id != 0){
            $service_id = $service_id;
            $subservice_id = 0;
            $packagecategory_id = 0;
        }else{
            $service_id = $service->service_id;
            $subservice_id = $service->subservice_id; 
            $packagecategory_id = $service->packagecategory_id; 
        }

        
        
    //    echo "<pre>";print_r($service);echo "</pre>";exit;   
        
        $form_field_data= DB::table('services')->where('id',$service_id)->first(); 
        
        //echo "<pre>";print_r($form_field_data);echo "</pre>";exit;

        $tags = explode(',', $form_field_data->form_fields);
        $data['result1'] = DB::table('form_fileds')->whereIn('id',$tags)->orderBy('set_order')->get()->toArray();
        $data['formFields'] = DB::table('form_fileds')->get()->toArray();

        $tags = explode(',', $form_field_data->form_fields_two);
        //$tags_two = explode(',', $form_field_data->form_fields_two);
        
        $data['result2'] = DB::table('form_fileds')
                                ->whereIn('id', $tags)
                                ->orderBy('set_order')
                                ->get()
                                ->toArray();

        //$data['result2'] = DB::table('form_fileds')->whereIn('id',$tags)->orderBy('set_order')->get()->toArray();
        //$data['formFields1'] = DB::table('form_fileds')->get()->toArray();

        $data['package_id'] =$id;
        $data['service_id'] = $service_id;
        $data['subservice_id'] = $subservice_id;
        $data['packagecategory_id'] =$packagecategory_id; 

        // echo "<pre>";print_r($data['form_fields_data']);echo "</pre>";exit;



        return view('front.enquiry',$data);

    }
    public function package_inquiry(Request $request){
        
        // echo "<pre>";print_r($request->post());echo "</pre>";

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

            $currentDate = now();
            //echo $request->service_id;
            if($request->subservice_id != 0){

               // echo "fff";
                $subscription_vendor_data= DB::table('subscription')->where('services',$request->service_id)
                ->whereRaw('FIND_IN_SET(?, sub_service)', [$request->subservice_id])
                ->where('enddate', '>=', $currentDate)
                ->get();
            }else{

                //echo "fff77777777";
                $subscription_vendor_data= DB::table('subscription')->where('services',$request->service_id)                
                ->where('enddate', '>=', $currentDate)
                ->get();
            }
            

     
            // echo "<pre>";print_r($subscription_vendor_data);echo "</pre>";exit;
     
             $vendor_id_array = array();
             
             if($subscription_vendor_data != '' && !empty($subscription_vendor_data)){
                 
                 foreach($subscription_vendor_data as $subscription_vendor_val){
                     $vendor_id_array[] = $subscription_vendor_val->vendor_id;
                     
                 }

             }
             
     
             foreach($vendor_id_array as $vendor_id_array_data){

                // echo "<pre>";print_r($vendor_id_array_data);echo "</pre>";exit;
                 $vendor_data= DB::table('users')->where('id',$vendor_id_array_data)->first();               
                  
                 if($vendor_data && $vendor_data->is_active == 0){ 
                    
                    if(isset($request->form_field_id)){
                    
                    $field_array = array();
                    foreach($request->form_field_id as $key => $values) {

                       $formfield_value_array = $request->formfield_value[$key];

                       
                        $form_fields = DB::table('form_fileds')
                        ->select('*')
                        ->where('id', '=',$values)
                        ->first();
                        

                        $field_array[] = array('name' =>$form_fields->lable_name, 'value' => $formfield_value_array );

                        // echo "<pre>";print_r($field_array);echo "</pre>";exit;
                                               
                                              
                    }
                    }
                    if (isset($request->form_field_mul_dropdown_id)) {
                        $mul_field_array = array();
                        foreach ($request->form_field_mul_dropdown_id as $key => $value) {
                            $mul_drop_fields = DB::table('form_fileds')
                                ->select('*')
                                ->where('id', '=', $value)
                                ->first();
                    
                            // Check if the formfield_mul_dropdown exists in the request
                            if (isset($request['formfield_mul_dropdown_' . $value])) {
                                // Assuming $request['formfield_mul_dropdown_' . $value] is an array
                                $formfield_mul_dropdown = implode(',', $request['formfield_mul_dropdown_' . $value]);
                    
                                $mul_field_array[] = array('name' => $mul_drop_fields->lable_name, 'value' => $formfield_mul_dropdown);
                            }
                        }
                    }
                    

                    if(isset($request->form_field_checkbox_id)){ 
                        $mul_field_array = array();
                         foreach($request->form_field_checkbox_id as $key => $valuess) {
                             
                                $checkbox_fields = DB::table('form_fileds')
                                ->select('*')
                                ->where('id', '=',$valuess)
                                ->first();
                                if (isset($request['formfield_checkbox_'.$valuess])) {
                                $formfield_checkbox = implode(',', $request['formfield_checkbox_'.$valuess]);
                               
                                $checkbox_field_array[] = array('name' =>$checkbox_fields->lable_name, 'value' => $formfield_checkbox );
    
                                // echo "<pre>";print_r($checkbox_field_array);echo "</pre>";
                         }  }                    
                        }

                        if(isset($request->form_field_radio_id)){ 
                            $radio_field_array = array();
                             foreach($request->form_field_radio_id as $key => $values) {
                                 
                                    $radio_fields = DB::table('form_fileds')
                                    ->select('*')
                                    ->where('id', '=',$values)
                                    ->first();
                                    if (isset($request['formfield_radio_'.$values])) {
                                    $formfield_radio = $request['formfield_radio_'.$values];
                                   
                                    $radio_field_array[] = array('name' =>$radio_fields->lable_name, 'value' => $formfield_radio);
        
                                    // echo "<pre>";print_r($radio_field_array);echo "</pre>";
                             }                     
                             }                     
                            }


                    // echo "<pre>";print_r($mul_field_array);echo "</pre>";exit;

                    

                     $html = '<!doctype html> 
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
                                                 
                                                     <th colspan="2">Dear '.ucfirst($vendor_data->name).'</th>
                                                     
                                                    <tr>
                                                        <th>Name</th>
                                                        <td >'.$data['name'].'</td>
                                                    </tr>';
                                                    if($data['service_id'] !=''){ 
                                                        $html .='<tr>
                                                        <th>Service</th>
                                                        <td>'.\Helper::servicename($data['service_id']).'</td>
                                                    </tr>';
                                                    }
                                                    if($data['subservice_id'] !=''){ 
                                                        $html .='<tr>
                                                        <th>Sub Service</th>
                                                        <td>'.\Helper::subservicename($data['subservice_id']).'</td>
                                                    </tr>';
                                                    }
                                                    if($data['packagecategory_id'] !=''){ 
                                                        $html .='<tr>
                                                        <th>Package Category</th>
                                                        <td>'.\Helper::packagescategory($data['packagecategory_id']).'</td>
                                                    </tr>';
                                                    }
                                                    if($data['pakage_id'] !=''){ 
                                                        $html .='<tr>
                                                        <th>Package</th>
                                                        <td>'.\Helper::packages_enquiry($data['pakage_id']).'</td>
                                                    </tr>';
                                                    }                                        
                
                                                    
                                                if(isset($field_array) && $field_array !=''){
                                                 foreach($field_array as $form_fields_data){     
                                                    if($form_fields_data['value'] != '') {                                               
                                                    $html .= '<tr>
                                                    <th>'. $form_fields_data['name'].'</th>    
                                                    <td >'.$form_fields_data['value'].'</td>                                               
                                                    </tr>';
                                                } }
                                                }
                                                
                                                if(isset($mul_field_array) && $mul_field_array !=''){
                                                foreach($mul_field_array as $mul_field_array_data){                                                    
                                                    $html .= '<tr>
                                                    <th>'. $mul_field_array_data['name'].'</th>    
                                                    <td >'.$mul_field_array_data['value'].'</td>                                               
                                                    </tr>';
                                                }
                                                }

                                                if(isset($checkbox_field_array) && $checkbox_field_array !=''){
                                                    foreach($checkbox_field_array as $checkbox_field_array_data){                                                    
                                                        $html .= '<tr>
                                                        <th>'. $checkbox_field_array_data['name'].'</th>    
                                                        <td >'.$checkbox_field_array_data['value'].'</td>                                               
                                                        </tr>';
                                                    }
                                                    }
                                                if(isset($radio_field_array) && $radio_field_array !=''){
                                                    foreach($radio_field_array as $radio_field_array_data){                                                    
                                                        $html .= '<tr>
                                                        <th>'. $radio_field_array_data['name'].'</th>    
                                                        <td >'.$radio_field_array_data['value'].'</td>                                               
                                                        </tr>';
                                                    }
                                                    }
                                                    

                                                $html .=' </table>
                                         </td>
                                     </tr>';
                                     $html .='<tr>
                                     <td style="
                                     text-align: center;"> <button class="btn btn-primary" type="button"
                                     style="background-color: #1F6EEC;
                                     border-color: #1F6EEC;
                                     color: #fff;
                                     padding: 10px 18px;
                                     border-radius: 11px;
                                 ">Accept</button> </td>
                                 </tr>';
                                     $html .='<tr>
                                                     <td><br><br>Regards,<br>VendorsCity Team </td>
                                                 </tr>
                                 </table>
                             </div>
                         </div>
                     </body>
                 </html>';

                 
                //  echo $vendor_data->email;
                //  echo $html;exit;
                 $subject = "Enquiry Details";
                 $to = $vendor_data->email;
                //  $bccEmails = ["patelnikul321@gmail.com", "asmit@digitalsadhus.com"];
                 Mail::send([], [], function($message) use($html, $to,  $subject) {
                     $message->to($to,'VendorsCity');
                    //  $message->bcc($bccEmails);
                     $message->subject($subject);
                     $message->from('mayudin.hnrtechnologies@gmail.com','VendorsCity');
                     $message->html($html);
                 });
             }
             
     }       


     return redirect()
    ->route('enquiry', ['id' => $data['pakage_id'], 'service_id' => $data['service_id']])
    ->with('L_strsucessMessage', 'Enquiry Form Submitted Successfully');
 

    }
    
}