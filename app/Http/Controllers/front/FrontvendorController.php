<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use DB;

class FrontvendorController extends Controller
{
    
    public function vendor_database(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";
        $pagination =DB::table('users')->where('vendor',1)->where('is_active',0)->orderBy('id','DESC')->paginate(1);

        $data['allvendor'] = $pagination;
        $data['allvendor_count'] = $pagination->total();

        //echo "<pre>";print_r($data);echo "</pre>";exit;

        return view('front.vendor_database',$data);
    }

    
}