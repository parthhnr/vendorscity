<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Homecontroller extends Controller
{
    public function index(){

        $data['banner_data'] = DB::table('banners')->orderBy('set_order')->get();

        // $data['rec_fet_best_pro_data'] = DB::table('products')->where('recent_product',1)->Orwhere('feature_product',1)->Orwhere('best_seller',1)->get();

        // echo "<pre>";print_r($data);echo "</pre>";exit;
    	return view('front.index',$data);
    }

    

    public function cart(){

        return view('front.cart');
    }

    public function checkout(){

        return view('front.checkout');
    }


    
    
    


    public function about_company(){

        return view('front.about_company');
    }

    public function our_services(){

        return view('front.our_services');
    }

    public function latest_blogs(){

        return view('front.latest_blogs');
    }

    public function contact_us(){

        return view('front.contact_us');
    }

    public function terms_conditions(){

        return view('front.terms_conditions');
    }

    public function privacy_policy(){

        return view('front.privacy_policy');
    }

    public function what_we_offer(){

        return view('front.what_we_offer');
    }

    public function return(){

        return view('front.return');
    }


    
}
