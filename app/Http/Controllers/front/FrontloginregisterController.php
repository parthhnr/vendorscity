<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\front\Frontloginregister;
use Hash;
use DB;
use Session;

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
        //
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
        //
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
}