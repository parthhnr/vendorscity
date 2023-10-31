<?php

namespace App\Http\Controllers\front\UserRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use DB;
use Session;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;

class UserRegistration extends Controller
{
    public function register(Request $request){

        if($request->action == 'user-register'){
            
            $data['name'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = $request->password;
            $data['create_at'] = \Carbon\Carbon::now();

            $data['id'] = DB::table('front_users')->insertGetId($data);

            $newuserdata = array(
                    'userid'  => $data['id'],
                    'name'  => $data['name'],
                    'email'  => $data['email'],       
                    'logged_in' => true
                );
            Session::put('userdata', $newuserdata);

            $data = '<!doctype html> <html>
        
            <head>
                <meta charset="utf-8">
                <title>Registration Email</title>
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
                        <img src="{{ asset("public/site/images/sagar-logo.png") }}" style="width: 30%;" >
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
                                               Please find the below Registration details
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
                                                    <tr><td width="100px">Name: </td><td>'.$data['name'].'</td></tr>
                                                    <tr><td width="100px">Email: </td><td>'.$data['email'].'</td></tr>
                                                    <tr><td width="100px">Password: </td><td>'.$data['password'].'</td></tr>
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

        $subject = "Thank you for Registration - Sagar store";
        $to = 'ventesh.hnrtechnologies@gmail.com';
        // $to = $request->email;
        // Mail::send([], [], function($message) use($html, $to, $subject) {
        //     $message->to($to);
        //     $message->subject($subject);
        //     $message->from('devang.hnrtechnologies@gmail.com', 'Sagar store');
        //     $message->setBody($html, 'text/html');
        // });
        
        return redirect()->to('/')->with('L_strsucessMessage','Registration Successfully.');
    }
    	return view('front.register');
    }

    public function checkmail()
    {
        $email = $_POST['email_id'];
        $user = DB::table('front_users')->select('*')->where('email','=',$email)->first();
        if ($user != '') {
            echo "0";die;
        }
        else{
            echo "1";die;
        }
    }

    public function checklogin()
    {
        $email = $_POST['email_id'];
        $password = $_POST['password'];
        $user = DB::table('front_users')->select('*')->where('email','=',$email)->where('password','=',$password)->first();
        if ($user == '')
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }
    public function emailCheck()
    {
        $email = $_POST['email_id'];
        $user = DB::table('front_users')->select('*')->where('email','=',$email)->first();
        if ($user == '')
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }

    public function login(Request $request){

        if($request->action == 'user-login'){

            $content['email'] = $request->email;
            $content['password'] = $request->password;
            $checklogin = DB::table('front_users')->select('*')->where('email','=',$content['email'])->where('password','=',$content['password'])->first();
            
            if($checklogin !='')
            {
                $newuserdata = array(
                    'userid'  => $checklogin->id,
                    'name'  => $checklogin->name,
                    'email'  => $checklogin->email,       
                    'logged_in' => true
                );
                $check = Session::put('userdata', $newuserdata);

                return redirect()->to('/')->with('L_strsucessMessage','Login Successfully.');
            }
        }

    	return view('front.login');
    }
    
    public function lost_password(){

        return view('front.lost_password');
    }


    public function get_password(Request $request)
    {
        $email = $request->email;
        
        $user_data = DB::table('front_users')->where('email','=',$email)->first();
       // echo "<pre>";print_r($user_data);echo "</pre>";exit;
        //$encrypted = Crypt::encryptString($user_data->id);
        $data = '<!doctype html> <html>
            <head>
                <meta charset="utf-8">
                <title>Contact Email</title>
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
                    <img src="'.asset('public/site/assets/images/logo.png').'" style="width: 30%;float: inherit;" >
                    </div>
                    <div class="email-wrapper" >
                        <table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">          
                            <tr>
                                <td>
                                    <table width="100%" border="2" cellspacing="0" cellpadding="5">   
                                        <tr>
                                            <td ><br>Dear '.$user_data->name.',</td>
                                        </tr>
                                        <tr>
                                            <td > 
                                            You recently requested a password reset. To change your password,<br>
                                             click here or paste the following link into your browser: Test
                                            The link will expire in 24 hours, so be sure to use it right away.
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td><br><br>Regards,<br>Sagar Store Team </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </body>
        </html>';
        $subject = "Reset Password";
        $to = $email;
        // Mail::send([], [], function($message) use($data, $to, $subject) {
        //     $message->to($to,'Sagar Store');
        //     $message->subject($subject);
        //     $message->from('devang.hnrtechnologies@gmail.com','Sagar Store');
        //     $message->setBody($data, 'text/html');
        // });
        return redirect()->to('/')->with('L_strsucessMessage','E-mail has been sent Successfully');
    }

    public function signout()
    {   
        Session::flush();
        return redirect()->to('/');
    }

    public function my_profile(){
        
        if(Session::get('userdata') ==''){
            return redirect()->to('/');
        }

        $userdata = Session::get('userdata')['userid'];
        $data['my_profile'] = DB::table('front_users')->where('id',$userdata)->first();
        return view('front.my_profile');
    } 

    public function my_orders(){
        if(Session::get('userdata') ==''){
            return redirect()->to('/');
        }
        return view('front.my_orders');
    }

    public function edit_profile(){
        if(Session::get('userdata') ==''){
            return redirect()->to('/');
        }
        return view('front.edit_profile');
    }

    public function edit_address(){
        if(Session::get('userdata') ==''){
            return redirect()->to('/');
        }
        return view('front.edit_address');
    } 

    public function add_address(){
        if(Session::get('userdata') == ''){
            return redirect()->to('/');
        }
        return view('front.add_address');
    }

    public function wishlist(){
        if(Session::get('userdata') == ''){
            return redirect()->to('/');
        }
        return view('front.wishlist');
    }
}
