<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
class Cartcontroller extends Controller
{
    //
    function add_to_cart(){

        //echo "<pre>";print_r($_POST);echo "</pre>";exit;

        $p_id = $_POST['pid'];
        $color_id = $_POST['color'];
        $qty = $_POST['qty'];
        $size_id = $_POST['size'];

        if($size_id != ''){

            $product_data = DB::table('products')->where('id',$p_id)->first();

            $product_base_image = DB::table('product_image')->where('pid',$p_id)->where('baseimage',1)->first();

            $size_data = DB::table('sizes')->where('id',$size_id)->first();
            $color_data = DB::table('colours')->where('id',$color_id)->first();

            $attribute_data = DB::table('product_attribute')
                                ->where('pid',$p_id)
                                ->where('colour_id',$color_id)
                                ->where('size_id',$size_id)
                                ->first();

            $size_name = $size_data->name;
            $color_name = $color_data->name;
            $product_name = $product_data->name;
            $page_url = $product_data->page_url;
            $price = $attribute_data->price;
            $qty_left = $attribute_data->qty;
            $discount = $product_data->discount;
            $discount_type = $product_data->discount_type;
            $category_id = $product_data->cat_id;
            $attribute_id = $attribute_data->id;
            $product_code = $product_data->product_code;
            $sku_code = $product_data->sku_code;



        }else{

            $product_data ='';
            $price = '0';
            $product_base_image = '';
            $size_name = '';
            $page_url = '';
            $color_name = '';
            $discount = '';
            $discount_type = '';
            $qty_left = '';
            $category_id = '';
            $attribute_id = '';
            $product_code = '';
            $sku_code = '';
        }

        if($product_base_image != ''){
                $image = $product_base_image->image;
        }else{
            $image ='no-image.png';
        }

        if($product_data->discount > 0){

            if($product_data->discount_type == 0){

                $disc_price_new = $price * $product_data->discount /100 ;

                $disc_price = $price - $disc_price_new;
            }elseif($product_data->discount_type == 1){
                $disc_price = $price - $product_data->discount;
            }else{
                $disc_price = $price;
            }

        }else{
            $disc_price = 0;
        }

        $cartdiscount = $disc_price;

        //echo "<pre>";print_r($attribute_data);echo "</pre>";exit;

        Cart::add([
            'id' => $p_id, 
            'name' => $product_name, 
            'qty' => $qty, 
            'price' => $price, 
            'options' => [
                'size_id' => $size_id,
                'size_name' => $size_name,
                'color_id' => $color_id,
                'color_name' => $color_name,
                'image' => $image,
                'discount' => $discount,
                'discount_type' => $discount_type,
                'page_url' => $page_url,
                'qty_left' => $qty_left,
                'category_id' => $category_id,
                'product_discount_amount' => $cartdiscount,
                'attribute_id' => $attribute_id,
                'product_code' => $product_code,
                'sku_code' => $sku_code,
            ]]);

        

        // $cartItems =  Cart::content()->toArray();
        echo $cartItems =  Cart::content()->count();

        //echo "<pre>";print_r($cartItems);echo "</pre>";exit;
    }

    function cart_remove(){

        $rowId = $_POST['rowId'];
        Cart::remove($rowId);
        echo Cart::count();
    }

    function empty_cart(){
       Cart::destroy();
       echo Cart::count();
    }

    function update_cart(){

        $rowid = $_POST['rowid'];
        $max_qty = $_POST['max_qty'];
        $count = $_POST['count'];
        Cart::update($rowid, $count);
        echo Cart::count();
        //echo "<pre>";print_r($_POST);echo "</pre>";exit;
    }

    function couponcheck(){
        $coupan = $_POST['coupon'];

        $select_coupan = DB::table('coupans')
                    ->where('startdate', '<=', now()->toDateString())
                    ->where('enddate', '>=', now()->toDateString())
                    ->where('coupan_code', $coupan)
                    ->where('is_active', 0)
                    ->first();

        //echo "<pre>";print_r($select_coupan->minimum_order);echo "</pre>";exit;

        //session(['coupon_code' => '123']);


        if($select_coupan !=""){

            if(session('coupan_data.coupancode') !=  $coupan){

                $numberofcoupon = DB::table('ci_orders')
                          ->where('coupon_code', $coupan)
                          ->count();
                if($select_coupan->no_of_coupons > $numberofcoupon){

                    $numberofcoupon_user = DB::table('ci_orders')
                            ->where('coupon_code', $coupan)
                            ->count();
                    if($select_coupan->no_of_coupons_user > $numberofcoupon_user){

                        //if($select_coupan !='' && ( strtotime($select_coupan->starttime) <= strtotime("now")  && strtotime($select_coupan->endtime) >= strtotime("now"))){


                            $categorycheck=false;
                            $minimum=0;
                            $in_category = explode(",",$select_coupan->category_id);

                            if(Cart::count() > 0){

                                foreach(Cart::content() as $items){

                                    if(in_array($items->options->category_id,$in_category)){
                                        $categorycheck=true;
                                    }

                                    if($select_coupan->is_discounted ==0 && $items->options->cartdiscount == 0){
                                        $minimum  +=$items->subtotal;
                                    }else if($select_coupan->is_discounted ==1){

                                        $minimum  +=$items->subtotal;
                                    }else{
                                        $minimum  +=$items->subtotal;
                                    }
                                }
                            }

                            if($select_coupan->category_id=="" || $select_coupan->category_id==0 || $categorycheck==true){

                                if($minimum >= $select_coupan->minimum_order){


                                    $coupan_data= array(

                                                'coupanname'  => $select_coupan->coupan_name,

                                                'coupancode'  => $select_coupan->coupan_code,

                                                'discount'  => $select_coupan->discount,

                                                'coupanvalue'  => $select_coupan->coupanvalue,

                                                'coupancategory'  => $select_coupan->category_id,

                                                'minimum_order'  => $select_coupan->minimum_order,

                                                'is_discounted'  => $select_coupan->is_discounted,

                                            );  

                                    session(['coupan_data' => $coupan_data]);
                                    echo 'success';
                                }else{

                                    echo $select_coupan->minimum_order;
                                }

                            }else{
                                echo 'invalid';
                                //echo $select_coupan->minimum_order;
                                //echo 100000;
                            }

                        // }else{
                        //     echo "invalid";
                        // } 

                    }else{
                        echo "invalid";
                    }

                }else{
                    echo "invalid";
                }

            }else{
                echo "Already";
            }

        }else{
            echo "invalid";
        }   

        //echo "<pre>";print_r($select_coupan);echo "</pre>";exit;
    }

    function removecoupon(){

        Session::forget('coupan_data');
        
        echo "0";
    }
}
