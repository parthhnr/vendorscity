<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Front_productcontroller extends Controller
{
    //
    public function product_listing(Request $request, $groupurl='',$cat_url='',$subcat_url=''){
        
        $query = DB::table('products as p');

        if ($groupurl != '') {
            $groupdata = DB::table('groups')->select('*')->where('page_url', '=', $groupurl)->first();
            $query = $query->where('p.group_id', '=', $groupdata->id);
            $data['banner_title'] = $groupdata->name;
        }
        
        if ($cat_url != '') {
            $cat_data = DB::table('categories')->select('*')->where('page_url', '=', $cat_url)->first();
            $query = $query->where('p.cat_id', '=', $cat_data->id);
            $data['banner_title'] = $cat_data->name;
        }
        
        if ($subcat_url != '') {
            $subcat_data = DB::table('subcategories')->select('*')->where('page_url', '=', $subcat_url)->first();
            $query = $query->where('p.subcat_id', '=', $subcat_data->id);
            $data['banner_title'] = $subcat_data->name;
        }

        $sort ="";

        if($request->get('sort_by') !== null)
        {
            $sort = $request->get('sort_by');
           
        }

        $query = $query
            ->select(
                'p.*',
                DB::raw('(SELECT price FROM product_attribute WHERE pid = p.id ORDER BY price ASC LIMIT 1) AS minprice'),
                // DB::raw('(SELECT (MIN(price) - (MIN(price) * p.discount / 100)) FROM product_attribute WHERE pid = p.id) AS discountprice')
            )
            ->join('product_attribute as pa', 'pa.pid', '=', 'p.id')
            ->where('p.id', '<>', 0)
            ->groupBy('p.id');

        if($sort == 'latest'){
            $query = $query->orderBy('p.id','DESC');
           
        }
       
        if($sort == 'high_to_low'){
            $query = $query->orderBy('minprice','DESC');
           
        }

        if($sort == 'low_to_high'){
            $query = $query->orderBy('minprice','ASC');
           
        }


        // Now, paginate the query and store the result in a variable.
        $pagination = $query->orderBy('p.id', 'DESC')->paginate(8)->withQueryString();
        
        $data['productCount'] = $pagination->total(); // Use total() to get the total count.
        $data['all_product_details'] = $pagination;
        $data['sort_by'] = $sort;
       
      // echo "<pre>";print_r($data);echo "</pre>";exit;

    	return view('front.product_listing',$data);
    }


    public function collection($page_url=''){
        
        $query = DB::table('products');

        if ($page_url != '') {
            $collectionsdata = DB::table('collections')->select('*')->where('page_url', '=', $page_url)->first();
            $query = $query->where('collection_id', '=', $collectionsdata->id);
            $data['banner_title'] = $collectionsdata->name;
        }
        
        
        // Now, paginate the query and store the result in a variable.
        $pagination = $query->orderBy('id', 'DESC')->paginate(8)->withQueryString();
        
        $data['productCount'] = $pagination->total(); // Use total() to get the total count.
        $data['all_product_details'] = $pagination;
        
       
      //echo "<pre>";print_r($data);echo "</pre>";exit;

        return view('front.product_listing',$data);
    }

    public function product_detail($page_url=''){

        // echo $page_url;exit;

        $data['product_data'] = DB::table('products')->where('page_url',$page_url)->first();

        $pid = $data['product_data']->id;

        $data['product_image'] = DB::table('product_image')->where('pid',$pid)->get();

        // echo "<pre>";print_r($data);echo "</pre>";exit;
        return view('front.single_product',$data);
    }
}
