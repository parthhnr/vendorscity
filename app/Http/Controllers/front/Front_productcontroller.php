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
        $colorsProducts = DB::table('products as p')
                                ->leftJoin('product_attribute as p_attr','p.id','=','p_attr.pid')
                                ->leftJoin('colours as c', 'p_attr.colour_id', '=', 'c.id')
                                ->select('c.id','c.code as color_code','c.name as colorname','p_attr.pid as pid')
                                ->selectRaw('COUNT(DISTINCT p_attr.pid) as product_count')
                                ->groupBy('c.id', 'c.code', 'c.name');


        if ($groupurl != '') {
            $groupdata = DB::table('groups')->select('*')->where('page_url', '=', $groupurl)->first();
            $query = $query->where('p.group_id', '=', $groupdata->id);
            $colorsProducts = $colorsProducts->where('p.group_id', '=', $groupdata->id);
            $data['banner_title'] = $groupdata->name;
            $data['group_page_url'] = $groupdata->page_url;
            $data['meta_title'] = "";
            $data['meta_keyword'] = "";
            $data['meta_description'] = "";

            $categories_data = DB::table('categories as cat')
                                        ->leftJoin(DB::raw('(SELECT cat_id, COUNT(id) as product_count
                                                FROM products
                                                WHERE group_id = '.$groupdata->id.'
                                                GROUP BY cat_id) as p'), 'cat.id', '=', 'p.cat_id')
                                        ->select('cat.*', DB::raw('IFNULL(p.product_count, 0) as product_count'))
                                        ->where('cat.group_id', '=', $groupdata->id)
                                        ->orderBy('cat.name','ASC')
                                        ->get();

            $data['categories_data'] = $categories_data;
            $data['subcategory_data'] = "";
        }
        
        if ($cat_url != '') {
            $cat_data = DB::table('categories')->select('*')->where('page_url', '=', $cat_url)->first();
            $query = $query->where('p.cat_id', '=', $cat_data->id);
            $colorsProducts = $colorsProducts->where('p.cat_id', '=', $cat_data->id);
            $data['banner_title'] = $cat_data->name;
            $data['meta_title'] = $cat_data->meta_title;
            $data['meta_keyword'] = $cat_data->meta_keywords;
            $data['meta_description'] = $cat_data->meta_description;

            $subcategory_data = DB::table('subcategories as subcat')
                                        ->leftJoin('categories as cat', 'subcat.cat_id', '=', 'cat.id') // Join with the categories table
                                        ->leftJoin(DB::raw('(SELECT subcat_id, COUNT(id) as product_count
                                                FROM products
                                                GROUP BY subcat_id) as p'), 'subcat.id', '=', 'p.subcat_id')
                                        ->select('subcat.*', 'cat.page_url as category_pageurl', 'cat.group_id', DB::raw('IFNULL(p.product_count, 0) as product_count'))
                                        ->where('subcat.cat_id', '=', $cat_data->id)
                                        ->where('subcat.group_id', '=', $cat_data->group_id)
                                        ->orderBy('subcat.name','ASC')
                                        ->get();
                                    
            $data['subcategory_data'] = $subcategory_data;
        }
        
        if ($subcat_url != '') {
            $subcat_data = DB::table('subcategories')->select('*')->where('page_url', '=', $subcat_url)->first();
            $colorsProducts = $colorsProducts->where('p.subcat_id', '=', $subcat_data->id);
            $query = $query->where('p.subcat_id', '=', $subcat_data->id);
            $data['banner_title'] = $subcat_data->name;
            $data['meta_title'] = $subcat_data->meta_title;
            $data['meta_keyword'] = $subcat_data->meta_keywords;
            $data['meta_description'] = $subcat_data->meta_description;
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
      
       if($request->get('filter_price_start') !== null && $request->get('filter_price_end') !== null)
       {
           $filter_price_start = $request->get('filter_price_start');
           $filter_price_end = $request->get('filter_price_end');
           if ($filter_price_start > 0 && $filter_price_end > 0) {

                $query = $query->whereBetween('pa.price',[$filter_price_start,$filter_price_end]);
           }
       }

       $colorIds  =  $request->get('colour');
       if($colorIds !== null && $request->get('colour') !== null){

            $query = $query->whereIn('pa.colour_id', $colorIds);
            $data['colorIds'] = implode(",",$colorIds);
           
       }else {
             $data['colorIds'] = $colorIds = "";
        }
        
        // Now, paginate the query and store the result in a variable.
        $pagination = $query->orderBy('p.id', 'DESC')->paginate(8)->withQueryString();
        
        $data['productCount'] = $pagination->total(); // Use total() to get the total count.
        $data['all_product_details'] = $pagination;
        $data['colorsProducts'] = $colorsProducts->get();

        $data['sort_by'] = $sort;
      
        $data['max_price'] = DB::table('product_attribute')->max('price');
        $data['filter_price_start'] = $request->get('filter_price_start');
        $data['filter_price_end'] = $request->get('filter_price_end');
        //echo "<pre>";print_r($data['colorsProducts']);echo "</pre>";exit;
    	return view('front.product_listing',$data);
    }
    public function collection(Request $request, $page_url=''){
        
        $query = DB::table('products as p');
        if ($page_url != '') {
            $collectionsdata = DB::table('collections')->select('*')->where('page_url', '=', $page_url)->first();
            $query = $query->where('p.collection_id', '=', $collectionsdata->id);
            $data['banner_title'] = $collectionsdata->name;
            // $data['meta_title'] = $collectionsdata->meta_title;
            // $data['meta_keyword'] = $collectionsdata->meta_keywords;
            // $data['meta_description'] = $collectionsdata->meta_description;
            
            $data['meta_title'] = "";
            $data['meta_keyword'] = "";
            $data['meta_description'] = "";
        
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
        
        if($request->get('filter_price_start') !== null && $request->get('filter_price_end') !== null)
       {
           $filter_price_start = $request->get('filter_price_start');
           $filter_price_end = $request->get('filter_price_end');
           if ($filter_price_start > 0 && $filter_price_end > 0) {

                $query = $query->whereBetween('pa.price',[$filter_price_start,$filter_price_end]);
           }
       }

       $colorIds  =  $request->get('colour');
       if($colorIds !== null && $request->get('colour') !== null){

            $query = $query->whereIn('pa.colour_id', $colorIds);
            $data['colorIds'] = implode(",",$colorIds);
           
       }else {
             $data['colorIds'] = $colorIds = "";
        }
        
        
        // Now, paginate the query and store the result in a variable.
        $pagination = $query->orderBy('id', 'DESC')->paginate(8)->withQueryString();
        
        $data['productCount'] = $pagination->total(); // Use total() to get the total count.
        $data['all_product_details'] = $pagination;
        $data['sort_by'] = $sort;
        
        $data['max_price'] = DB::table('product_attribute')->max('price');
        $data['filter_price_start'] = $request->get('filter_price_start');
        $data['filter_price_end'] = $request->get('filter_price_end');
        
        $data['categories_data'] = '';
         $data['subcategory_data'] = '';
         $data['colorsProducts'] = '';
       
      //echo "<pre>";print_r($data);echo "</pre>";exit;
        return view('front.product_listing',$data);
    }
    public function product_detail($page_url=''){
        // echo $page_url;exit;
        $data['product_data'] = DB::table('products')->where('page_url',$page_url)->first();
        $pid = $data['product_data']->id;
        $data['product_image'] = DB::table('product_image')->where('pid',$pid)->get();
        $data['getcolordetail'] = DB::table('product_attribute as sp')
                                    ->select('sp.*', 'c.id', 'c.name as colorname', 'c.code')
                                    ->leftJoin('colours as c', 'c.id', '=', 'sp.colour_id')
                                    ->where('sp.pid', $pid)
                                    ->groupBy('c.id')
                                    ->get();
        $data['getsizedetail'] = DB::table('product_attribute as sp')
                                    ->select('sp.*', 's.id', 's.name as sizename')
                                    ->leftJoin('sizes as s', 's.id', '=', 'sp.size_id')
                                    ->where('sp.pid', $pid)
                                    ->groupBy('s.id')
                                    ->get();
        $data['relatedproduct'] = DB::table('products')->where('subcat_id',$data['product_data']->subcat_id)->where('id','!=',$pid)->get();
        $data['meta_title'] = $data['product_data']->meta_title;
        $data['meta_keyword'] = $data['product_data']->meta_keyword;
        $data['meta_description'] = $data['product_data']->meta_description;
          // echo "<pre>";print_r($data);echo "</pre>";exit;
        return view('front.single_product',$data);
    }
    public function size_show(){
        
        $product_id=$_POST['product_id'];
        $color=$_POST['color'];
        //echo $product_id;exit;
        // $result = DB::table('product_attribute')
        //         ->select('*')
        //         ->where('colour_id','=',$color)
        //         ->where('pid','=',$product_id)
        //         ->get();
        $result = DB::table('product_attribute as sp')
                    ->select('sp.*', 's.id', 's.name as sizename')
                    ->leftJoin('sizes as s', 's.id', '=', 'sp.size_id')
                    ->where('sp.colour_id','=',$color)
                    ->where('sp.pid', $product_id)
                    ->groupBy('s.id')
                    ->get();
        $result_new=$result->toArray();
         // echo"<pre>";print_r($result_new);echo"</pre>";exit;
        // $html  ="<select id='size' name='size'>";
        // $html .="<option value=''>select Size</option>";
        if($result !='' &&  count($result)>0){
            $html = "";
            for($i=0; $i<count($result); $i++){
                $html .="<li>";
                $html .="<input class='d-none' type='radio' id='size-".$result[$i]->size_id."' name='size' value='".$result[$i]->size_id."' onclick='price_change(this.value)'/>";
                $html .="<label for = 'size-".$result[$i]->size_id."' class='width-80'>";
                $html .="<span>".$result[$i]->sizename."</span>";
                $html .="</li>";
               
            }
        }
       
     echo $html;
    }
    function price_show(){
        $size_id = $_POST['size_id'];
        $color_id = $_POST['color_id'];
        $p_id = $_POST['p_id'];
       
        $result = DB::table('product_attribute')->where('size_id',$size_id)->where('colour_id',$color_id)->where('pid',$p_id)->first();
        //echo "<pre>";print_r($result);echo "</pre>";exit;
        if($result != ''){
            $array = array(
                'response'=> 'success',
                'qty' => $result->qty,
                'price' => $result->price,
              );
        }else{
            $array = array('response'=> 'fail');
        }
        $json = json_encode($array);
        echo $json;
    }
}
