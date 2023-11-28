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

        $data['service']=DB::table('services')->orderBy('id','DESC')->get();
     // $data['service']=DB::table('services')->orderBy('set_order')->get();
      
       

       

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

    
    
}