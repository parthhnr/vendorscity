<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subservice;
use App\Models\Admin\Service;
use Image;

class SubserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $data['subservice_data']=Subservice::orderBy('id','DESC')->get();
        return view('admin.list_subservice',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['service_data']=service::orderBy('id','DESC')->get();
       
        return view('admin.add_subservice',$data);

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
        // echo"</pre>";exit;
       
        $subservice= New Subservice;
        $subservice->serviceid=$request->serviceid;
        $subservice->subservicename=$request->subservicename;        
        $subservice->description=$request->description;
        $subservice->charge=$request->charge;
        $subservice->no_of_inquiry=$request->no_of_inquiry;        
        // $subservice->serviceprice=$request->serviceprice;        
       
        $subservice->is_bookable = implode(',', $request->is_bookable);


        
        
        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/subservice/large');
            $img = Image::make($image->path());
            $width=100;
            $height=100;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);
              
            $destinationPath = public_path('upload/subservice');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
        }else{
            $image = "";
        }
        $subservice->image  = $image;

        // echo"<pre>";
        // print_r($subservice);
        // echo"</pre>";exit;
       
        $subservice->save();
        return redirect()->route('subservice.index')->with('success', 'Sub Service Added Successfully');
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
    public function edit(Subservice $subservice)
    {
       
        
        $data['all_service'] = Service::orderBy('id','DESC')->get();       
    
        return view('admin.edit_subservice',compact('subservice'),$data);
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
       
        
        $subservice=Subservice::find($id);
        $subservice->serviceid=$request->serviceid;
        $subservice->subservicename=$request->subservicename;        
        $subservice->description=$request->description;
        $subservice->charge=$request->charge;
        $subservice->no_of_inquiry=$request->no_of_inquiry;
        // $subservice->serviceprice=$request->serviceprice;
        
        $subservice->is_bookable = implode(',', $request->is_bookable);       


        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/subservice/large');
            $img = Image::make($image->path());
            $width=100;
            $height=100;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);
              
            $destinationPath = public_path('upload/subservice');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
            $subservice->image  = $image;
        }
       
       
        $subservice->update();
        return redirect()->route('subservice.index')->with('success', 'Sub Service Updated Successfully');
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

        Subservice::whereIn('id',$delete_id)->delete();

        return redirect()->route('subservice.index')->with('success','Sub Service Deleted Successfully');
    }
}