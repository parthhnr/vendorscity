<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use App\Models\Admin\City;
use App\Models\Admin\UserPermission;
use Illuminate\Support\Facades\Hash;
use DB;

class Homecontroller extends Controller
{
    public function index(){

        $data['service']=DB::table('services')->orderBy('set_order','ASC')->get();
     // $data['service']=DB::table('services')->orderBy('set_order')->get();
        $data['faq']=DB::table('faqs')->orderBy('id','DESC')->get();   

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        // echo "<pre>";print_r($data);echo "</pre>";exit;
    	return view('front.index',$data);
    }

    public function book_services(){

        
        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        // echo "<pre>";print_r($data);echo "</pre>";exit;
        return view('front.book_services',$data);
    }

    public function become_vendor(){

        $data['permission_data'] = UserPermission::orderBy('id','DESC')->get();       
        $data['city_data'] = City::orderBy('id','DESC')->get();
        
        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        // echo "<pre>";print_r($data);echo "</pre>";exit;
        return view('front.become_vendor',$data);
    } 

    public function vendors_data(Request $request)
    {
    //    echo"<pre>";
    //    print_r($request->post());
    //    echo"</pre>";exit;
       
        $data['role_id']=$_POST['hidden_role_id'];
        $data['name']=$_POST['name'];
        $data['user_name']=$_POST['user_name'];     
        $data['short_description']=$_POST['short_description'];  
        $data['companywebsite']=$_POST['companywebsite'];
        $data['city']=$_POST['city'];
        $data['crole']=$_POST['crole'];
        $data['parentcname']=$_POST['parentcname'];
        $data['establishment_date']=$_POST['establishment_date'];
        $data['tlexpiry']=$_POST['tlexpiry'];
        $data['staff']=$_POST['staff'];
        $data['remarks']=$_POST['remarks'];
        $data['socialmedai']=$_POST['socialmedai'];
        $data['password']=Hash::make ($_POST['password']);        
        $data['email']=$_POST['email'];
        if($_POST['mobile'] !='')
        {
            $data['mobile']=$_POST['mobile'];
        }
        else
        {
            $data['mobile']=null;
        }
              
        $data['vendor'] = 1;
        $data['is_active'] = 1;

        if ($request->hasFile('vatcertificate')) 
    {
             
        $file = $request->file('vatcertificate');
             
        $path = public_path('upload/vendors/');
            
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
       
        $file->move($path, $fileName);
        
       
        $data['vatcertificate']= $fileName;
           
    }
    if ($request->hasFile('trncertificate')) 
    {
             
        $file = $request->file('trncertificate');
             
        $path = public_path('upload/vendors/');
            
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
       
        $file->move($path, $fileName);
        
       
        $data['trncertificate']= $fileName;
        
           
    }
    if ($request->hasFile('tradelicense')) 
    {
             
        $file = $request->file('tradelicense');
             
        $path = public_path('upload/vendors/');
            
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
       
        $file->move($path, $fileName);
        
       
        $data['tradelicense']= $fileName;
           
    }

       

   $vendors_id = DB::table('users')->insertGetId($data);

       

    if (count($_POST['poc']) > 0 && $_POST['poc'] != '') {

        for ($i = 0; $i < count($_POST['poc']); $i++) {

            if($_POST['poc'][$i] != '')
            {

                $content['p_id'] = $vendors_id;

                $content['poc'] = $_POST['poc'][$i];

                $content['poctitle'] = $_POST['poctitle'][$i];

                $content['c_email'] = $_POST['c_email'][$i];

                $content['telephone'] = $_POST['telephone'][$i];

                $this->insert_attribute($content);

            }

        }

    }
    // return redirect()->to('/')->with('success', 'Vendor Data Added Successfully');
    return redirect()->to('/')->with('L_strsucessMessage','Vendor Data Added Successfully.');
        
    }
    function insert_attribute($content)
    {

        $data['pid'] = $content['p_id'];
        $data['poc'] = $content['poc'];
        $data['poctitle'] = $content['poctitle'];
        $data['c_email'] = $content['c_email'];
        $data['telephone'] = $content['telephone'];
        DB::table('vendors_attribute')->insertGetId($data);

    }

    function vendors_check_mail(){

        // echo "test";exit;

        $email = $_POST['email']; 

        $result = DB::table('users')
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