<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\City;
use App\Models\Admin\Service;
use DB;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo"test";exit;
        $data['service_data']=Service::orderBy('id','DESC')->get();
        return view('admin.list_service',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['country_data'] = DB::table('countries')->select('*')->orderBy('id','DESC')->get();

        $data['form_field_data'] = DB::table('form_fileds')->get();

        // echo"<pre>";
        // print_r($data['form_field_data']);
        // echo"</pre>";
        // exit;

        return view('admin.add_service',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"<pre>";
        // print_r($request->post());
        // echo"</pre>";
        // exit;

        $service=New Service;
        $service->country = $request->country;
        $service->servicename=$request->servicename;
        $service->page_url=$request->page_url;
        $service->title1=$request->title1;
        $service->title2=$request->title2;
        $service->banner_url=$request->banner_url;
        $service->sort_description=$request->sort_description;
        
        if(isset($request->form_fields)){
            $service->form_fields = implode(",",$request->form_fields);
        }
        if(isset($request->form_fields_two)){
            $service->form_fields_two = implode(",",$request->form_fields_two);
        }

        $service->set_order = 0;

        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/service/large/');
            $img = Image::make($image->path());
            $width=332;
            $height=256;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);
              
            $destinationPath = public_path('upload/service/');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
        }else{
            $image = "";
        }
        $service->image  = $image;
        

        $service->save();
        
        return redirect()->route('service.index')->with('success', 'Service Added Successfully');
        
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
    public function edit(Service $service)
    {
        $data['country_data'] = DB::table('countries')->select('*')->orderBy('id','DESC')->get();

        $data['form_field_data'] = DB::table('form_fileds')->get();
        
        return view('admin.edit_service',compact('service'),$data);
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
         
        $service= Service::find($id);
        $service->country=$request->country;
        $service->servicename=$request->servicename;
        $service->page_url=$request->page_url;
        $service->title1=$request->title1;
        $service->title2=$request->title2;
        $service->banner_url=$request->banner_url;
        $service->sort_description=$request->sort_description;
        if(isset($request->form_fields)){
            $service->form_fields = implode(",",$request->form_fields);
        }
        if(isset($request->form_fields_two)){
            $service->form_fields_two = implode(",",$request->form_fields_two);
        }

        //$service->banner_description=$request->banner_description;
        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/service/large/');
            $img = Image::make($image->path());
            $width=332;
            $height=256;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);
              
            $destinationPath = public_path('upload/service/');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
            $service->image  = $image;
        }
        
        // echo"<pre>";
        // print_r($service);
        // echo"</pre>";
        // exit;
        $service->update();
        
        return redirect()->route('service.index')->with('success', 'Service  Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete_id=$request->selected;
        Service::whereIn('id',$delete_id)->delete();
        return redirect()->route('service.index')->with('success','Service Deleted Successfully');
    }
    public function set_order_service()

    {

        $id = $_POST['id'];

        $val = $_POST['val'];

        // echo $id."-".$val;exit;

        DB::table('services')->where('id', $id)->update(array('set_order' => $val));

        echo "1";

        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');

    }

}