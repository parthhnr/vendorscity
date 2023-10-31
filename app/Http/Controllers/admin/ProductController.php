<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Category;
use App\Models\admin\Size;
use App\Models\admin\Collection;
use App\Models\admin\Colour;
use App\Models\admin\Material;
use App\Models\admin\Style_type;
use App\Models\admin\Group;
Use Image;
use Session;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category_data'] = Product::orderBy('id','DESC')->get();
        
        return view('admin.list_product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['group'] = Group::all();
        $data['category'] = Category::all();
        $data['size'] = Size::all();
        $data['collection'] = Collection::all();
        $data['colour'] = Colour::all();
        $data['material'] = Material::all();
        $data['style_type'] = Style_type::all();
        return view('admin.add_product',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   echo "<pre>";print_r($request->all());echo "</pre>";exit;
        $data['group_id'] = $request->input('group_id');
        $data['cat_id'] = $request->input('cat_id');
        $data['subcat_id'] = $request->input('subcat_id');
        $data['name'] = $request->input('name');
        $data['page_url'] = $request->input('page_url');
        $data['product_code'] = $request->input('product_code');
        $data['sku_code'] = $request->input('sku_code');
        $data['short_description'] = $request->input('short_description');
        $data['collection_id'] = $request->input('collection_id');
        $data['discount'] = $request->input('discount');
        $data['discount_type'] = $request->input('radio');
        $data['description'] = $request->input('description');
        $data['meta_title'] = $request->input('meta_title');
        $data['meta_keyword'] = $request->input('meta_keywords');
        $data['meta_description'] = $request->input('meta_description'); 
        
        $data['material_id'] = is_array($request->input('material_id')) ? implode(',', $request->input('material_id')) : '';
        $data['style_type_id'] = is_array($request->input('style_type')) ? implode(',', $request->input('style_type')) : '';


        
        $data['lining'] = $request->input('lining');


        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            $destinationPath = public_path('upload/product/detail_image/');
            $img = Image::make($image->path());
            $width=765;
            $height=600;

            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);            
          
            $image = $data['image'];
        }else{
            $image = "";
        }

        $data['image']  = $image;
        
        $data['sale_product'] = 0;
        $data['hot_product'] = 0;
        $data['new_product'] = 0;
        $data['recent_product'] = 0;
        $data['feature_product'] = 0;
        $data['best_seller'] = 0;
       

       
        $id = DB::table('products')->insertGetId($data);

        if (count($_POST['size']) > 0 && $_POST['size'] != '') {
            for ($i = 0; $i < count($_POST['size']); $i++) {

                if($_POST['size'][$i] != ''){

                    $content['p_id'] = $id;
                    $content['size'] = $_POST['size'][$i];
                    $content['colour'] = $_POST['colour'][$i];
                    $content['price'] = $_POST['price'][$i];
                    $content['qty'] = $_POST['qty'][$i];
                    $this->insert_attribute($content);
                }
            }
        }

        return redirect()->route('product.index')->with('success','Product Added Successfully.');
    }

    function insert_attribute($content){

        $data['pid'] = $content['p_id'];
        $data['size_id'] = $content['size'];
        $data['colour_id'] = $content['colour'];
        $data['price'] = $content['price'];
        $data['qty'] = $content['qty'];

        DB::table('product_attribute')->insertGetId($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['group_old'] = DB::table('groups')
        ->select('*')
        ->get()
        ->toArray();

        $data['category_old'] = DB::table('categories')
        ->select('*')
        ->where('group_id', '=',$product->group_id)
        ->get()
        ->toArray();

        $data['subcategory_old'] = DB::table('subcategories')
        ->select('*')
        ->where('cat_id', '=',$product->cat_id)
        ->get()
        ->toArray();

        $data['attribute_data'] = DB::table('product_attribute')
        ->select('*')
        ->where('pid', '=',$product->id)
        ->get()
        ->toArray();

        $data['size'] = Size::all();
        $data['collection'] = Collection::all();
        $data['colour'] = Colour::all();
        $data['material'] = Material::all();
        $data['style_type'] = Style_type::all();

        return view('admin.edit_product',compact('product'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['group_id'] = $request->input('group_id');
        $data['cat_id'] = $request->input('cat_id');
        $data['subcat_id'] = $request->input('subcat_id');
        $data['name'] = $request->input('name');
        $data['page_url'] = $request->input('page_url');
        $data['product_code'] = $request->input('product_code');
        $data['sku_code'] = $request->input('sku_code');
        $data['short_description'] = $request->input('short_description');
        $data['collection_id'] = $request->input('collection_id');
        $data['discount'] = $request->input('discount');
        $data['discount_type'] = $request->input('radio');
        $data['description'] = $request->input('description');
        $data['meta_title'] = $request->input('meta_title');
        $data['meta_keyword'] = $request->input('meta_keywords');
        $data['meta_description'] = $request->input('meta_description');
        $data['material_id'] = is_array($request->input('material_id')) ? implode(',', $request->input('material_id')) : '';
        $data['style_type_id'] = is_array($request->input('style_type')) ? implode(',', $request->input('style_type')) : '';

        $data['lining'] = $request->input('lining');

        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            $destinationPath = public_path('upload/product/detail_image/');
            $img = Image::make($image->path());
            $width=765;
            $height=600;

            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);            
          
            $image = $data['image'];
            $data['image']  = $image;
        }
        // $data['discount_type'] = 2;

        Product::where('id', $id)->update($data);

        if (count($_POST['size1']) > 0 && $_POST['size1'] != '') {
            for ($i = 0; $i < count($_POST['size1']); $i++) {

                if($_POST['size1'][$i] != ''){

                    $content['p_id'] = $id;
                    $content['size'] = $_POST['size1'][$i];
                    $content['colour'] = $_POST['colour1'][$i];
                    $content['price'] = $_POST['price1'][$i];
                    $content['qty'] = $_POST['qty1'][$i];
                    $this->insert_attribute($content);
                }
            }
        }

        if ($request->sizeu != '' && count($request->sizeu) > 0 ) {
            for ($i = 0; $i < count($_POST['sizeu']); $i++) {

                if($_POST['sizeu'][$i] != ''){

                    $content['p_id'] = $id;
                    $content['size'] = $_POST['sizeu'][$i];
                    $content['colour'] = $_POST['colouru'][$i];
                    $content['price'] = $_POST['priceu'][$i];
                    $content['qty'] = $_POST['qtyu'][$i];
                    $content['updateid1xxx'] = $_POST['updateid1xxx'][$i];
                    $this->update_attribute($content);
                }
            }
        }

        return redirect()->route('product.index')->with('success','Product Updated Successfully.');
    }

    function update_attribute($content){

        $data['pid'] = $content['p_id'];
        $data['size_id'] = $content['size'];
        $data['colour_id'] = $content['colour'];
        $data['price'] = $content['price'];
        $data['qty'] = $content['qty'];

        //DB::table('product_attribute')->insertGetId($data);

        //User::where('id', $content['updateid1xxx'])->update($data);

        DB::table('product_attribute')->where('id', $content['updateid1xxx'])->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete_id = $request->selected;
        // echo $delete_id;exit;
        Product::whereIn('id',$delete_id)->delete();
        return redirect()->route('product.index')->with('success','Product has been deleted successfully');
    }

    public static function updateorder(Request $request, $val1)
    {
        // echo $val1;exit;
        // Category::whereIn('id',$delete_id)->delete();
        return redirect()->route('product.index')->with('success','Product has been deleted successfully');
    }


    function product_show_category(){
        $group_id = $_POST['group_id'];
        // echo $group_id;exit;
        $result = DB::table('categories')
                     ->select('*')
                     ->where('group_id', '=',$group_id)
                     ->get();

        $result_new =$result->toArray();
        // echo "<pre>";print_r($result_new);echo "</pre>";exit;

        $html = "<select id='cat_id' name='cat_id' class='form-control' onchange='subcategory_change(this.value);'>";
        $html .= "<option value=''> Select Category </option>";
        if($result != '' && count($result) >0)
        {
            for($i=0;$i<count($result);$i++)
            {
                //echo "<pre>";print_r($result[$i]->id);echo "</pre>";exit;
                $html .= "<option value='".$result[$i]->id ."'>".$result[$i]->name ."</option>";
            }
        }
        $html .="</select>";
        //echo "<pre>";print_r($html);echo "</pre>";exit;
        echo $html;
    }

    function product_show_subcategory(){
        $cat_id = $_POST['cat_id'];
        // echo $cat_id;exit;
        $result = DB::table('subcategories')
                     ->select('*')
                     ->where('cat_id', '=',$cat_id)
                     ->get();

        $result_new =$result->toArray();
        //echo "<pre>";print_r($result_new);echo "</pre>";exit;

        $html = "<select id='subcat_id' name='subcat_id' class='form-control jobtext'>";
        $html .= "<option value=''> Select Subcategory </option>";
        if($result != '' && count($result) >0)
        {
            for($i=0;$i<count($result);$i++)
            {
                //echo "<pre>";print_r($result[$i]->id);echo "</pre>";exit;
                $html .= "<option value='".$result[$i]->id ."'>".$result[$i]->name ."</option>";
            }
        }
        $html .="</select>";
        //echo "<pre>";print_r($html);echo "</pre>";exit;
        echo $html;
    }

    public function remove_product_att(Request $request){

        $service = $request->pid;
        $id = $request->id;
        $result = DB::table('product_attribute')->where('pid', '=',$service)->where('id', '=',$id)->delete();
        return redirect()->route('product.edit',$service)->with('success','Product Attribute has been deleted successfully');
    }

    public function product_feature()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('products')->where('id', $id)->update(array('feature_product' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }

    public function product_new()
    {
        
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('products')->where('id', $id)->update(array('new_product' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }
    public function product_hot()
    {
        
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('products')->where('id', $id)->update(array('hot_product' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }
    public function product_sale()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('products')->where('id', $id)->update(array('sale_product' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }
    public function product_recent()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('products')->where('id', $id)->update(array('recent_product' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }

    public function product_best_seller()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('products')->where('id', $id)->update(array('best_seller' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }

    function editimage(Request $request){

        $id = $request->id;

        $data['id'] = $request->id;

        $data['productimages'] = DB::table('product_image')
        ->select('*')
        ->where('pid', '=',$request->id)
        ->get()
        ->toArray();

        //echo "<pre>";print_r($data);echo"</pre>";exit;
        return view('admin.edit_image',$data);
    }

    function editimage_store(Request $request) {
        for ($i = 0; $i < count($_FILES['attachment1']['name']); $i++) {
            if ($_FILES['attachment1']['name'][$i] != '') {
                $image = $_FILES['attachment1']['tmp_name'][$i];
                $originalName = $_FILES['attachment1']['name'][$i]; // Get the original file name
    
                // Generate a unique filename based on the original name
                $filename = time() . '-' . str_replace(' ', '-', $originalName);
    
                // Resize and save the image
                Image::make($image)
                    ->resize(600, 765)
                    ->save(public_path('upload/product/large/' . $filename));
    
                Image::make($image)
                    ->resize(80, 80)
                    ->save(public_path('upload/product/small/' . $filename));
    
                Image::make($image)
                    ->resize(170, 220)
                    ->save(public_path('upload/product/medium/' . $filename));
    
                Image::make($image)
                    ->resize(600, 765)
                    ->save(public_path('upload/product/detailpage/' . $filename));
    
                Image::make($image)                   
                    ->save(public_path('upload/product/' . $filename));                

    
                $data1['image'] = $filename;
            } else {
                $data1['image'] = "";
            }
    
            $data1['pid'] = $request->id;
    
            $this->upload_product_image($data1);
        }
    
        return redirect()->to('editimage/' . $request->id)->with('success', 'Product Image has been added successfully');
    }
    

    function upload_product_image($content){

        //echo "<pre>";print_r($content);echo"</pre>";exit;

        $data['pid'] = $content['pid'];
        $data['image'] = $content['image'];
        $data['baseimage'] = 0;
        $data['baseimageHover'] =0;
        DB::table('product_image')->insertGetId($data);
    }

    public function product_setbaseimage()
    {
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        // echo $id."-".$val;exit;
        DB::table('product_image')->where('pid', $pid)->update(array('baseimage' => 0));
        DB::table('product_image')->where('id', $id)->update(array('baseimage' => 1));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }

    public function product_setbaseimghover()
    {
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        // echo $id."-".$val;exit;
        DB::table('product_image')->where('pid', $pid)->update(array('baseimageHover' => 0));
        DB::table('product_image')->where('id', $id)->update(array('baseimageHover' => 1));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }


    public function product_removeimage(Request $request){

        $service = $request->pid;
        $id = $request->id;
        $result = DB::table('product_image')->where('pid', '=',$service)->where('id', '=',$id)->delete();
        return redirect()->route('editimage',$service)->with('success','Product Image has been deleted successfully');
    }
}