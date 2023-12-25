<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Packages;
use DB;
use Image;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['packages_data']=DB::table('packages')->orderBy('id','DESC')->get();
        return view('admin.list_packages',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['service_data'] = DB::table('services')->select('*')->orderBy('id','DESC')->get();       
        $data['subservice_data'] = DB::table('subservices')->select('*')->orderBy('id','DESC')->get();        
        $data['package_categories_data'] = DB::table('package_categories')->select('*')->orderBy('id','DESC')->get();
        return view('admin.add_packages',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->post());
        // echo "</pre>";exit;
        
        $data['service_id']=$request->service_id;
        $data['subservice_id']=$request->subservice_id;
        $data['packagecategory_id']=$request->packagecategory_id;
        $data['name']=$request->name;
        $data['page_url']=$request->page_url;
        $data['price']=$request->price;
        $data['short_description']=$request->short_description;
        $data['description']=$request->description;
        $data['discount'] = $request->discount;
        $data['discount_type'] = $request->discount_type;

        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/packages/large');
            $img = Image::make($image->path());
            $width=332;
            $height=256;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);
              
            $destinationPath = public_path('upload/packages');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
        }else{
            $image = "";
        }
            $data['image']= $image;
            
            DB::table('packages')->insert($data);
            return redirect()->route('packages.index')->with('success','Packages Data Added Successfully');
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
     * // echo "<pre>";print_r($data['subservice_data']);echo "</pre>";exit;
     */
    public function edit($id)
    {
        // echo "<pre>";print_r($id);echo "</pre>";exit;
        $data['packages'] = DB::table('packages')->where('id', $id)->first();
        
        $data['service_data'] = DB::table('services')->select('*')->orderBy('id','DESC')->get();       
        $data['subservice_data'] = DB::table('subservices')->select('*')->where('serviceid', $data['packages']->service_id)->orderBy('id','DESC')->get();        
        $data['packagecat_data'] = DB::table('package_categories')->select('*')->where('subservice_id', $data['packages']->subservice_id)->orderBy('id','DESC')->get();
        return view('admin.edit_packages',$data);
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
        
        $data['service_id']=$request->service_id;
        $data['subservice_id']=$request->subservice_id;
        $data['packagecategory_id']=$request->packagecategory_id;
        $data['name']=$request->name;
        $data['page_url']=$request->page_url;
        $data['price']=$request->price;
        $data['short_description']=$request->short_description;
        $data['description']=$request->description;
        $data['discount'] = $request->discount;
        $data['discount_type'] = $request->discount_type;

        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/packages/large');
            $img = Image::make($image->path());
            $width=332;
            $height=256;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);
              
            $destinationPath = public_path('upload/packages');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
            $data['image']= $image;
        }else{
            $image = "";
        }
           
           
            DB::table('packages')->where('id', $id)->update($data);
            return redirect()->route('packages.index')->with('success','Packages Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->selected;
        DB::table('packages')->whereIn('id',$id)->delete();
        return redirect()->route('packages.index')->with('success','Packages Data Deleted Successfully'); 
    }
    function subservice_show(){
        $service_id = $_POST['service_id'];
        // echo $service_id;exit;
        
        $result = DB::table('subservices')->select('*')->where('serviceid','=',$service_id)->orderBy('id','DESC')->get();        

        $result_new = $result->toArray();

        $html = ' <select class="form-control" id="subservice_id" name="subservice_id" onchange="packagecategory_change(this.value);">';
        $html .= '<option value="">Select Sub Service</option>';
        if($result != '' && count($result) >0)
        {
            for($i=0;$i<count($result);$i++)
            {
                // echo "<pre>";print_r($result[$i]->id);echo "</pre>";exit;
                $html .= "<option value='".$result[$i]->id ."'>".$result[$i]->subservicename."</option>";
            }
        }
        $html .="</select>";
        // echo "<pre>";print_r($html);echo "</pre>";exit;
        echo $html;
    }
    function packagecategory_show(){
        $subservice_id = $_POST['subservice_id'];
        // echo $service_id;exit;
        
        $result = DB::table('package_categories')->select('*')->where('subservice_id','=',$subservice_id)->orderBy('id','DESC')->get();        

        $result_new = $result->toArray();

        $html = '<select class="form-control" id="packagecategory_id" name="packagecategory_id">';
        $html .= '<option value="">Select Package Category</option>';
        if($result != '' && count($result) >0)
        {
            for($i=0;$i<count($result);$i++)
            {
                // echo "<pre>";print_r($result[$i]->id);echo "</pre>";exit;
                $html .= "<option value='".$result[$i]->id ."'>".$result[$i]->name."</option>";
            }
        }
        $html .="</select>"; 
        
        echo $html;
    }
    function editimage(Request $request,$id){

        // echo $id;exit;
        $data['id'] = $id;
        $data['packagesimages'] = DB::table('packages_image')
        
        ->select('*')
        ->where('pid', '=',$id)
        ->orderBy('id','DESC')
        ->get()
        ->toArray();



        //echo "<pre>";print_r($data);echo"</pre>";exit;

        return view('admin.edit_images',$data);

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

                    ->resize(839, 548)

                    ->save(public_path('upload/packages_slider_img/large/' . $filename));


                Image::make($image)

                    ->resize(150, 112)

                    ->save(public_path('upload/packages_slider_img/small/' . $filename));


                Image::make($image)                   

                    ->save(public_path('upload/packages_slider_img/' . $filename));                



    

                $data1['image'] = $filename;

            } else {

                $data1['image'] = "";

            }

    

            $data1['pid'] = $request->id;

    

            $this->upload_product_image($data1);

        }

    

        return redirect()->to('editimage/' . $request->id)->with('success', 'Packages Image has been added successfully');

    }

    function upload_product_image($content){



        //echo "<pre>";print_r($content);echo"</pre>";exit;



        $data['pid'] = $content['pid'];

        $data['image'] = $content['image'];

        // $data['baseimage'] = 0;

        // $data['baseimageHover'] =0;

        DB::table('packages_image')->insertGetId($data);

    }
    public function packages_removeimage(Request $request){

        $packages = $request->pid;

        $id = $request->id;

        $result = DB::table('packages_image')->where('pid', '=',$packages)->where('id', '=',$id)->delete();

        return redirect()->route('editimage',$packages)->with('success','Packages Image has been deleted successfully');

    }
}