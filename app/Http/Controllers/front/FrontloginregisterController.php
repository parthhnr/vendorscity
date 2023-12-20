<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\front\Frontloginregister;
use Hash;
use DB;
use Session;

use Carbon\Carbon;

use Symfony\Component\Mime\Email;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;




class FrontloginregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('front.frontloginregister');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('front.front_login');
    }
    public function Sign_in()
    {
        return view('front.front_login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $frontloginregister= new Frontloginregister;

        $frontloginregister->name=$request->name;
        $frontloginregister->email=$request->email;
        $frontloginregister->password= Hash::make($request->password);
        $frontloginregister->mobile=$request->mobile;  
        $frontloginregister->status=0;    
      

        $frontloginregister->save();

        $newuserdata = array(
            'userid'  => $frontloginregister->id,
            'name'  => $frontloginregister->name,            
            'email'  => $frontloginregister->email,       
            'mobile'  => $frontloginregister->mobile,       
            'logged_in' => true
        );
        $check = Session::put('user', $newuserdata);      

        return redirect()->to('/')->with('L_strsucessMessage', 'Registration  Successfully'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo"<pre>";
        // print_r($frontloginregister);
        // echo"</pre>";exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo"test";exit;
    }
    function registration_mail_check(){

        // echo "test";exit;

        $email = $_POST['email']; 

        $result = DB::table('frontloginregisters')
            ->select('*')
            ->where('email', $email)
            ->first();

        if ($result) {
            return 1;
        } else {
            return 0;
        }

            echo $result;
    }

    public function check_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        $user = DB::table('frontloginregisters')->where('email', $email)->first();
    
        if ($user && Hash::check($password, $user->password)) {
            if ($user->status == 1) {
                echo 1; // Login successful
            } else {
                echo 2; // Status is not 1
            }           
            
        } else {
            
            echo 0;
        }
    }
    // if ($user && Hash::check($password, $user->password)  && $user->status == 1)
    public function user_signout()
    {
        Session::flush();
        return redirect()->route('Sign-in');
        
    }
    public function user_login(Request $request)
    {
        $data['email'] = $request->email;
        $data['password'] = $request->password;
    
        // Check if the user exists based on the email
        $checklogin = DB::table('frontloginregisters')->where('email', $data['email'])->first();
    
        if ($checklogin && Hash::check($data['password'], $checklogin->password)) {
            // Login successful
            $newuserdata = [
                'userid' => $checklogin->id,
                'name' => $checklogin->name,
                'email' => $checklogin->email,
                'logged_in' => true,
            ];
    
            Session::put('user', $newuserdata);
    
            return redirect()->to('/')->with('L_strsucessMessage', 'Log in Successfully');
        }
    }
    public function lost_password(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.lost_password',$data);
    }
        public function emailCheck(Request $request)
    {
        $email = $request->email;
        $user = DB::table('frontloginregisters')->select('*')->where('email','=',$email)->first();
        if ($user == '')
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }

     public function get_password(Request $request)
    {
        $email = $request->email;
        
        $user_data = DB::table('frontloginregisters')->where('email','=',$email)->first();
        $encrypted = Crypt::encryptString($user_data->id);
        $data = '<!doctype html> <html>
            <head>
                <meta charset="utf-8">
                <title>Forget Password Email</title>
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
                                            <td ><br>Dear '.$user_data->name.',</td>
                                        </tr>
                                        <tr>
                                            <td > 
                                            You recently requested a password reset. To change your password,<br>
                                            click <a href="'.URL::to('/reset-password').'/'.$encrypted.'">here</a> or paste the following link into your browser: '.URL::to('/reset-password').'/'.$encrypted.'
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
        $subject = "Reset Password";
        $to = $email;
        Mail::send([], [], function($message) use($data, $to, $subject) {
            $message->to($to,'VendorsCity');
            $message->subject($subject);
            $message->from('devang.hnrtechnologies@gmail.com','VendorsCity');
            $message->html($data);
        });
        return redirect()->to('/')->with('L_strsucessMessage','E-mail has been sent Successfully');
    }

        public function reset_password(Request $request)
    {
        $user_id = $request->uid;
        $user_id = Crypt::decryptString($user_id);
        $data['uid'] = $user_id;

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.reset-password',$data);
    }
   

    public function set_password(Request $request)
    {
        $user_id = $request->uid;
        if ($_POST['action'] == "reset-password")
        {
            foreach($_POST as $key => $value)
            {
                $data[$key] = $_POST[$key];
            }
        }
        $password = Hash::make($data['password']);
        
        DB::table('frontloginregisters')->where('id','=',$user_id)->update(['password' => $password]);
        return redirect()->route('Sign-Up.create')->with('L_strsucessMessage','Password Changed Successfully');
    }
    
    
}