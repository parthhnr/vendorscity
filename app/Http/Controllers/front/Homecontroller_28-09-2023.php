<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.terms_conditions',$data);
    }

    public function privacy_policy(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.privacy_policy',$data);
    }

    public function what_we_offer(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.what_we_offer',$data);
    }

    public function return(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.return',$data);
    }


    
}
