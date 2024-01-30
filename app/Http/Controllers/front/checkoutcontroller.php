<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
Use DB;
Use Helper;
use Session;
Use Mail;
class checkoutcontroller extends Controller
{
    //
    public function checkout(){
        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";
        $data['country']= DB::table('countries')->orderBy('id', 'DESC')->get();

        //echo "<pre>";print_r($data);echo"</pre>";exit;
        return view('front.checkout',$data);
    }

    function order_place(Request $request){
       
        $userdata = Session::get('user');
        
        // echo "<pre>";print_r($userdata);echo"</pre>";
        // echo "<pre>";print_r($request->post());echo"</pre>";

        

        $cart = \Cart::content();
        // echo "<pre>";print_r($cart);echo"</pre>";
        // exit;

        $id = $_POST['payment_method'];

        if($id == '1'){
            $order_status = 'P';
            $paymentmode = $id;
            $list_order_status = '0';
            $payment_status = 'Success';
            $payment_mode = "COD";
        }else {
            $order_status = 'P';
            $paymentmode = $id;
            $list_order_status = '0';
            $payment_status = 'FAILED';
            $payment_mode = "ONLINE PAYMENT";   
        }

        $intOrderNumber = DB::table('ci_orders')
                ->select(DB::raw('MAX(order_id) as lastOrderNumber'))
                ->first();
        
                //echo "<pre>";print_r($intOrderNumber);echo"</pre>";

        if ($intOrderNumber) {
            $intOrderNumber = $intOrderNumber->lastOrderNumber + 1;

            $intOrderNumber_new = $intOrderNumber;
            $nextOrderNumber;
        } else {
            $intOrderNumber_new = 1;
        }

        Session::put('order_number', $intOrderNumber_new);
        $order_number = Session::get('order_number');

        //echo "<pre>";print_r($order_number);echo"</pre>";


        $userid = $userdata['userid'];
        // echo "<pre>";print_r($userid);echo"</pre>";exit;

        if(session('coupan_data.coupancode') != ''){
            $coupancode=session('coupan_data.coupancode');
        }else{
            $coupancode="";
        }

        if(session('discount_amount') != ''){
            $coupondiscount = session('discount_amount');
        }else{
            $coupondiscount = 0;
        }

        $content=array(
            'user_id'               => $userid,
            'order_number'          => $order_number,
            'order_total'           => session('order_total'),
            'shippingcost'          => session('shippingcahrge'),
            'vatcharge'             => session('vatcharge'),
            'order_currency'        => 'AED',
            'order_status'          => $order_status,
            'paymentmode'           => $paymentmode,
            'payment_status'        => $payment_status,
            'created_at'            => date('Y-m-d H:i:s'),
            'coupondiscount'        => $coupondiscount ,
            'coupon_code'           => $coupancode,
            //'ip_address'            => $_SERVER['REMOTE_ADDR'],
            'list_order_status'     => $list_order_status,
        );

        $arrOrderId = DB::table('ci_orders')->insertGetId($content);
        //echo "<pre>";print_r($arrOrderId);echo"</pre>";
        

        if ($arrOrderId) {
            $arrOrderId;
        }

        foreach(\Cart::content() as $arrRowDeailts){

        $arrData=array(
                'order_id'              => $arrOrderId,
                'user_info_id'          => $userid,
                'package_id'            => $arrRowDeailts->id,
                'package_item_name'     => $arrRowDeailts->name,
                'package_quantity'      => $arrRowDeailts->qty,
                'package_item_price'    => $arrRowDeailts->price,
                'service_id'            => $arrRowDeailts->options->service_id,
                'service_name'          => $arrRowDeailts->options->service_name,
                'subservice_id'         => $arrRowDeailts->options->subservice_id,
                'subservice_name'       => $arrRowDeailts->options->subservice_name,
                'packagecategory_id'    => $arrRowDeailts->options->packagecategory_id,
                'packagecategory_name'  => $arrRowDeailts->options->packagecategory_name,
                'page_url'              => $arrRowDeailts->options->page_url,
                'image'                 => $arrRowDeailts->options->image,
                'discount'              => $arrRowDeailts->options->discount,
                'discount_type'         => $arrRowDeailts->options->discount_type,
                'product_discount_amount'         => round($arrRowDeailts->options->product_discount_amount),
                'cdate'                 => date('Y-m-d'),
                'subservice_booking_percentage'                 => $arrRowDeailts->options->subservice_booking_percentage,

                );

            DB::table('ci_order_item')->insertGetId($arrData);

            // DB::table('product_attribute')
            //     ->where('id', $arrRowDeailts->options->attribute_id)
            //     ->decrement('qty', $arrRowDeailts->qty);
        }
        if($request->fname !=''){
            $data['first_name']=$request->fname;
            $data['last_name']=$request->lname;
            $data['country']=$request->country;
            $data['address1']=$request->address1;
            $data['state']=$request->state_name;
            $data['city']=$request->city;
            $data['zipcode']=$request->zipcode;
            $data['address2']=$request->optional;
            $data['phone_number']=$request->phone;
            $data['email_address']=$request->email_ship;
            $data['additional_message']=$request->additional_message;
            $data['payment_method']=$request->payment_method;
            $data['order_id']=$arrOrderId;
            $data['user_id']=$userid;           
            
            DB::table('ci_shipping_address')->insert($data);
        }
        

        if($id == 1){
            $success = $this->success_mail();
            if ($success) {
                // Redirect to the 'thankyou' route
                return redirect('thankyou');
            } 
        }else{

            $success = $this->success_mail();
            if ($success) {
                // Redirect to the 'thankyou' route
                return redirect('thankyou');
            } 
        }

       

        // echo "<pre>";print_r($content);echo"</pre>";exit;
        
    }

    function success_mail(){

        $order_number = Session::get('order_number');
 
         $orderdata = DB::table('ci_orders')->where('order_number',$order_number)->first();
        

         if($orderdata->paymentmode == 1){
             $payment_mode = "Cash On Delivery";
         }else{
             $payment_mode = "Online Payment";
         }
 
         $order_item_data = DB::table('ci_order_item')->where('order_id',$order_number)->get();
       //  $shiaddress = DB::table('ci_shipping_address')->where('order_id',$order_number)->first();
    //    echo "<pre>";print_r($order_item_data);echo"</pre>";
         // echo "<pre>";print_r($orderdata);echo "</pre>";
       
         $i=1;
 
             $message_body ='';
 
             $message_body .='<!doctype html>
 
 <html lang="en">
 
     <body style="margin: 0;font-family: Arial, Helvetica, sans-serif;">
 
         <div style="max-width:630px;margin: 0 auto;border: thin solid #f3f0f0;">
 
             <header style="text-align:center;"><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
 
                 <a href="{{ config("app.url") }}"><img style="max-width:100%;display: inline-block;" src="'.asset("public/site/images/VC-LONG-COLOR.png").'"></a>           </header>
 
             <div style="background:#ababab;padding: 7% 8% 6%;">
 
                 <p style="font-size: 17px;letter-spacing: 0.5px;text-align:center;line-height: 30px;color:#fff;margin:0;">
 
                     Hi, Your order number <strong>'.$order_number.'</strong> has been<br>
 
                     successfully placed.
 
                 </p>
 
             </div>
 
             <div style="background:#EDEDED;padding: 20px 7%;font-size: 14px;text-align: left;">
 
                 <div style="width:55%;background:#EDEDED;text-align: left;display: inline-block;margin-bottom: 10px;">
 
                     <p style="margin:0">
 
                         <strong>Order Details</strong><br>
 
                         Order No.: '.$order_number.'<br><br>
 
                         Payment Mode: '.$payment_mode.'<br>
 
                     </p>
 
                 </div>
 
 
             </div>
 
             <div style="padding: 0px 30px;">
 
                 <p style="text-align: left;text-align: left;border-bottom: 2px solid #727171;padding-bottom: 4px;"><strong>Item(s) in Your Order</strong></p>
 
                 <table style="border-collapse: collapse;width: 100%;">';
 
                 $pvalue = '0';
 
                 $userdata = Session::get('user');
                 
               
                 $userid = $userdata['userid'];
                 

                
                
                 foreach($order_item_data as $arrRowDeailts )  
 
                 {

                    if($arrRowDeailts->product_discount_amount != 0 && $arrRowDeailts->product_discount_amount != ''){
                        $product_discount_amount = $arrRowDeailts->product_discount_amount;
                     }else{
                        $product_discount_amount = $arrRowDeailts->package_item_price;
                     }
 
                     $totalgst='0';
 
                     $message_body .='<tr style="border-bottom: 2px solid #CCCECF;">';
 
                     if($arrRowDeailts->image != ''){
 
                     $message_body .=' <td style="width: 85px;padding-bottom: 10px;vertical-align: top;"><img src="'.asset("public/upload/packages/large/".$arrRowDeailts->image).'" style="width:85px;height:97px;border: 2px solid gray;" /></td>';
                     }else{
                     $message_body .='<td style="width: 85px;padding-bottom: 10px;vertical-align: top;"><img src="'.asset("public/upload/packages/large/no-image.png").'" style="width:85px;height:97px;border: 2px solid gray;" /></td>';
                     }
 
                     $message_body .='<td style="text-align: left;vertical-align: top;padding-left: 15px;padding-bottom: 10px;">
 
                         <p style="margin: 0;"><strong>'.$arrRowDeailts->package_item_name.'</strong></p>
 
                         <p style="margin: 0;"> <span style="color:gray;">Quantity:</span> '.$arrRowDeailts->package_quantity.'</p><br>
 
                     </td>
 
                     <td style="vertical-align: top;width: 150px;text-align: right;padding-bottom: 10px;">'.
                     
                     
                     
                     $orderdata->order_currency.' '.number_format(($product_discount_amount * $arrRowDeailts->package_quantity),2); 
 
                     /* $message .='&nbsp; <del style="color:gray;">Rs.: 1599</del></td>';*/
 
                     $message_body .='</tr>';
 
                     $i++;
 
                     $pvalue = ($pvalue +  (($product_discount_amount) * $arrRowDeailts->package_quantity));
 
                 }
 
                     $message_body .='<tr style="border-bottom: 2px solid #CCCECF;color: #808080;">
 
                         <td style="text-align:left;" colspan="2">Subtotal</td>
 
                         <td style="text-align:right;">'.$orderdata->order_currency.' '.number_format($pvalue,2).'</td>
 
                     </tr>';
 
                     if($orderdata->coupondiscount != "" && $orderdata->coupondiscount !=0 )  {
 
                     $message_body .='<tr style="border-bottom: 2px solid #CCCECF;color: #808080;">
 
                         <td style="text-align:left;" colspan="2">Discount</td>
 
                         <td style="text-align:right;">'.$orderdata->order_currency.' '.number_format($orderdata->coupondiscount,2).'</td>
 
                     </tr>';
 
                     }
 
 
                     if($orderdata->shippingcost != "" && $orderdata->shippingcost !=0 ){
 
                     $message_body .='<tr style="color: #808080;">
 
                      <td style="text-align:left;" colspan="2">Shipping</td>
 
                      <td style="text-align:right;">'.$orderdata->order_currency.' '.number_format($orderdata->shippingcost,2).'</td>
 
                     </tr>';
 
                     }

                     if($orderdata->vatcharge != "" && $orderdata->vatcharge !=0 ){
 
                        $message_body .='<tr style="color: #808080;">
    
                         <td style="text-align:left;" colspan="2">VAT 5%</td>
    
                         <td style="text-align:right;">'.$orderdata->order_currency.' '.number_format($orderdata->vatcharge,2).'</td>
    
                        </tr>';
    
                        }
 
                     $message_body .='<tr style="border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: bold;">
 
                         <td style="text-align:left;" colspan="2">Total</td>
 
                         <td style="text-align:right;">'.$orderdata->order_currency.' '.number_format($orderdata->order_total,2).'</td>
 
                     </tr>
 
                 </table>
 
             </div>
 
         </div>
 
     </body>
 
 </html>';

                    
            $subject = "Thank you for shopping with Vendors City";
            $refer_id = $userdata['refer_id'];
            $system_percentage = DB::table('system')->first();
            $total = ($orderdata->order_total * $system_percentage->percentage /100);
           
            
        if(isset($userdata['refer_id']) && $userdata['refer_id'] !='')
        {
            $data['userid']=$userdata['userid'];
            $data['refer_id']=$userdata['refer_id'];
            $data['order_currency']=$orderdata->order_currency;
            $data['wallet_amount']=$total;
            $data['system_percentage']=$system_percentage->percentage;
            $data['order_total']=$orderdata->order_total;
            $data['added_date']=date('Y-m-d');
           
            DB::table('front_user_wallet')->insert($data);
        }

           

              
        
         $to = 'devang.hnrtechnologies@gmail.com';
         Mail::send([], [], function($message) use($message_body, $to, $subject) {
             $message->to($to);
             $message->subject($subject);
             $message->from('devang.hnrtechnologies@gmail.com', 'Vendors City');
             $message->html($message_body);
         });
 
 
     
         return true;
 
     }

     function thankyou(){
        \Cart::destroy(); 
        session()->forget('coupan_data');
        session()->forget('shippingcahrge');
        session()->forget('discount_amount');
        session()->forget('order_total');
        
       //echo "here";exit;
       $data['meta_title'] = "";
       $data['meta_keyword'] = "";
       $data['meta_description'] = "";

       $data['message'] =  "Thank you for Order. Your order will be delivered soon";

       return view('front.thank_you',$data);
   }

    function bill_state_change(){

        $country_id=$_POST['country_id'];

        $result=DB::table('states')
                    ->select('*')
                    ->where('country_id','=',$country_id)
                    ->get();

            $result_new=$result->toArray();
            // echo"<pre>";print_r($result_new);echo"</pre>";exit;
            $html  ="<select name='state_name' id='state_name' class='form-control' onchange='ship_state_change(this.value);'>";
            $html .="<option value=''>Select State</option>";
            if($result !='' &&  count($result)>0){
    
                for($i=0; $i<count($result); $i++){
                    
                    $html .="<option value='".$result[$i]->id."'>".$result[$i]->state."</option>";
                }
            }
            $html  .="<select>";
            echo $html;
    }

    function ship_state_change(){

        $country_id=$_POST['country'];
        $state_id=$_POST['state_id'];

        $result=DB::table('cities')
                    ->select('*')
                    ->where('country','=',$country_id)
                    ->where('state','=',$state_id)
                    ->get();

            $result_new=$result->toArray();
            // echo"<pre>";print_r($result_new);echo"</pre>";exit;
            $html  ="<select name='city' id='city' class='form-control'>";
            $html .="<option value=''>Select Town / City</option>";
            if($result !='' &&  count($result)>0){
    
                for($i=0; $i<count($result); $i++){
                    
                    $html .="<option value='".$result[$i]->id."'>".$result[$i]->name."</option>";
                }
            }
            $html  .="<select>";
            echo $html;
    }

    

}