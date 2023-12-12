<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use DB;
use Cart;

class Cartcontroller extends Controller
{

    public function cart(){

        $data['meta_title'] = "";
        $data['meta_keyword'] = "";
        $data['meta_description'] = "";

        return view('front.cart',$data);
    }

    
    function add_to_cart(){

        $package_id = $_POST['package_id'];
        $qty = $_POST['qty'];

        if($package_id != ''){

            $package_data = DB::table('packages')->where('id',$package_id)->first();

            if($package_data->image != ''){
                $image = $package_data->image;
            }else{
                $image = "no-image.png";
            }

            $service_data = DB::table('services')->where('id',$package_data->service_id)->first();
            $subservices_data = DB::table('subservices')->where('id',$package_data->subservice_id)->first();
            $packagecategory_data = DB::table('package_categories')->where('id',$package_data->packagecategory_id)->first();

            //echo "<pre>";print_r($service_data);echo "</pre>";exit;

            Cart::add([
            'id' => $package_data->id, 
            'name' => $package_data->name, 
            'qty' => $qty, 
            'price' => $package_data->price, 
            'options' => [
                'service_id' => $package_data->service_id,
                'service_name' => $service_data->servicename,
                'subservice_id' => $package_data->subservice_id,
                'subservice_name' => $subservices_data->subservicename,
                'packagecategory_id' => $package_data->service_id,
                'packagecategory_name' => $packagecategory_data->name,
                'page_url' => $package_data->page_url,
                'image' => $image,
                'discount' => $package_data->discount,
                'discount_type' => $package_data->discount_type,
                
            ]]);

            echo $cartItems =  Cart::content()->count();

        }   
    }

    function cart_remove(){

        $rowId = $_POST['rowId'];
        Cart::remove($rowId);
        echo Cart::count();
    }
    
}