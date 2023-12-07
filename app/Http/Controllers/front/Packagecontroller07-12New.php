<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use DB;

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
            // $pagination = $query->orderBy('id', 'DESC')->paginate(2)->withQueryString();
             
            $data['package_data'] = $query;
            // $data['package_pagination'] = $pagination;
            // $data['package_count'] = $pagination->total();
            $data['subservice_data'] = DB::table('subservices')->get();
 
            $data['max_price'] = DB::table('packages')->max('price'); 
            $data['filter_price_start'] = $request->get('filter_price_start');
            $data['filter_price_end'] = $request->get('filter_price_end');

           
            
        }else{
            $data['package_data'] = '';
            $data['package_count'] = 0;        
        } 
        // echo"<pre>";
        // print_r($data);
        // echo"</pre>";exit;
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

        //echo "<pre>";print_r($data);echo "</pre>";exit;     

        return view('front.package_detail',$data);
    }
    
    
}