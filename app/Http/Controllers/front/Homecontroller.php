<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use DB;

class Homecontroller extends Controller
{
    public function index(){

        $data['banner_data'] = DB::table('banners')->orderBy('set_order')->get();

        $data['collection_data'] = DB::table('collections')->orderBy('set_order')->get();

        $data['rec_fet_best_pro_data'] = DB::table('products')->where('recent_product',1)->Orwhere('feature_product',1)->Orwhere('best_seller',1)->get();

        $data['sub_banner_data'] = DB::table('sub_banners')->orderBy('set_order')->get();

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        // echo "<pre>";print_r($data);echo "</pre>";exit;
    	return view('front.index',$data);
    }

    

    public function cart(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.cart',$data);
    }


    public function check_email(Request $request){

        $email = $request->email;
        $result = DB::table('subscribes')->where('email',$email)->first();
        
        if($result !=''){
            echo 0;
        }else{

            // echo "test";exit;
            echo 1;
        }
    }

    public function news_letter_email(Request $request){
        // echo "test";exit;
        $data['email'] = $request->email;
        $data['created_at'] = date('Y-m-d');

        // echo "<pre>";print_r($data);echo "</pre>";exit;
        DB::table('subscribes')->insert($data);

        $html = '<!doctype html> <html>
        
            <head>
                <meta charset="utf-8">
                <title>Subscribes Email</title>
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
                
                    <div class="logo">
                        <img src="'.asset("public/site/images/sagar-logo.png").'" style="width: 30%;" >
                    </div>
                    <div class="email-wrapper" >
                        <table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">          
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="5">   
                                        <tr>
                                            <td style="font-size:18px;">Hello ,</td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:20px;">
                                               Please find the below Subscribe details
                                            </td> 
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border-top:3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">   
                                        <tr>
                                            <td width="50%">        
                                                <table width="100%" border="0" cellspacing="0" cellpadding="5">   
                                                    
                                                    <tr><td width="100px">Email: </td><td>'.$data['email'].'</td></tr>
                                                   
                                                </table>
                                            </td>   
                                        </tr>   
                                    </table>
                                </td>   
                            </tr>
                        </table>
                    </div>
                    
                </div>
            </body>
        </html>';
        $subject = "Thank you for Subscribe - Sagar store";
        $to = $data['email'];
        // $to = 'parth.hnrtechnologies@gmail.com';
        // $to = $request->email;
        Mail::send([], [], function($message) use($html, $to, $subject) {
            $message->to($to);
            $message->subject($subject);
            $message->from('devang.hnrtechnologies@gmail.com', 'Sagar store');
            $message->html($html);
        });


        // return redirect()->route('/')->with('L_strsucessMessage','News Letter Email Added successfully');
        return redirect()->to('/')->with('L_strsucessMessage','News Letter Email Added successfully');
    }

    public function about_company(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.about_company',$data);
    }

    public function our_services(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.our_services',$data);
    }

    public function latest_blogs(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.latest_blogs',$data);
    }

    public function contact_us(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.contact_us',$data);
    }

    public function terms_conditions(){

        $data['cms_data'] = DB::table('cms')->where('id',1)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }

    public function privacy_policy(){

        $data['cms_data'] = DB::table('cms')->where('id',2)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }

    public function what_we_offer(){

        $data['cms_data'] = DB::table('cms')->where('id',3)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }

    public function return(){

        $data['cms_data'] = DB::table('cms')->where('id',4)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }
    
    public function free_delivery(){

        $data['cms_data'] = DB::table('cms')->where('id',5)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }

    public function days_refund(){

        $data['cms_data'] = DB::table('cms')->where('id',6)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }

    public function multiple_payments(){

        $data['cms_data'] = DB::table('cms')->where('id',7)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }

    public function sustainable(){

        $data['cms_data'] = DB::table('cms')->where('id',8)->first();

        $data['meta_title'] = $data['cms_data']->meta_title;
        $data['meta_keyword'] = $data['cms_data']->meta_keyword;
        $data['meta_description'] = $data['cms_data']->meta_description;

        return view('front.cms',$data);
    }


    
}
