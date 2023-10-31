<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\SubBanner;
use Image;
use Session;
use DB;

class SubBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_data'] = SubBanner::orderBy('id','DESC')->get(); 
       return view('admin.list_subbanner',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_subbanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = new SubBanner;
        $data->link      = $request->link;
        $data->video_link  = $request->video_link;
        $data->set_order = 0;   

        if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            $destinationPath = public_path('upload/subbanner');
            $img = Image::make($image->path());
            $width=1000;
            $height=540;

            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);           
           
            $image->move($destinationPath,$data['image']);

            $image = $data['image'];
        }else{
            $image = "";
        }

        $data->image  = $image;

        $data->save();

        return redirect()->route('subbanner.index')->with('success', 'Sub Banner Added Successfully');
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
    public function edit(SubBanner $subbanner)
    {
        
        return view('admin.edit_subbanner',compact('subbanner'));
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
       

        $data = SubBanner::find($id);
        $data->link      = $request->link;
        $data->video_link     = $request->video_link;       

         if($request->hasfile('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            $destinationPath = public_path('upload/subbanner/');
            $img = Image::make($image->path());
            $width=1000;
            $height=540;

            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);
            
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];

             $data->image  = $image;
        }        

        $data->save();

        return redirect()->route('subbanner.index')->with('success', 'SubBanner Update Successfully');
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
        SubBanner::whereIn('id',$delete_id)->delete();
        return redirect()->route('subbanner.index')->with('success','SubBanner has been Deleted successfully');
    }
    public function set_order_subbanner()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('sub_banners')->where('id', $id)->update(array('set_order' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }
    ///////////////////////////////////    // for image resize start///////////////////////////////////////////////////////
   
   
    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $filename = time() . '-' . str_replace(' ', '-', $image->getClientOriginalName());

    //     // Resize and save the image using the Image facade
    //     Image::make($image->getRealPath())
    //         ->resize(1000, 540)
    //         ->save(public_path('upload/subbanner/' . $filename));

    //     // Image::make($image->getRealPath())
    //     //     ->resize(100, 50)
    //     //     ->save(public_path('upload/subbanner/small/' . $filename));

    //     $data->image = $filename;
    // }


    /////////////////////////////////// for image resize End ////////////////////////////////////////////////////////////////

   


}